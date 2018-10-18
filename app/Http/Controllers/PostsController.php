<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $passport = new \App\Posts;
        $passport->title = $request->get('title');
        $passport->post = $request->get('post');
        $passport->ownerid = $request->get('ownerid');
        $passport->save();
        return redirect('posts')->with('success', 'Information has been added');
    }

    public function index() {
        $posts = DB::table('posts')
                ->where('ownerid','1')
                ->get();
        //$posts = \App\Posts::all();
        return view('blog.index',  array ( 'posts' => $posts ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = \App\Posts::find($id);
        return view('blog.edit', compact('post', 'id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $passport = \App\Posts::find($id);
        $passport->delete();
        return redirect('posts')->with('success', 'Information has been  deleted');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $passport = \App\Posts::find($id);
        $passport->title = $request->get('title');
        $passport->post = $request->get('post');
        $passport->save();
        return redirect('posts');
    }

}
