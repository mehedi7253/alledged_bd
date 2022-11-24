<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuContent;
use Illuminate\Http\Request;
use DataTables;

class MenuContentController extends Controller
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
            $data = MenuContent::get();
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
                           $btn = '<a href="'.route('menu-content.edit',$row->id).'" title="Edit" class="edit btn btn-info btn-sm">Edit</a> <a href="'.route('menu-content.show',$row->id).'" class="edit btn btn-primary btn-sm" title="View">View</a> <a href="'.route('menu-content.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete">Delete</a><form id="delete_form_'.$row->id.'" action="'.route('menu-content.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['menu_id','action'])
                    ->make(true);
        }
        $title = 'Business Content List';
        $menu = 'Business';
        return view('backend.menu-content.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Business Content Add';
        $menu = 'Business';
        $childMenus = Menu::select('id','name')->get();
        return view('backend.menu-content.create',compact('title','menu','childMenus'));
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
            'footer' => 'required',
            'menu_id' => 'required|unique:menu_contents,menu_id'
        ]);

        $menuContent = new MenuContent();
        $menuContent->menu_id = $request->menu_id;
        $menuContent->title = $request->title;
        $menuContent->description = $request->description;
        $menuContent->footer = $request->footer;
        $menuContent->save();
        return redirect()->route('menu-content.index')->with('success','Business Content is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuContent  $menuContent
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $title = 'Business Content View';
        $menu = 'Business';
        $childMenus = Menu::select('id','name')->get();
        $menuContent = MenuContent::where('id',$id)->first();
        return view('backend.menu-content.show',compact('title','menu','childMenus','menuContent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuContent  $menuContent
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = 'Business Content Edit';
        $menu = 'Business';
        $childMenus = Menu::select('id','name')->get();
        $menuContent = MenuContent::where('id',$id)->first();
        return view('backend.menu-content.edit',compact('title','menu','childMenus','menuContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuContent  $menuContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description' => 'required',
            'menu_id' => 'required|unique:menu_contents,menu_id,'.$id,
        ]);
        $updateData = array(
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'description' => $request->description,
            'footer' => $request->footer,
        );
        MenuContent::where('id',$id)->update($updateData);
        return back()->with('success','Business Content is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuContent  $menuContent
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        MenuContent::where('id',$id)->delete();
        return back()->with("success",'Business Content is deleted successfully!');
    }
}
