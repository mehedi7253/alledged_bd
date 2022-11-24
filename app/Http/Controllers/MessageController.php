<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use DataTables;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:messages', ['only' => ['index','store','create','update','destroy','show']]);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Message::orderByDesc('messages.id')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            $btn = '';
                            $btn .= '<a href="'.route('message.show',$row->id).'" title="View" class="btn btn-success btn-sm"><i class="fal fa-eye"></i></a> <a href="'.route('message.edit',$row->id).'" title="Reply" class="edit btn btn-secondary btn-sm"><i class="fal fa-reply"></i></a>&nbsp;';
                            $btn .= '<a href="'.route('message.destroy',$row->id).'" class="edit btn btn-danger btn-sm" onclick="return confirm_delete('.$row->id.')" title="Delete"><i class="fal fa-trash"></i></a>&nbsp;';
                            $btn .= '<form id="delete_form_'.$row->id.'" action="'.route('message.destroy',$row->id).'" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="'.csrf_token().'">
                                </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $title = 'Message List';
        $menu = 'Messages';
        return view('backend.message.index',compact('title','menu'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $message = new Message();
        $message->full_name = $request->name;
        $message->email_address = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        return back()->with('success','Your message is send successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $title = 'Message View';
        $menu = 'Messages';
        $message = Message::findOrFail($id);
        Message::where('id',$id)->update(array('status' => 'read'));
        return view('backend.message.show',compact('title','menu','message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Message Replay';
        $menu = 'Messages';
        $message = Message::findOrFail($id);
        return view('backend.message.edit',compact('title','menu','message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Message::findOrFail($id)->delete();
        return back()->with('success','Message is deleted successfully!');
    }
}
