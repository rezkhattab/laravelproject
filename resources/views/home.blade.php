@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All users posts</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td><b> {{$post->title}}</b></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #4CAF50;"><b>Posted By: {{$post->name}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{$post->post}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <form action="{{url('posts', [$post->id])}}" method="POST">
                                                    {{method_field('DELETE')}}
                                                    {{ csrf_field() }}
                                                    <input type="text" class="form-control" name="comment" required value="">
                                                    <button class="btn btn-danger" type="submit">Comment</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
