<?php

namespace App\Http\Controllers;

use App\Models\OfficeHour;
use Illuminate\Http\Request;
use DataTables;

class OfficeHourController extends Controller
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
    public function index(Request $request)
    {
        $officeHour = OfficeHour::first();
        if (!$officeHour) {
            $title = 'Career Add';
            $menu = 'Career';
            return view('backend.office-hour.create',compact('title','menu'));
        } else {
            $title = 'Career Add';
            $menu = 'Career';
            return view('backend.office-hour.edit',compact('title','menu','officeHour'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'description' => 'required',
        ]);
        $officeHour = new OfficeHour();
        $officeHour->description = $request->description;
        $officeHour->save();
        return redirect()->route('office-hour.index')->with('success','Career is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeHour  $officeHour
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeHour $officeHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeHour  $officeHour
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeHour  $officeHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description' => 'required',
        ]);
        $updateData = array(
            'description' => $request->description,
        );
        OfficeHour::where('id',$id)->update($updateData);
        return back()->with('success','Career is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeHour  $officeHour
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

    }
}
