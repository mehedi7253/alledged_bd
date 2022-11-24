<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Company Overview";
        $menu = "About Us";
        $aboutUs = AboutUs::first();
        return view('backend.about-us.index',compact('title','menu','aboutUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Company Overview Add";
        $menu = "About Us";
        return view('backend.about-us.create',compact('title','menu'));
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
            'mission' => 'required',
            'vision' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'company_profile' => 'required|mimes:pdf',
        ]);

        if ($request->file('company_profile')) {
            $file = $request->file('company_profile');
            $company_profile = 'uploads/company_overview/company_profile_'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/company_overview/';
            $file->move($destinationPath,$company_profile);
        } else {
            $company_profile = null;
        }
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/company_overview/');
        } else {
            $image = null;
        }
        $aboutUs = new AboutUs();
        $aboutUs->title  = $request->title;
        $aboutUs->description  = $request->description;
        $aboutUs->mission  = $request->mission;
        $aboutUs->vision  = $request->vision;
        $aboutUs->image  = $image;
        $aboutUs->company_profile  = $company_profile;
        $aboutUs->save();
        return redirect()->route('about-us.index')->with('message',"About Us is saved successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'mission' => 'required',
            'vision' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
  
        ]);

        if ($request->file('company_profile')) {
            
            $file = $request->file('company_profile');
            $company_profile = 'public/uploads/company_overview/company_profile_'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'public/uploads/company_overview/';
            $file->move($destinationPath,$company_profile);
            
            $oldPdf = AboutUs::where('id',$id)->value('company_profile');
            @unlink($oldPdf);

            $newFile = array(
                'company_profile' => $company_profile,
            );
        } else {
            $newFile = array();
        }
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/company_overview/');
            
            $oldImage = AboutUs::where('id',$id)->value('image');
            @unlink($oldImage);

            $newImage = array(
                'image' => $image,
            );
        } else {
            $newImage = array();
        }
        $formData = array(
            'title' => $request->title,
            'description'  => $request->description,
            'mission'  => $request->mission,
        );
        $updateData = array_merge($formData,$newFile,$newImage);
        AboutUs::where('id',$id)->update($updateData);
        return redirect()->route('about-us.index')->with('success',"About Us is updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
