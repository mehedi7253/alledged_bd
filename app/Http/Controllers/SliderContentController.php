<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Slider;
use App\Models\SliderContent;
use Illuminate\Http\Request;
use DataTables;

class SliderContentController extends Controller
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
            $data = SliderContent::orderByDesc('slider_contents.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('menu_id', function($row){
                            $menuName = Menu::where('id',$row->menu_id)->value('name');
                            $btn = '<span>'.$menuName.'</span>';
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
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('slider-content.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('slider-content.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('slider-content.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image','menu_id'])
                    ->make(true);
        }
        $title = "Services Content List";
        $menu = "Services";
        return view('backend.slider-content.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Services Content Add";
        $menu = "Services";
        $childMenu = Menu::where('parent',4)->get();
        return view('backend.slider-content.create',compact('title','menu','childMenu'));
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
            'menu_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_content_image/');
        } else {
            $image = null;
        }

        $sliderContent = new SliderContent();
        $sliderContent->menu_id = $request->menu_id;
        $sliderContent->title = $request->title;
        $sliderContent->description = $request->description;
        $sliderContent->image = $image;
        $sliderContent->save();
        return redirect()->route('slider-content.index')->with('success','Services content is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SliderContent  $sliderContent
     * @return \Illuminate\Http\Response
     */
    public function show(SliderContent $sliderContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SliderContent  $sliderContent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Services Content Edit";
        $menu = "Services";
        $childMenu = Menu::where('parent',4)->get();
        $sliderContent = SliderContent::findOrFail($id);
        return view('backend.slider-content.edit',compact('title','menu','childMenu','sliderContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SliderContent  $sliderContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'menu_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_content_image/');
            $oldImage = SliderContent::where('id',$id)->value('image');
            @unlink($oldImage);

            $updateData = array(
                'menu_id' => $request->menu_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
            );
        } else {
            $updateData = array(
                'menu_id' => $request->menu_id,
                'title' => $request->title,
                'description' => $request->description,
            );
        }
        SliderContent::where('id',$id)->update($updateData);
        return back()->with('success','Services content is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderContent  $sliderContent
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = SliderContent::where('id',$id)->value('image');
        @unlink($oldImage);
        SliderContent::where('id',$id)->delete();
        return back()->with('success',"Services content is deleted successfully!");
    }
}
