<?php

namespace App\Http\Controllers;

use App\Models\Strengths;
use Illuminate\Http\Request;
use DataTables;

class StrengthsController extends Controller
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
            $data = Strengths::orderByDesc('strengths.id')->get();
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
                            $btn .= '<a href="'.route('strengths.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('strengths.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('strengths.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = "Management List";
        $menu = "About Us";
        return view('backend.strengths.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Management Add";
        $menu = "About Us";
        return view('backend.strengths.create',compact('title','menu'));
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
            'designation' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/strengths_image/');
        } else {
            $image = null;
        }
        $strengths = new Strengths();
        $strengths->name = $request->name;
        $strengths->designation = $request->designation;
        $strengths->image = $image;
        $strengths->description = $request->description;
        $strengths->save();
        return redirect()->route('strengths.index')->with('success','Management is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Strengths  $strengths
     * @return \Illuminate\Http\Response
     */
    public function show(Strengths $strengths)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Strengths  $strengths
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = "Management Edit";
        $menu = "About Us";
        $strengths = Strengths::findOrFail($id);
        return view('backend.strengths.edit',compact('title','menu','strengths'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Strengths  $strengths
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'designation' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/strengths_image/');
            $oldImage = Strengths::where('id',$id)->value('image');
            @unlink($oldImage);

            $updateData = array(
                'name' => $request->name,
                'designation' => $request->designation,
                'image' => $image,
                'description' => $request->description,
            );
        } else {
            $updateData = array(
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
            );
        }
        Strengths::where('id',$id)->update($updateData);
        return back()->with('success','Management is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Strengths  $strengths
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = Strengths::where('id',$id)->value('image');
        @unlink($oldImage);
        Strengths::where('id',$id)->delete();
        return back()->with('success','Management is deleted successfully!');
    }
}
