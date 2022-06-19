<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Session;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
        
        'name'=>'required|max:225',
        'email'=>'required|email|max:225',
        'comment'=>'required|min:5|max:2000',
       ));
       $post= Post::find($post_id);
       $comment = new Comment();
       $comment->name = $request->name;
       $comment->email = $request->email;
       $comment->comment = $request->comment;
       $comment->approved = true;
       $comment->post()->associate($post);
       $comment->save();
      // Comment::create($validated);
        $request->session()->flash('success', 'Comment was Added');
        return redirect()->route('blog.single', [$post->slug]);
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

   /* public function delete($id)
    {
        
        $comment = Comment::find($id);
       
        return view('comments.delete')->withComment($comment);
    }*/


    public function destroy($id, $post_id)
    {
        
        $comment = Comment::find($id);
        //$post_id = $comment->post->id;
        $comment->delete();
        session()->flash('success', 'The comment was successfully deleted!');
        return redirect()->route('posts.show', $post_id);
    }
}
