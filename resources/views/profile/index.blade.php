@extends('layouts.app')
@section('content')
<div class="container">
    <br />
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
    <a class="navbar-brand" href="{{ url('/posts/create') }}">
        Add new post
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($posts as $post)

            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td><a href="{{action('PostsController@edit', $post->id)}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{url('posts', [$post->id])}}" method="POST">
                        {{method_field('DELETE')}}
                        {{ csrf_field() }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
