<?php

namespace App\Http\Controllers;

use App\Models\MDMessage;
use App\Models\Menu;
use Illuminate\Http\Request;
use DataTables;

class MDMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:frontend-settings', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MDMessage::orderByDesc('m_d_messages.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('menu_id', function($row){
                            $menuName = Menu::where('id',$row->menu_id)->value('name');
                            $btn = '<span>'.$menuName.'</span>';
                            return $btn;
                    })
                    ->addColumn('image', function($row){
                           if ($row->image) {
                                $btn = '<img alt="'.$row->title.'" title="'.$row->title.'" src="'.asset($row->image).'" style="width:100px;height:100px;">';
                            } else {
                                $btn = '';
                            }
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('md-message.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('md-message.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('md-message.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image','menu_id'])
                    ->make(true);
        }
        $title = "Services Image List";
        $menu = "Services";
        return view('backend.md-message.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Services Image Add";
        $menu = "Services";
        $childMenu = Menu::where('parent',4)->get();
        return view('backend.md-message.create',compact('title','menu','childMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'menu_id' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_content_image_list/');
        } else {
            $image = null;
        }
        $mDMessage = new MDMessage();
        $mDMessage->title = $request->title;
        $mDMessage->menu_id = $request->menu_id;
        $mDMessage->image = $image;
        $mDMessage->save();
        return redirect()->route('md-message.index')->with('success','Services Image is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MDMessage  $mDMessage
     * @return \Illuminate\Http\Response
     */
    public function show(MDMessage $mDMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MDMessage  $mDMessage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Services Image Add";
        $menu = "Services";
        $mDMessage = MDMessage::findOrFail($id);
        $childMenu = Menu::where('parent',4)->get();
        return view('backend.md-message.edit',compact('title','menu','mDMessage','childMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MDMessage  $mDMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'menu_id' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_content_image_list/');
            $oldImage = MDMessage::where('id',$id)->value('image');
            @unlink($oldImage);

            $updateData = array(
                'title' => $request->title,
                'menu_id' => $request->menu_id,
                'image' => $image,
            );
        } else {
            $updateData = array(
                'menu_id' => $request->menu_id,
                'title' => $request->title,
            );
        }
        MDMessage::where('id',$id)->update($updateData);
        return back()->with('success','Services image is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MDMessage  $mDMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldImage = MDMessage::where('id',$id)->value('image');
        @unlink($oldImage);
        MDMessage::where('id',$id)->delete();
        return back()->with('success','Service image is deleted successfully!');
    }
}
