<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use DataTables;

class SectionController extends Controller
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
            $data = Section::orderByDesc('sections.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('section.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('section.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('section.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = "Section List";
        $menu = "Frontend Settings";
        return view('backend.section.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Section Add";
        $menu = "Frontend Settings";
        return view('backend.section.create',compact('title','menu'));
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
            'name' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/section_image/');
        } else {
            $image = null;
        }
        $section = new Section();
        $section->name = $request->name;
        $section->description = $request->description;
        $section->image = $image;
        $section->save();
        return redirect('section')->with('success','Section is save successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Section Edit";
        $menu = "Frontend Settings";
        $section = Section::findOrFail($id);
        return view('backend.section.edit',compact('title','menu','section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/section_image/');
            $oldImage = Section::where('id',$id)->value('image');
            @unlink($oldImage);

            $updateData = array(
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image,
            );
        } else {
            $updateData = array(
                'name' => $request->name,
                'description' => $request->description,
            );
        }
        
        Section::where('id',$id)->update($updateData);
        return back()->with('success',"Section is updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldImage = Section::where('id',$id)->value('image');
        @unlink($oldImage);
        Section::where('id',$id)->delete();
        return back()->with('success','Section is deleted successfully!');
    }
}
