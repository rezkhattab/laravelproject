<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SocialController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('gender');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $posts = DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.ownerid')
                ->select('posts.*', 'users.name')
                ->orderBy('posts.id', 'desc')
                ->get();

        $posts = array('posts' => $posts);
        $posts2 = (array) $posts;

        foreach ($posts as $key => $value) {
            $value = (array) $value;
        }
        return view('social.index', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $passport = new \App\Comments;
        $passport->comment = $request->get('comment');
        $passport->postid = $request->get('postid');
        $passport->ownerid = $request->get('ownerid');
        $passport->save();
        return redirect('social')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
