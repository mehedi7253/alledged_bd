<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:seo-settings', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index()
    {
        $seo = Seo::first();
        if ($seo) {
            $title = "SEO Settings Edit";
            $menu = "SEO Settings";
            return view('backend.seo.edit',compact('title','menu','seo'));
        } else {
            $title = "SEO Settings Add";
            $menu = "SEO Settings";
            return view('backend.seo.create',compact('title','menu'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'author' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'revisit_after' => 'required',
            'robots' => 'required',
            'google_bot' => 'required',
            'og_url' => 'required',
            'og_title' => 'required',
            'og_description' => 'required',
            'canonical' => 'required',
            'alternate' => 'required',
        ]);
        $seo = new Seo();
        $seo->author = $request->author;
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keyword = $request->keyword;
        $seo->revisit_after = $request->revisit_after;
        $seo->robots = $request->robots;
        $seo->google_bot = $request->google_bot;
        $seo->og_url = $request->og_url;
        $seo->og_title = $request->og_title;
        $seo->og_description = $request->og_description;
        $seo->canonical = $request->canonical;
        $seo->alternate = $request->alternate;
        $seo->save();
        return redirect('seo')->with('success','Seo is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function show(Seo $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function edit(Seo $seo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'author' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',
            'revisit_after' => 'required',
            'robots' => 'required',
            'google_bot' => 'required',
            'og_url' => 'required',
            'og_title' => 'required',
            'og_description' => 'required',
            'canonical' => 'required',
            'alternate' => 'required',
        ]);
        $updateData = array(
            'author' => $request->author,
            'title' => $request->title,
            'description' => $request->description,
            'keyword' => $request->keyword,
            'revisit_after' => $request->revisit_after,
            'robots' => $request->robots,
            'google_bot' => $request->google_bot,
            'og_url' => $request->og_url,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'canonical' => $request->canonical,
            'alternate' => $request->alternate,
        );
        Seo::where('id',$id)->update($updateData);
        return back()->with('success','Seo is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seo  $seo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seo $seo)
    {
        //
    }
}
