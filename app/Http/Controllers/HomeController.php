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


        //$request = new Request;
        if (isset($_POST)){
//            $passport = new \App\Comments;
//            $passport->comment = $request->get('comment');
//            $passport->postid = $request->get('postid');
//            $passport->ownerid = $request->get('ownerid');
//            $passport->save();
        }
        $posts = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.ownerid')
                ->select('posts.*', 'users.name')
                ->orderBy('posts.id', 'desc')
                ->get();
        return view('home', array('posts' => $posts));
    }

    public function addcomment(Request $request) {

        
        $posts = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.ownerid')
                ->select('posts.*', 'users.name')
                ->orderBy('posts.id', 'desc')
                ->get();
        return view('home', array('posts' => $posts));
    }

}
