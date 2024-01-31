<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    /**
     * Show the form for creating a new resource.
     */
    // In your controller
    
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));


        //Ordenar de que inicie por el ultimno id
        //$posts = Post::latest();
    }

    public function create()
    {
        //return "Its not working ";

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        // $this->validate($request, [

        //     'title'=>'required',
        //     'content'=>'required',
        // ]);
        // return $request->all();

        //return $request->title;


        // $input = $request->all();

        // $input['title'] = $request->title;

        Post::create($request->all());
        return redirect('/posts');


        // $post = new Post;

        // $post->title = $request->title;

        // $post->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            // Handle the case where the post with the given ID is not found
            abort(404);
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //

        $post = Post::whereId($id)->delete();

        return redirect('/posts');
    }


    public function contact(){

        $people = ['Diego', 'Edward', 'Anthony', 'Marcos', 'Maria','Angie'];

        return view('contact', compact('people'));
    }

    public function show_post($id,$name,$password){
        //return view('post') ->with('id',$id);
        return view('post', compact('id','name','password'));


    }

}
