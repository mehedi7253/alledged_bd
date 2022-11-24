<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:gallery-image', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::orderByDesc('galleries.id')->get();
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
                            $btn .= '<a href="'.route('gallery.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('gallery.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('gallery.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = "Gallery List";
        $menu = "Gallery";
        return view('backend.gallery.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Gallery Add";
        $menu = "Gallery";
        return view('backend.gallery.create',compact('title','menu'));
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
            'description' => 'required',
            'background_image' => 'required|image|mimes:png,jpg,jpeg',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'image_2' => 'required|image|mimes:png,jpg,jpeg',
            'image_3' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/gallery_image/');
        } else {
            $image = null;
        }
        if ($request->file('image_2')) {
            $image_2 = $this->uploadImage($request->file('image_2'), 'uploads/gallery_image/');
        } else {
            $image_2 = null;
        }
        if ($request->file('image_3')) {
            $image_3 = $this->uploadImage($request->file('image_3'), 'uploads/gallery_image/');
        } else {
            $image_3 = null;
        }
        if ($request->file('background_image')) {
            $background_image = $this->uploadImage($request->file('background_image'), 'uploads/gallery_image/');
        } else {
            $background_image = null;
        }
        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->image = $image;
        $gallery->background_image = $background_image;
        $gallery->image_2 = $image_2;
        $gallery->image_3 = $image_3;
        $gallery->save();
        return redirect('gallery')->with('success','Image is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Gallery Edit";
        $menu = "Gallery";
        $gallery = Gallery::findOrFail($id);
        return view('backend.gallery.edit',compact('title','menu','gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/gallery_image/');
            $oldImage = Gallery::where('id',$id)->value('image');
            @unlink($oldImage);

            $image_1 = array(
                'image' => $image,
            );
        } else {
            $image_1 = array();
        }
        if ($request->file('image_2')) {
            $image2 = $this->uploadImage($request->file('image_2'), 'uploads/gallery_image/');
            $oldImage2 = Gallery::where('id',$id)->value('image_2');
            @unlink($oldImage2);

            $image_2 = array(
                'image_2' => $image2,
            );
        } else {
            $image_2 = array();
        }
        if ($request->file('image_3')) {
            $image3 = $this->uploadImage($request->file('image_3'), 'uploads/gallery_image/');
            $oldImage3 = Gallery::where('id',$id)->value('image_3');
            @unlink($oldImage3);

            $image_3 = array(
                'image_3' => $image3,
            );
        } else {
            $image_3 = array();
        }
        if ($request->file('background_image')) {
            $background_image_new = $this->uploadImage($request->file('background_image'), 'uploads/gallery_image/');
            $oldBackgroundImage = Gallery::where('id',$id)->value('background_image');
            @unlink($oldBackgroundImage);

            $background_image = array(
                'background_image' => $background_image_new,
            );
        } else {
            $background_image = array();
        }
        
        $formData = array(
            'title' => $request->title,
            'description' => $request->description,
        );
        $updateData = array_merge($formData,$image_3,$image_2,$image_1,$background_image);
        Gallery::where('id',$id)->update($updateData);
        return back()->with('success','Image is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldImage = Gallery::where('id',$id)->value('image');
        @unlink($oldImage);
        $oldImage2 = Gallery::where('id',$id)->value('image_2');
        @unlink($oldImage2);
        $oldImage3 = Gallery::where('id',$id)->value('image_3');
        @unlink($oldImage3);
        $oldbackground_image = Gallery::where('id',$id)->value('background_image');
        @unlink($oldbackground_image);
        Gallery::findOrFail($id)->delete();
        return back()->with('success','Image is deleted successfully!');
    }
}
