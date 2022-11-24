<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanySettings;

class CompanySettingsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:company-settings', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index()
    {
        $title = 'General Information';
        $menu = 'Company Settings';
        $company = CompanySettings::first();
        return view('backend.company.index',compact('title','menu','company'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        if ($request->file('logo')) {
            $logoImage = $this->uploadImage($request->file('logo'), 'uploads/logo/');
        } else {
            $logoImage = null;
        }
        
        if ($request->file('favicon')) {
            $faviconImage = $this->uploadImage($request->file('favicon'), 'uploads/logo/');
        } else {
            $faviconImage = null;
        }

        $company = new CompanySettings();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;
        $company->logo = $logoImage;
        $company->favicon = $faviconImage;
        $company->about_company = $request->about_company;
        $company->save();
        return back()->with('success','General information save successfully.');
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required',
        ]);
        $company = CompanySettings::findOrFail($id);
        $logo = $company->logo;
        $oldFavicon = $company->favicon;
        if ($request->file('logo')) {
            $logoImage = $this->uploadImage($request->file('logo'), 'uploads/logo/');

            @unlink($logo);
            $newLogo = array(
                'logo' => $logoImage,
            );
        } else {
            $newLogo = array();
        }

        if ($request->file('favicon')) {
            $faviconImage = $this->uploadImage($request->file('favicon'), 'uploads/logo/');
            if($oldFavicon){
                @unlink($oldFavicon);
            }
            $newFavicon = array(
                'favicon' => $faviconImage,
            );
        } else {
            $newFavicon = array();
        }

        $updateInfo = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'about_company' => $request->about_company,
        );
        $updateData = array_merge($updateInfo,$newFavicon,$newLogo);
        CompanySettings::where('id',$id)->update($updateData);
        return back()->with('success','General information updated successfully.');
    }
    public function edit(Request $request,$id){
        CompanySettings::where('id',$id)->update(array('google_map' => $request->google_map));
        return back()->with('success','Google map updated successfully.');
    }
}
