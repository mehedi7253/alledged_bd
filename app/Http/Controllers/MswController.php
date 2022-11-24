<?php

namespace App\Http\Controllers;

use App\Models\Msw;
use App\Models\Menu;
use Illuminate\Http\Request;
use DB;
use DataTables;

class MswController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Msw::orderByDesc('msws.id')->get();
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
                            $btn = '';
                            $btn .= '<a href="'.route('msw.edit',$row->id).'" title="Reply" class="edit btn btn-secondary btn-sm"><i class="fal fa-reply"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('msw.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('msw.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'Moving Seftly List';
        $menu = 'Moving Seftly';
        $msw = Msw::all();
        return view("backend.msw.index",['msws'=>$msw,'title'=>$title,'menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Moving Seftly";
        $menu = "Moving";
        $brands = DB::table("social_links")->get();
        $childMenu = Menu::where('parent',4)->get();
        return view('backend.msw.create',['title'=>$title,'menu'=>$menu,'childMenu'=>$childMenu,'brands'=>$brands]);
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
            'title' => 'required',
            'description' => 'required',
            'brand'=>'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_content_image/');
        } else {
            $image = null;
        }

        $p = new Msw();
        $p->brand_id = $request->brand;
        $p->img = $image;
        $p->des = $request->description;
        $p->title = $request->name;

        if($p->save()){
            return redirect()->route('msw.index')->with('success','Moving Seftly added successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Msw  $msw
     * @return \Illuminate\Http\Response
     */
    public function show(Msw $msw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Msw  $msw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = "Moving Seftly";
        $menu = "Moving";
        $brands = DB::table("social_links")->get();
        $childMenu = Menu::where('parent',4)->get();
        $items = Msw::findOrFail($id);
        return view('backend.msw.edit',compact('title','menu','childMenu','items','brands'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Msw  $msw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $title = "Moving Seftly";
        $menu = "Moving";
        $childMenu = Menu::where('parent',4)->get();
        $p = Msw::findOrFail($id);

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/services_content_image/');
            $oldImage = Msw::where('id',$id)->value('img');
            @unlink($oldImage);

        }else{
            $image = $p->img;
        }

        $p->brand_id = $request->brand;
        // dd($request->brand);
        $p->img = $image;
        $p->des = $request->image_text_2;
        $p->title = $request->title;
        $p->save();

        return redirect()->route('msw.index')->with('success','Moving Seftly Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Msw  $msw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        msw::findOrFail($id)->delete();
        return back()->with('success','Catalog deleted successfully!');
    }
}
