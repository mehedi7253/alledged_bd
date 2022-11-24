<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:menu-settings', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Menu::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('menu.edit',$row->id).'" title="Edit" class="edit btn btn-info btn-sm">Edit</a> <a href="'.route('menu.show',$row->id).'" class="edit btn btn-primary btn-sm" title="View">View</a> <a href="'.route('menu.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete">Delete</a><form id="delete_form_'.$row->id.'" action="'.route('menu.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'Menu List';
        $menu = 'Menu Settings';
        return view('backend.menu.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Menu Create';
        $menu = 'Menu Settings';
        $menus = Menu::get();
        return view('backend.menu.create',compact('title','menu','menus'));
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
            'name' => 'required|max:255|unique:menus,name',
            'slug' => 'required|max:255|unique:menus,slug'
        ]);

        if ($request->file('background_image')) {
            $background_image = $this->uploadImage($request->file('background_image'), 'uploads/menu_background_image/');
        } else {
            $background_image = null;
        }

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->slug = $request->slug;
        $menu->background_image = $background_image;
        $menu->heading = $request->heading;
        $menu->parent = $request->parent;
        $menu->outer_link = $request->outer_link;
        $menu->h_title = $request->h_title;
        $menu->save();
        return redirect('menu')->with('success','Menu is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Menu Show';
        $menu = 'Menu Settings';
        $menuData = Menu::findOrFail($id);
        $menus = Menu::get();
        return view('backend.menu.show',compact('title','menu','menuData','menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Menu Edit';
        $menu = 'Menu Settings';
        $menuData = Menu::findOrFail($id);
        $menus = Menu::get();
        return view('backend.menu.edit',compact('title','menu','menuData','menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255|unique:menus,name,'.$id,
            'slug' => 'required|max:255|unique:menus,slug,'.$id
        ]);


        if ($request->file('background_image')) {
            $background_image = $this->uploadImage($request->file('background_image'), 'uploads/menu_background_image/');
            $oldImage = Menu::where('id',$id)->value('background_image');
            if($oldImage){
                @unlink($oldImage);
            }
            $updateData = array(
                'name' => $request->name,
                'slug' => $request->slug,
                'outer_link' => $request->outer_link,
                'parent' => $request->parent,
                'heading' => $request->heading,
                'h_title' => $request->h_title,
                'background_image' => $background_image,
            );
        } else {
            $updateData = array(
                'name' => $request->name,
                'slug' => $request->slug,
                'outer_link' => $request->outer_link,
                'parent' => $request->parent,
                'h_title' => $request->h_title,
                'heading' => $request->heading,
            );
        }
        // dd($updateData);
        Menu::where('id',$id)->update($updateData);
        return back()->with('success','Menu is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();
        return back()->with('success','Menu is deleted successfully!');
    }
}
