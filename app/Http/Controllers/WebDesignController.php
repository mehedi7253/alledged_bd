<?php

namespace App\Http\Controllers;

use App\Models\WebDesign;
use Illuminate\Http\Request;
use DataTables;

class WebDesignController extends Controller
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
            $data = WebDesign::orderByDesc('web_designs.id')->get();
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
                            $btn .= '<a href="'.route('web-design.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('web-design.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('web-design.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = "Customer List";
        $menu = "Customer";
        return view('backend.web-design.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Customer Add";
        $menu = "Customer";
        return view('backend.web-design.create',compact('title','menu'));
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
            $image = $this->uploadImage($request->file('image'), 'uploads/customer/');
        } else {
            $image = null;
        }
        $webDesign = new WebDesign();
        $webDesign->title = $request->title;
        $webDesign->image = $image;
        $webDesign->description = $request->description;
        $webDesign->save();
        return redirect()->route('web-design.index')->with('success','Customer is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebDesign  $webDesign
     * @return \Illuminate\Http\Response
     */
    public function show(WebDesign $webDesign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebDesign  $webDesign
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = "Customer Edit";
        $menu = "Customer";
        $webDesign = WebDesign::findOrFail($id);
        return view('backend.web-design.edit',compact('title','menu','webDesign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebDesign  $webDesign
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
            $image = $this->uploadImage($request->file('image'), 'uploads/customer/');
            $oldImage = WebDesign::where('id',$id)->value('image');
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
        WebDesign::where('id',$id)->update($updateData);
        return back()->with('success','Customer is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebDesign  $webDesign
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = WebDesign::where('id',$id)->value('image');
        @unlink($oldImage);
        WebDesign::where('id',$id)->delete();
        return back()->with('success','Customer is deleted successfully!');
    }
}
