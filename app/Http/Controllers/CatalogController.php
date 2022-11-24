<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use DataTables;
use DB;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Catalog::orderByDesc('catalogs.id')->get();
            // dd($data);
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
                            $btn .= '<a href="'.route('catalog.edit',$row->id).'" title="Reply" class="edit btn btn-secondary btn-sm"><i class="fal fa-reply"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('catalog.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('catalog.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $catalogs = Catalog::all();
        $title = 'Catalog List';
        $menu = 'Catalog';
        return view('backend.catalog.index',compact('title','menu','catalogs'));
    }

    public function create()
    {
        $title = 'New Catalog';
        $menu = 'Catalog';
        $brands = DB::table("social_links")->get();
        return view('backend.catalog.create',compact('title','menu','brands'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'name' => 'required',
            'des_title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image',
            'pdf' => 'required|mimes:csv,txt,xlx,xls,pdf',
        ]);

        if ($request->file('image')) {
            //dd(1);
            $image = $this->uploadImage($request->file('image'), 'uploads/services_content_image/');
        } else {
            //dd(0);
            $image = null;
        }


        if($request->hasFile('pdf')){
            $file = $request->file('pdf');
            $name = $file->getClientOriginalName();
            $file->move(public_path()."/"."uploads/services_content_image/", $name);
        }

        $p=new Catalog();
        $p->brand_id = $request->brand;
        $p->pdf = 'public/uploads/services_content_image/'.$name;
        $p->image = $image;
        $p->dis_title = $request->des_title;
        $p->dis = $request->description;
        $p->title = $request->name;

        if($p->save()){
            return redirect()->route('catalog.index')->with('success','Catalog added successfully!');
        }
    }

    public function edit($id)
    {
        $brands = DB::table("social_links")->get();
        $title = 'Update Catalog';
        $menu = 'Catalog';
        $pfs  = Catalog::findOrFail($id);
        return view('backend.catalog.edit',compact('title','menu','pfs','brands'));
    }

    public function update(Request $request,$id)
    {
        // dd($request->all());

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/slider_image/');
            $oldImage = Catalog::where('id',$id)->value('image');
            @unlink($oldImage);
            $newimage = $image;
        } else {
            $newimage = Catalog::where('id',$id)->value('image');
        }

        if ($request->file('pdf')) {
            $file = $request->file('pdf');
            $name = $file->getClientOriginalName();
            $file->move(public_path()."/"."uploads/services_content_image/", $name);

            $oldPdf = Catalog::where('id',$id)->value('pdf');
            @unlink($oldPdf);
            $newpdf = $name;
        } else {
            $newpdf = Catalog::where('id',$id)->value('pdf');
        }

        $p=Catalog::findOrFail($id);
        $p->brand_id = $request->brand;
        $p->dis_title = $request->des_title;
        $p->dis = $request->description;
        $p->title = $request->name;

        $p->pdf = 'public/uploads/services_content_image/'.$newpdf;
        $p->image = $newimage;

        if($p->save()){
            return redirect()->route('catalog.index')->with('success','Catalog Updated successfully!');
        }
    }

    public function destroy($id)
    {
        Catalog::findOrFail($id)->delete();
        return back()->with('success','Catalog deleted successfully!');
    }
}
