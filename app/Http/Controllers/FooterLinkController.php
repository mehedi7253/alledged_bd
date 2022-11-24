<?php

namespace App\Http\Controllers;

use App\Models\FooterLink;
use Illuminate\Http\Request;
use DataTables;

class FooterLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:footer', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FooterLink::orderByDesc('footer_links.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('footer-link.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('footer-link.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('footer-link.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = "Footer Link List";
        $menu = "Footer";
        return view('backend.footer-link.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Footer Link Add";
        $menu = "Footer";
        return view('backend.footer-link.create',compact('title','menu'));
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
            'name' => 'required|max:255',
            'url' => 'max:255',
            'outer_link' => 'max:255',
        ]);
        $footerLink = new FooterLink();
        $footerLink->name = $request->name;
        $footerLink->url = $request->url;
        $footerLink->outer_link = $request->outer_link;
        $footerLink->save();
        return redirect('footer-link')->with('success','Footer link is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function show(FooterLink $footerLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = "Footer Link Edit";
        $menu = "Footer";
        $footerLink = FooterLink::findOrFail($id);
        return view('backend.footer-link.edit',compact('title','menu','footerLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'url' => 'required|max:255',
            'outer_link' => 'max:255',
        ]);
        $updateData = array(
            'name' => $request->name,
            'url' => $request->url,
            'outer_link' => $request->outer_link,
        );
        FooterLink::where('id',$id)->update($updateData);
        return back()->with('success','Footer link is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FooterLink  $footerLink
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        FooterLink::where('id',$id)->delete();
        return back()->with('success',"Footer link is deleted successfully");
    }
}
