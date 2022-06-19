<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post= Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.home',compact('post'));
    }
    ///

    public function getAbout()
    {
       
        return view('pages.about');
    }
/////////

    public function getContact()
    {
       
        return view('pages.contact');
    }
    /////

    public function postContact(Request $request)
    {
       $this->validate($request, [
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'required|min:10'
        ]);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->bodyMessage,
        );
        Mail::send('emails.contact',$data, function($mes) use ($data){
            $mes->from($data['email']);
            $mes->to('ayaelosary11@gmail.com');
            $mes->subject($data['subject']);
        });
        session()->flash('success', 'Your message was successfully sent!');
        return redirect()->route('pages.contact');
       
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
