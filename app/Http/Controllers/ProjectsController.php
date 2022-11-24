<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use DataTables;

class ProjectsController extends Controller
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
            $data = Projects::orderByDesc('projects.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                           if ($row->image) {
                                $btn = '<img alt="project image" title="project image" src="'.asset($row->image).'" style="width:100px;height:100px;">';
                            } else {
                                $btn = '';
                            }
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('projects.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('projects.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('projects.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = "Brand List";
        $menu = "Frontend Settings";
        return view('backend.projects.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Brand Add";
        $menu = "Frontend Settings";
        return view('backend.projects.create',compact('title','menu'));
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
            'image_text' => 'max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/projects_image/');
        } else {
            $image = null;
        }
        $projects = new Projects();
        $projects->image_text = $request->image_text;
        $projects->image = $image;
        $projects->save();
        return redirect('projects')->with('success','Brand is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Brand Edit";
        $menu = "Frontend Settings";
        $projects = Projects::findOrFail($id);
        return view('backend.projects.edit',compact('title','menu','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image_text' => 'max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/projects_image/');
            $oldImage = Projects::where('id',$id)->value('image');
            @unlink($oldImage);
            $updateData = array(
                'image_text' => $request->image_text,
                'image' => $image,
            );
        } else {
            $updateData = array(
                'image_text' => $request->image_text,
            );
        }
        Projects::where('id',$id)->update($updateData);
        return back()->with('success','Brand is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = Projects::where('id',$id)->value('image');
        @unlink($oldImage);
        Projects::findOrFail($id)->delete();
        return back()->with('success','Brand is deleted successfully!');
    }
}
