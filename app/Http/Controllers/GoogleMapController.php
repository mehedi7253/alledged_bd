<?php

namespace App\Http\Controllers;

use App\Models\GoogleMap;
use Illuminate\Http\Request;

class GoogleMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:company-settings', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index()
    {
        $googleMap = GoogleMap::first();
        if ($googleMap) {
            $title = 'Google Map';
            $menu = 'Company Settings';
            return view('backend.google-map.edit',compact('title','menu','googleMap'));
        } else {
            $title = 'Google Map';
            $menu = 'Company Settings';
            return view('backend.google-map.create',compact('title','menu',));
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
            'url' => 'required',
        ]);
        $googleMap = new GoogleMap();
        $googleMap->url = $request->url;
        $googleMap->save();
        return redirect('/google-map')->with('success','Google map is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoogleMap  $googleMap
     * @return \Illuminate\Http\Response
     */
    public function show(GoogleMap $googleMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoogleMap  $googleMap
     * @return \Illuminate\Http\Response
     */
    public function edit(GoogleMap $googleMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GoogleMap  $googleMap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'url' => 'required',
        ]);
        $updateData = array(
            'url' => $request->url, 
        );
        GoogleMap::where('id',$id)->update($updateData);
        return back()->with('success','Google map is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoogleMap  $googleMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoogleMap $googleMap)
    {
        //
    }
}
