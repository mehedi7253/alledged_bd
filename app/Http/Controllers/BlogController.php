<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use DataTables;

class BlogController extends Controller
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

            $data = Blog::orderByDesc('id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('category_id', function($row){
                            $categoryName = BlogCategory::where('id',$row->category_id)->value('name');
                            $btn = '<span>'.$categoryName.'</span>';
                            return $btn;
                    })
                    ->addColumn('brand_id', function($row){
                            $brandName = SocialLink::where('id',$row->brand_id)->value('name');
                            $btn = '<span>'.$brandName.'</span>';
                            return $btn;
                    })
                    ->addColumn('image', function($row){
                        if($row->image){
                            $btn = '<img src="'.asset($row->image).'" width="100" height="100" alt="image">';
                        }else{
                            $btn = '';
                        }
                            return $btn;
                    })
                    ->addColumn('pdf_file', function($row){
                        if($row->image){
                            $btn = '<img src="'.asset($row->pdf_file).'" width="100" height="100" alt="image">';
                        }else{
                            $btn = '';
                        }
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('blog.show',$row->id).'" title="View" class="btn btn-success btn-sm"><i class="fal fa-eye"></i></a> <a href="'.route('blog.edit',$row->id).'" title="Edit" class="btn btn-info btn-sm"><i class="fal fa-edit"></i></a> <a href="'.route('blog.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a><form id="delete_form_'.$row->id.'" action="'.route('blog.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','category_id','brand_id','image','pdf_file',])
                    ->make(true);
        }
        $title = 'Product List';
        $menu = 'Product';
        return view('backend.blog.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Product Create';
        $menu = 'Product';
        $blogCategory = BlogCategory::whereNotNull('parent')->get();
        $socialLink = SocialLink::get();
        return view('backend.blog.create',compact('title','menu','blogCategory','socialLink'));
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
            'category_id' => 'required',
            'brand_id' => 'required',
            //'video_code' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            //'pdf_file' => 'required|mimes:pdf',
        ]);

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/product_image/');
        } else {
            $image = null;
        }

        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $pdf_file = 'public/uploads/product_pdf/pdf_'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/product_pdf/';
            $file->move($destinationPath,$pdf_file);
        } else {
            $pdf_file = null;
        }

        $blog = new Blog();
        $blog->category_id = $request->category_id;
        $blog->brand_id = $request->brand_id;
        $blog->name= $request->name;
        $blog->image = $image;
        $blog->pdf_file = $pdf_file;
        $blog->video_code = $request->video_code;
        $blog->page_title=$request->page_title;
        $blog->page_des=$request->page_description;
        $blog->save();
        return redirect('blog')->with('success','Blog is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $title = 'Product Detail';
        $menu = 'Product';
        $blogCategory = BlogCategory::whereNotNull('parent')->get();
        $socialLink = SocialLink::get();
        $blog = Blog::findOrFail($id);
        return view('backend.blog.show',compact('blog','title','menu','blogCategory','socialLink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Product Show';
        $menu = 'Product';
        $blogCategory = BlogCategory::whereNotNull('parent')->get();
        $socialLink = SocialLink::get();
        $blog = Blog::findOrFail($id);
        return view('backend.blog.edit',compact('blog','title','menu','blogCategory','socialLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'brand_id' => 'required',
            //'video_code' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
            //'pdf_file' => 'mimes:pdf',
        ]);

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/product_image/');
            $oldImage = Blog::where('id',$id)->value('image');
            @unlink($oldImage);

            $newImage = array(
                'image' => $image,
            );
        } else {
            $newImage = array();
        }

        if ($request->file('pdf_file')) {
            $file = $request->file('pdf_file');
            $pdf_file = 'public/uploads/product_pdf/pdf_'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/product_pdf/';
            $file->move($destinationPath,$pdf_file);

            $oldPdfFile = Blog::where('id',$id)->value('pdf_file');
            @unlink($oldPdfFile);

            $newPdfFile = array(
                'pdf_file' => $pdf_file,
            );
        } else {
            $newPdfFile = array();
        }

        $postData = array(
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'video_code' => $request->video_code,
            'name'=> $request->name,
            'page_title'=>$request->page_title,
            'page_des'=>$request->page_description
        );

        $updateData = array_merge($newImage,$newPdfFile,$postData);
        Blog::where('id',$id)->update($updateData);
        return redirect()->route('blog.index')->with('success','Product is saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = Blog::where('id',$id)->value('image');
        @unlink($oldImage);

        $oldPdfFile = Blog::where('id',$id)->value('pdf_file');
        @unlink($oldPdfFile);

        Blog::findOrFail($id)->delete();
        return back()->with('success','Product is deleted successfully!');
    }
}
