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
                                                <?php
                                                //DB::setFetchMode(PDO::FETCH_ASSOC);

                                                $comments = DB::table('users')
                                                        ->join('comments', 'users.id', '=', 'comments.ownerid')
                                                        ->select('comments.*', 'users.name')
                                                        ->where('postid', $post->id)
                                                        ->orderBy('comments.id', 'desc')
                                                        ->get();
                                                $comments = json_decode(json_encode($comments), True);
                                                foreach ($comments as $comment) {
                                                    echo '<b>'.$comment["name"].'</b>';
                                                    echo '<br>'.$comment["comment"].'</br></br>';
                                                }
                                                ?>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <form action="{{url('social')}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="ownerid" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="postid" value="{{$post->id}}">
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
