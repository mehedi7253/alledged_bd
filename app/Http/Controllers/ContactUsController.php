<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use DataTables;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:frontend-settings', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ContactUs::orderByDesc('id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('contact-us.edit',$row->id).'" title="Edit" class="btn btn-info btn-sm"><i class="fal fa-edit"></i></a> <a href="'.route('contact-us.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a><form id="delete_form_'.$row->id.'" action="'.route('contact-us.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'Contact Us List';
        $menu = 'Company Settings';
        return view('backend.contact-us.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Contact Us Add';
        $menu = 'Company Settings';
        return view('backend.contact-us.create',compact('title','menu'));
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
            'name' => 'required|max:255|unique:contact_us,name',
            'icon' => 'required|max:255',
            'url' => 'required|max:255',
        ]);
        $contactUs = new ContactUs();
        $contactUs->name = $request->name;
        $contactUs->icon = $request->icon;
        $contactUs->url = $request->url;
        
        $contactUs->save();
        return redirect('contact-us')->with('success','Contact us is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Contact Us Edit';
        $menu = 'Company Settings';
        $contactUs = ContactUs::findOrFail($id);
        return view('backend.contact-us.edit',compact('title','menu','contactUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255|unique:contact_us,name,'.$id,
            'icon' => 'required|max:255',
            'url' => 'required|max:255',
        ]);
        $updateData = array(
            'name' => $request->name,
            'icon' => $request->icon,
            'url' => $request->url,
        );
        ContactUs::where('id',$id)->update($updateData);
        return back()->with('success','Contact us is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        ContactUs::findOrFail($id)->delete();
        return back()->with('success','Contact us is deleted successfully!');
    }
}
