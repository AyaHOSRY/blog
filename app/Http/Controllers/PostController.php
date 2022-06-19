<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\Post;
//namespace App\Http\Controllers\Purifier;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Purifier;
use Image;
use Session;
use Storage;



class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $category = Category::all();
        //create a variable and store all the blog posts in ti from the database 
        $data = Post::orderBy('id','desc')->paginate(5);
        //return a view and pass in the above variable 
        
       return view('posts.index',compact('data','category','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $category = Category::all();
        return view('posts.create', compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validate the data
        $validated = $request->validate([
            'title' => 'required|max:225',
            'body' => 'required',
            'category_id' => 'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:225|unique:posts,slug',
            'featured_image' => 'sometimes|image'
            
        ]);
       //store in the database
       $post= new Post;
       $post->title =$request->title;
       $post->body = Purifier::clean($request->body);
       $post->slug =$request->slug;
       $post->category_id =$request->category_id;

       //save image
       if($request->hasFile('featured_image')){
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800 , 400)->save($location);

        $post->image = $filename;
       }


       $post->save();
       $post->tags()->sync($request->tags, false);

       //Post::create($validated);

        //redirect to another page
        $request->session()->flash('success', 'The blog post was successfully save!');
        return redirect()->route('posts.show', $post->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::all();
        return view('posts.show', [
            'post' => Post::findOrFail($id), 
            'category'=> $category
        ]);
        //$postid = Post::find($id);
       // return view('posts.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $taggs =array();
        foreach ($tags as $tag){
        $taggs[$tag->id]= $tag->name;
        }
        //find the post in database and save as a var
        $post = Post::find($id);
        //send the key and value of category to edit page make method for this here
        $categories = Category::all();
        $cats =array();
        foreach ($categories as $category){
        $cats[$category->id]= $category->name;
        }
        //return the view and pass in the var we created
        return view('posts.edit',compact('post','cats','taggs'));

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
        //as if we update without if condition it will through an error as slug is already exists bec we made it unique 

        $post = Post::find($id);
       /* if($request->input('slug') == $post->slug){
            $validated = $request->validate([
                'title' => 'required|max:225',
                'body' => 'required',
                'category_id' => 'required|integer',
            ]);  
        }else{*/
        //validate data
        $validated = $request->validate([
            'title' => 'required|max:225',
            'body' => 'required',
            'slug' => "required|alpha_dash|min:5|max:225|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            
            
        ]);
        
       //save data to database
       //Post::whereId($id)->update($validated)
       $post= Post::find($id);

       $post->title =$request->input('title');
       $post->body =Purifier::clean($request->input('body'));
       $post->slug =$request->input('slug');
       $post->category_id =$request->input('category_id');
      //delete the old photo and add the new one
       if($request->hasFile('featured_image')){
        
        $image = $request->file('featured_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800 , 400)->save($location);
        $oldFilename = $post->image;
        //update the database
        $post->image = $filename;
        //delete the old one
        Storage::delete($oldFilename);
        }

       $post->save();

       if(isset($request->tags)){
        $post->tags()->sync($request->tags);
       }else{
        $post->tags()->sync(array());
       }
       

       //set flash data with success message
       $request->session()->flash('success', 'The blog post was successfully updated!');
        //redirect
        return redirect()->route('posts.show',[
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        session()->flash('success', 'The blog post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
