<?php

namespace App\Http\Controllers;

use App\Models\WeBest;
use Illuminate\Http\Request;
use DataTables;

class WeBestController extends Controller
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
            $data = WeBest::orderByDesc('we_bests.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('we-best.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('we-best.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('we-best.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = "Our Products List";
        $menu = "Frontend Settings";
        return view('backend.we-best.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Our Products Add";
        $menu = "Frontend Settings";
        return view('backend.we-best.create',compact('title','menu'));
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
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/we_best_image/');
        } else {
            $image = null;
        }
        $weBest = new WeBest();
        $weBest->title = $request->title;
        $weBest->description = $request->description;
        $weBest->image = $image;
        $weBest->save();
        return redirect('we-best')->with('success',"Our Products is saved successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WeBest  $weBest
     * @return \Illuminate\Http\Response
     */
    public function show(WeBest $weBest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WeBest  $weBest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Our Products Add";
        $menu = "Frontend Settings";
        $weBest = WeBest::findOrFail($id);
        return view('backend.we-best.edit',compact('title','menu','weBest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WeBest  $weBest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/we_best_image/');
            $oldImage = WeBest::where('id',$id)->value('image');
            @unlink($oldImage);

            $updateData = array(
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
            );

        } else {
            $updateData = array(
                'title' => $request->title,
                'description' => $request->description,
            );
        }
        
        WeBest::where('id',$id)->update($updateData);
        return back()->with('success','Our Products is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WeBest  $weBest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldImage = WeBest::where('id',$id)->value('image');
        @unlink($oldImage);
        WeBest::where('id',$id)->delete();
        return back()->with('success',"Our Products is deleted successfully!");
    }
}
