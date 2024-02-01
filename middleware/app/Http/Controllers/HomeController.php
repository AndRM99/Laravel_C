<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {

        //echo $request->session()->get('andrey');
        // session(['marco'=>'student']);

        // $request->session()->all();
        //request->session()->get('andrey');

        // session(['andrey2'=>'student of this curs']);

        // return session('andrey2');

       // $request->session()->forget('andrey2');

        //$request->session()->flash('message', 'Post has been created');

        //return $request->session()->get('message');

        //return $request->session()->all();

        // $request->session()->reflash();
       
        // $request->session()->keep('message');


        return view('home');
    }
}
