<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use DataTables;

class ServicesController extends Controller
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
            $data = Services::orderByDesc('services.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
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
                            $btn .= '<a href="'.route('services.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('services.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('services.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = "Services List";
        $menu = "Frontend Settings";
        return view('backend.services.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Services Add";
        $menu = "Frontend Settings";
        return view('backend.services.create',compact('title','menu'));
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
            'icon' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_image/');
        } else {
            $image = null;
        }
        if ($request->file('icon')) {
            $icon = $this->uploadImage($request->file('icon'), 'uploads/services_icon/');
        } else {
            $icon = null;
        }
        $services = new Services();
        $services->title = $request->title;
        $services->image = $image;
        $services->icon = $icon;
        $services->description = $request->description;
        $services->save();
        return redirect('services')->with('success','Services is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = "Services Edit";
        $menu = "Frontend Settings";
        $services = Services::findOrFail($id);
        return view('backend.services.edit',compact('title','menu','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
            'icon' => 'image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        
       
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_image/');
            $oldImage = Services::where('id',$id)->value('image');
            @unlink($oldImage);

            $image = array(
                'image' => $image,
            );
        }else{
            $image = array();
        }
        if ($request->file('icon')) {
            $icon = $this->uploadImage($request->file('icon'), 'uploads/services_icon/');
            $oldIcon = Services::where('id',$id)->value('icon');
            @unlink($oldIcon);

            $icon = array(
                'icon' => $icon,
            );
        }else{
            $icon = array();
        }
        $updateInfo = array(
            'title' => $request->title,
            'description' => $request->description,
        );
        $updateData = array_merge($image,$icon,$updateInfo);
        Services::where('id',$id)->update($updateData);
        return back()->with('success','Services is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldImage = Services::where('id',$id)->value('image');
        $oldIcon = Services::where('id',$id)->value('icon');
        @unlink($oldImage);
        @unlink($oldIcon);
        Services::where('id',$id)->delete();
        return back()->with('success','Services is deleted successfully!');
    }
}
