<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use DataTables;

class SocialLinkController extends Controller
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
            $data = SocialLink::orderByDesc('id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('product_category', function($row){
                        $categoryName = BlogCategory::where('id',$row->product_category)->value('name');
                        return '<span>'.$categoryName.'</span>';
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('social-link.edit',$row->id).'" title="Edit" class="btn btn-info btn-sm"><i class="fal fa-edit"></i></a> <a href="'.route('social-link.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a><form id="delete_form_'.$row->id.'" action="'.route('social-link.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','product_category'])
                    ->make(true);
        }
        $title = 'Product Brand List';
        $menu = 'Product';
        return view('backend.social-link.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Product Brand Add';
        $menu = 'Product';
        $product_category = BlogCategory::where('level',2)->get();
        return view('backend.social-link.create',compact('title','menu','product_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'name' => 'required|max:255',
            'product_category' => 'required',
        ]);

        $socialLink = new SocialLink();
        $socialLink->name = $request->name;
        $socialLink->product_category = $request->product_category;
        $socialLink->page_title=$request->page_title;
        $socialLink->page_des=$request->page_description;
        $socialLink->save();
        return redirect('social-link')->with('success','Product Brand is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = 'Product Brand Update';
        $menu = 'Product';
        $socialLink = SocialLink::findOrFail($id);
        //dd($socialLink);
        $product_category = BlogCategory::where('level',2)->get();
        return view('backend.social-link.edit',compact('title','menu','socialLink','product_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request,[
            'name' => 'required',
            'product_category' => 'required',
        ]);

        $updateData = array(
            'name' => $request->name,
            'product_category' => $request->product_category,
            'page_title'=>$request->page_title,
            'page_des'=>$request->page_description,
        );

        SocialLink::where('id',$id)->update($updateData);
        return back()->with('success','Product Brand is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        SocialLink::findOrFail($id)->delete();
        return back()->with('success','Product Brand is deleted successfully!');
    }
}
