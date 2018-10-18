<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.ownerid')
                ->select('posts.*', 'users.name')
                ->orderBy('posts.id', 'desc')
                ->get();
        return view('home', array('posts' => $posts));
    }

    public function store(Request $request) {
        $passport = new \App\Posts;
        $passport->title = $request->get('title');
        $passport->post = $request->get('post');
        $passport->ownerid = $request->get('ownerid');
        $passport->save();
        return redirect('posts')->with('success', 'Information has been added');
    }

}
