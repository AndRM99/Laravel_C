<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //

    public function index(){
        // Obtener todos los posts

        //$posts = Post::all();
        
        //$posts=auth()->user()->posts;

        $posts=auth()->user()->posts()->paginate(5);

        return view('admin.posts.index', ['posts'=> $posts]);

    }
        

    public function show(Post $post)
    {

        // Post::findOrFail($id);
        return view('blog-post', ['post' => $post]);
    }


    public function create()
    {

        $this->authorize('create',  Post::class);
        return view('admin.posts.create');
    }


    public function store(){

        $this->authorize('create',  Post::class);

        //     auth()->user();

        //     dd(request()->all());
          //$this->authorize('create',  Post::class);
          $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required' 
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('image');
        }

        $post = auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post with title "' . $post->title . '" was created');

        return redirect()->route('post.index');

    }

    public function edit(Post $post){

        $this->authorize('view', $post);
        // if(auth()->user()->can('view',$post)){

        // }
       
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function destroy(Post $post ,Request $request){

        $this->authorize('delete', $post);
            
        $post->delete();
        $request->session()->flash('message', 'Post was Deleted');
        return back();
  
    }


    public function update(Post $post){
        $inputs = request()->validate([
           'title'=>'required|min:8|max:255',
           'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'body'=>'required'
        ]);


        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('image');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];
    
        // auth()->user()->posts()->save($post);

        $this->authorize('update', $post);
        $post->save();
        session()->flash('post-updated-message', ' Post with title was update ', $inputs['title']);



        return redirect()->route('post.index');

    }

    
}
