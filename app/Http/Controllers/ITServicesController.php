<?php

namespace App\Http\Controllers;

use App\Models\ITServices;
use Illuminate\Http\Request;
use DataTables;

class ITServicesController extends Controller
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
            $data = ITServices::orderByDesc('i_t_services.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function($row){
                           if ($row->image) {
                                $btn = '<img alt="'.$row->title.'" title="'.$row->title.'" src="'.asset($row->image).'" style="width:100px;height:100px;">';
                            } else {
                                $btn = '';
                            }
                            return $btn;
                    })
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('it-services.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('it-services.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('it-services.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = "Successfully Project List";
        $menu = "Frontend Settings";
        return view('backend.it-services.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Successfully Project Add";
        $menu = "Frontend Settings";
        return view('backend.it-services.create',compact('title','menu'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/it_services_image/');
        } else {
            $image = null;
        }
        $iTServices = new ITServices();
        $iTServices->title = $request->title;
        $iTServices->image = $image;
        $iTServices->description = $request->description;
        $iTServices->save();
        return redirect('it-services')->with('success',"Successfully Project is saved successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ITServices  $iTServices
     * @return \Illuminate\Http\Response
     */
    public function show(ITServices $iTServices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ITServices  $iTServices
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = "Successfully Project Edit";
        $menu = "Frontend Settings";
        $itServices = ITServices::findOrFail($id);
        return view('backend.it-services.edit',compact('title','menu','itServices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ITServices  $iTServices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);
        $iTServices = ITServices::where('id',$id)->select('image')->first();

        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/it_services_image/');
            @unlink($iTServices->image);
            $updateData = array(
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image,
            );
        } else {
            $updateData = array(
                'title' => $request->title,
                'description' => $request->description,
            );
        }
        ITServices::where('id',$id)->update($updateData);
        return back()->with('success','Successfully Project is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ITServices  $iTServices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iTServices = ITServices::where('id',$id)->select('image')->first();
        @unlink($iTServices->image);
        ITServices::findOrFail($id)->delete();
        return back()->with('success','Successfully Project is deleted successfully!');
    }
}
