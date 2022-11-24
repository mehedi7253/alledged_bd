<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use DataTables;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:company-settings', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Subscribe::orderByDesc('subscribes.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                            if (file_exists($row->image)) {
                                $btn = '<img alt="'.$row->title.'" title="'.$row->title.'" src="'.asset($row->image).'" style="width:100px;height:100px;">';
                            } else {
                                $btn = '';
                            }
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('subscribe.edit',$row->id).'" title="Edit" class="btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('subscribe.destroy',$row->id).'" class="btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('subscribe.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = 'Achievements List';
        $menu = 'Achievements';
        return view('backend.subscribe.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Achievements List';
        $menu = 'Achievements';
        return view('backend.subscribe.create',compact('title','menu'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/achievement/');
        } else {
            $image = null;
        }
        $subscribe = new Subscribe();
        $subscribe->title = $request->title;
        $subscribe->description = $request->description;
        $subscribe->image = $image;
        $subscribe->save();
        return back()->with('success','Image is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = 'Achievements List';
        $menu = 'Achievements';
        $subscribe = Subscribe::findOrFail($id);
        return view('backend.subscribe.edit',compact('title','menu','subscribe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/achievement/');
            $oldImage = Subscribe::where('id',$id)->value('image');
            @unlink($oldImage);

            $updateData = array(
                'title' => $request->title,
                'image' => $image,
                'description' => $request->description,
            );
        } else {
            $updateData = array(
                'title' => $request->title,
                'description' => $request->description,
            );
        }
        Subscribe::where('id',$id)->update($updateData);
        return back()->with('success','Customer is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = Subscribe::where('id',$id)->value('image');
        @unlink($oldImage);
        Subscribe::where('id',$id)->delete();
        return back()->with('success','Customer is deleted successfully!');
    }
}
