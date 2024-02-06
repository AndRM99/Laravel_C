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
        $posts = Post::all();
    }

    public function show(Post $post){
        
        // Post::findOrFail($id);
        return view('blog-post', ['post'=>$post]);
    }


    public function create(){
        
        $this->authorize('create',  Post::class);
        return view('admin.posts.create');
    }


    public function store(Request $request){

        auth()->user();

        dd(request()->all());
       }
}
