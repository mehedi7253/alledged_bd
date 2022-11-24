<?php

namespace App\Http\Controllers;

use App\Models\Greeting;
use Illuminate\Http\Request;

class GreetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Greeting";
        $menu = "About Us";
        $greeting = Greeting::first();
        return view('backend.greeting.index',compact('title','menu','greeting'));
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
            'title' => 'required|max:255',
            'description' => 'required',
            'footer' => 'required',
            'first_point_title' => 'required',
            'first_point_description' => 'required',
            'second_point_title' => 'required',
            'second_point_description' => 'required',
            'third_point_title' => 'required',
            'third_point_description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/greeting/');
        } else {
            $image = null;
        }

        $greeting = new Greeting();
        $greeting->title = $request->title;
        $greeting->description = $request->description;
        $greeting->first_point_title = $request->first_point_title;
        $greeting->first_point_description = $request->first_point_description;
        $greeting->second_point_title = $request->second_point_title;
        $greeting->second_point_description = $request->second_point_description;
        $greeting->third_point_title = $request->third_point_title;
        $greeting->third_point_description = $request->third_point_description;
        $greeting->footer = $request->footer;
        $greeting->image = $image;
        $greeting->save();

        return redirect()->route('greeting.index')->with('success','Greeting is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Greeting  $greeting
     * @return \Illuminate\Http\Response
     */
    public function show(Greeting $greeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Greeting  $greeting
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Greeting  $greeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
            'footer' => 'required',
            'first_point_title' => 'required',
            'first_point_description' => 'required',
            'second_point_title' => 'required',
            'second_point_description' => 'required',
            'third_point_title' => 'required',
            'third_point_description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
        ]);

        if ($request->file('image')) {
            $oldImage = Greeting::where('id',$id)->value('image');
            @unlink($oldImage);
            $image = $this->uploadImage($request->file('image'), 'uploads/greeting/');

            $updateData = array(
                'title' => $request->title,
                'description' => $request->description,
                'first_point_title' => $request->first_point_title,
                'first_point_description' => $request->first_point_description,
                'second_point_title' => $request->second_point_title,
                'second_point_description' => $request->second_point_description,
                'third_point_title' => $request->third_point_title,
                'third_point_description' => $request->third_point_description,
                'footer' => $request->footer,
                'image' => $image,
            );
        } else {
            $updateData = array(
                'title' => $request->title,
                'description' => $request->description,
                'first_point_title' => $request->first_point_title,
                'first_point_description' => $request->first_point_description,
                'second_point_title' => $request->second_point_title,
                'second_point_description' => $request->second_point_description,
                'third_point_title' => $request->third_point_title,
                'third_point_description' => $request->third_point_description,
                'footer' => $request->footer,
            );
        }
        Greeting::where('id',$id)->update($updateData);
        return redirect()->route('greeting.index')->with('success','Greeting is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Greeting  $greeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Greeting $greeting)
    {
        //
    }
}
