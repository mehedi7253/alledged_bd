<?php
namespace App\Http\Controllers;

use App\Models\Msw;
use App\Models\Pf;
use Illuminate\Http\Request;
use DataTables;
use DB;

class PfController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pf::orderByDesc('pfs.id')->get();
            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('pf.edit',$row->id).'" title="Reply" class="edit btn btn-secondary btn-sm"><i class="fal fa-reply"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('pf.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('pf.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'Portfolio List';
        $menu = 'Portfolio';
        return view('backend.pf.index',compact('title','menu'));
    }

    public function create()
    {
        $brands = DB::table("social_links")->get();
        $title = 'New Portfolio';
        $menu = 'Portfolio';
        return view('backend.pf.create',compact('title','menu','brands'));
    }

    public function store(Request $request)
    {
        $p=new Pf();
        $p->brand_id = $request->brand;
        $p->icon = $request->icon;
        $p->des = $request->des;
        $p->title = $request->name;

        if($p->save()){
            return redirect()->route('pf.index')->with('success','Portfolio added successfully!');
        }
    }

    public function edit($id)
    {
        $title = 'Update Portfolio';
        $menu = 'Portfolio';
        $pfs = Pf::findOrFail($id);
        $brands = DB::table("social_links")->get();
        return view('backend.pf.edit',compact('title','menu','pfs','brands'));
    }

    public function update(Request $request,$id)
    {
        $p=Pf::findOrFail($id);
        $p->brand_id = $request->brand;
        $p->icon = $request->icon;
        $p->des = $request->des;
        $p->title = $request->name;

        if($p->save()){
            return redirect()->route('pf.index')->with('success','Portfolio Updated successfully!');
        }
    }

    public function destroy($id)
    {
        Pf::findOrFail($id)->delete();
        return back()->with('success','Portfolio is deleted successfully!');
    }


}
