<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use DataTables;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:blog', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BlogCategory::orderByDesc('id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('parent', function($row){
                            $parentName = BlogCategory::where('id',$row->parent)->value('name');
                            $btn = '<span>'.$parentName.'</span>';
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('blog-category.edit',$row->id).'" title="Edit" class="btn btn-info btn-sm"><i class="fal fa-edit"></i></a> <a href="'.route('blog-category.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a><form id="delete_form_'.$row->id.'" action="'.route('blog-category.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','parent'])
                    ->make(true);
        }
        $title = 'Product Category List';
        $menu = 'Product';
        return view('backend.blog-category.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Product Category Add';
        $menu = 'Product';
        $blogCategoryList = BlogCategory::whereNull('parent')->get();
        return view('backend.blog-category.create',compact('title','menu','blogCategoryList'));
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
            'name' => 'required|max:255|unique:blog_categories,name',
        ]);
        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->parent = $request->parent;
        $blogCategory->title = $request->title;
        $blogCategory->short_description = $request->short_description;
        $blogCategory->description = $request->description;
        $blogCategory->level =  ($request->parent)?"2":"1";
        $blogCategory->save();
        return redirect('blog-category')->with('success','Product Category is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Product Category Edit';
        $menu = 'Product';
        $blogCategory = BlogCategory::where('id',$id)->first();
        $blogCategoryList = BlogCategory::whereNull('parent')->get();
        return view('backend.blog-category.edit',compact('title','menu','blogCategory','blogCategoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255|unique:blog_categories,name,'.$id,
        ]);
        $updateData = array(
            'name' => $request->name,
            'parent' => $request->parent,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'level'=>($request->parent)?"2":"1",
        );
        BlogCategory::where('id',$id)->update($updateData);
        return back()->with('success','Product Category is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        BlogCategory::where('id',$id)->delete();
        return back()->with('success','Product Category is deleted successfully!');
    }

    public function subCategory($id)
    {
        $subs = BlogCategory::where('parent',$id)->get();
        return json_encode($subs);
    }
    public function subCategoryDetail($id)
    {
        $detail = BlogCategory::where('id',$id)->first();
        return json_encode($detail);
    }

    public function brandList($id)
    {
        $brand = SocialLink::where('product_category',$id)->get();
        return json_encode($brand);
    }

    public function productList($catId, $brandId)
    {
        $product = Blog::where('category_id',$catId)->where('brand_id',$brandId)->get();
        return json_encode($product);
    }
}
