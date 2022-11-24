<?php

namespace App\Http\Controllers;

use App\Models\ClientComment;
use Illuminate\Http\Request;
use DataTables;

class ClientCommentController extends Controller
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
            $data = ClientComment::orderByDesc('client_comments.id')->get();
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
                            $btn .= '<a href="'.route('client-comment.edit',$row->id).'" title="Edit" class="edit btn btn-secondary btn-sm"><i class="fal fa-edit"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('client-comment.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('client-comment.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $title = "Client Comment List";
        $menu = "Frontend Settings";
        return view('backend.client-comment.index',compact('title','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Client Comment Add";
        $menu = "Frontend Settings";
        return view('backend.client-comment.create',compact('title','menu'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg',
        ]);
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/client_comment_image/');
        } else {
            $image = null;
        }
        $clientComment = new ClientComment();
        $clientComment->name = $request->name;
        $clientComment->image = $image;
        $clientComment->description = $request->description;
        $clientComment->save();
        return redirect('client-comment')->with('success','Client comment is saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $title = "Client Comment Edit";
        $menu = "Frontend Settings";
        $clientComment = ClientComment::findOrFail($id);
        return view('backend.client-comment.edit',compact('title','menu','clientComment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:255',
            'image' => 'image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        $oldImage = ClientComment::where('id',$id)->value('image');
        if ($request->file('image')) {
            $image = $this->uploadImage($request->file('image'), 'uploads/client_comment_image/');
            @unlink($oldImage);
            $updateData = array(
                'name' => $request->name,
                'image' => $image,
                'description' => $request->description,
            );
        } else {
            $updateData = array(
                'name' => $request->name,
                'description' => $request->description,
            );
        }
        ClientComment::where('id',$id)->update($updateData);
        return back()->with('success','Client Comment is updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientComment  $clientComment
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $oldImage = ClientComment::where('id',$id)->value('image');
        @unlink($oldImage);
        ClientComment::where('id',$id)->delete();
        return back()->with('success','Client Comment is deleted successfully!');
    }
}
