<?php

namespace App\Http\Controllers;

use App\Models\Youtubevideo;
use Illuminate\Http\Request;
use DataTables;
use DB;

class YoutubevideoController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Youtubevideo::orderByDesc('youtube_video.id')->get();
            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('youtube.edit',$row->id).'" title="Reply" class="edit btn btn-secondary btn-sm"><i class="fal fa-reply"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('youtube.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('youtube.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'Video List';
        $menu = 'Youtube Video';
        return view('backend.youtube.index',compact('title','menu'));
    }

    public function create()
    {
        $title = 'New Video';
        $menu = 'Youtube Video';
        $brands = DB::table("social_links")->get();
        return view('backend.youtube.create',compact('title','menu','brands'));
    }

    public function store(Request $request)
    {
        $p=new Youtubevideo();
        $brands = DB::table("social_links")->get();
        $p->video_link = $request->link;
        $p->title = $request->name;
        if($p->save()){
            return redirect()->route('youtube.index')->with('success','Youtube Video added successfully!');
        }
    }

    public function edit($id)
    {
        $title = 'Update Video';
        $menu = 'Youtube Video';
        $pfs = Youtubevideo::findOrFail($id);
        $brands = DB::table("social_links")->get();
        return view('backend.youtube.edit',compact('title','menu','pfs','brands'));
    }

    public function update(Request $request,$id)
    {
        $p=Youtubevideo::findOrFail($id);
        $p->brand_id = $request->brand;
        $p->video_link = $request->link;
        $p->title = $request->name;

        if($p->save()){
            return redirect()->route('youtube.index')->with('success','Youtube Video Updated successfully!');
        }
    }

    public function destroy($id)
    {
        Youtubevideo::findOrFail($id)->delete();
        return back()->with('success','Youtube Video is deleted successfully!');
    }

}
