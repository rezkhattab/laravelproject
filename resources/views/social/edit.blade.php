@extends('layouts.app')

@section('content')
<div class="container">
      <h2>New Post</h2><br/>
      <form method="POST" action="{{url('posts', [$post->id])}}" enctype="multipart/form-data">
               {{method_field('PATCH')}}

          {{ csrf_field() }}
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Title:</label>
            <input type="text" class="form-control" name="title" required value="{{$post->title}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Post">Post:</label>
              <textarea cols="10" rows="10" class="form-control" name="post" required>{{$post->post}}</textarea>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
@endsection
