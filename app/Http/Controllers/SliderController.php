<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use DataTables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:sliders', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Slider::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                           if($row->image){
                               $btn = '<img src="'.asset($row->image).'" width="100" height="100" alt="image">';
                           }else{
                               $btn = '';
                           }
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('slider.edit',$row->id).'" title="Edit" class="edit btn btn-info btn-sm">Edit</a> <a href="'.route('slider.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete">Delete</a><form id="delete_form_'.$row->id.'" action="'.route('slider.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['image','action'])
                    ->make(true);
        }
        $title = 'Slider List';
        $menu = 'Sliders';
        return view('backend.slider.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Slider Add';
        $menu = 'Sliders';
        return view('backend.slider.create',compact('title','menu'));
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
            'image_text_2' => 'max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'icon_image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/slider_image/');
        } else {
            $image = null;
        }

        if ($request->file('icon_image')) {
            $icon_image = $this->uploadImage($request->file('icon_image'), 'uploads/slider_icon_image/');
        } else {
            $icon_image = null;
        }

        $slider = new Slider();
        $slider->image_text = $request->image_text;
        $slider->image_text_2 = $request->image_text_2;
        $slider->image = $image;
        $slider->icon_image = $icon_image;
        $slider->save();
        return redirect('slider')->with('success','Slider is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = 'Slider Edit';
        $menu = 'Sliders';
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit',compact('title','menu','slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image_text' => 'max:255',
            'image_text_2' => 'max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
            'icon_image' => 'image|mimes:png,jpg,jpeg',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/slider_image/');
            $oldImage = Slider::where('id',$id)->value('image');
            @unlink($oldImage);

            $newSliderImage = array(
                'image' => $image,
            );
        } else {
            $newSliderImage = array();
        }

        if ($request->file('icon_image')) {
            $icon_image = $this->uploadImage($request->file('icon_image'), 'uploads/slider_icon_image/');
            $oldIconImage = Slider::where('id',$id)->value('icon_image');
            @unlink($oldIconImage);

            $newIconImage = array(
                'icon_image' => $icon_image,
            );
        } else {
            $newIconImage = array();
        }


        $formData = array(
            'image_text' => $request->image_text,
            'image_text_2' => $request->image_text_2,
        );
        $updateData = array_merge($formData,$newSliderImage,$newIconImage);
        Slider::where('id',$id)->update($updateData);
        return back()->with('success','Slider is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = Slider::where('id',$id)->value('image');
        @unlink($oldImage);

        $oldIconImage = Slider::where('id',$id)->value('icon_image');
        @unlink($oldIconImage);

        Slider::findOrFail($id)->delete();
        return back()->with('success','Slider is deleted successfully!');
    }
}
