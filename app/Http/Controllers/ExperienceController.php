<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Menu;
use Illuminate\Http\Request;
use DataTables;

class ExperienceController extends Controller
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
            $data = Experience::get();
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
                           $btn = '<a href="'.route('experience.edit',$row->id).'" title="Edit" class="edit btn btn-info btn-sm">Edit</a> <a href="'.route('experience.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete">Delete</a><form id="delete_form_'.$row->id.'" action="'.route('experience.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['menu_id','image','action'])
                    ->make(true);
        }
        $title = 'Business Content Image List';
        $menu = 'Business';
        return view('backend.experience.index',compact('title','menu'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Business Content Image Add';
        $menu = 'Business';
        $childMenus = Menu::select('id','name')->get();
        return view('backend.experience.create',compact('title','menu','childMenus'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/business_content/');
        } else {
            $image = null;
        }
        $experience = new Experience();
        $experience->menu_id = $request->menu_id;
        $experience->title = $request->title;
        $experience->image = $image;
        $experience->save();
        return redirect()->route('experience.index')->with('success','Business content image is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Business Content Image Edit';
        $menu = 'Business';
        $childMenus = Menu::select('id','name')->get();
        $experience =  Experience::findOrFail($id);
        return view('backend.experience.edit',compact('title','menu','childMenus','experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'menu_id' => 'required',
            'title' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/business_content/');
            $oldImage = Experience::where('id',$id)->value('image');
            @unlink($oldImage);
            $updateData = array(
                'menu_id' => $request->menu_id,
                'title' => $request->title,
                'image' => $image,
            );
        } else {
            $updateData = array(
                'menu_id' => $request->menu_id,
                'title' => $request->title
            );
        }
        Experience::where('id',$id)->update($updateData);
        return redirect()->route('experience.index')->with('success','Image is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldImage = Experience::where('id',$id)->value('image');
        @unlink($oldImage);
        Experience::where('id',$id)->delete();
        return back()->with('success','Image is deleted successfully!');
    }
}
