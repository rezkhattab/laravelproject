@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Profile</h2><br/>
    <form method="POST" action="{{url('profile', [$profile->id])}}" enctype="multipart/form-data">
        {{method_field('PATCH')}}

        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $profile->name }}" required autofocus>

                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('nationalid') ? ' has-error' : '' }}">
            <label for="nationalid" class="col-md-4 control-label">National ID</label>

            <div class="col-md-6">
                <input id="nationalid" type="text" class="form-control" name="nationalid" value="{{ $profile->nationalid }}" required>

                @if ($errors->has('nationalid'))
                <span class="help-block">
                    <strong>{{ $errors->first('nationalid') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
            <label for="gender" class="col-md-4 control-label">Gender</label>

            <div class="col-md-6">
                <select name="gender" class="form-control" >
                    <option value="0">-- Select --</option>
                    @if ($profile->gender == '1')
                    <option value="1" selected="">Male</option>
                    @else
                    <option value="1">Male</option>
                    @endif
                    @if ($profile->gender == '2')
                    <option value="2" selected="">Female</option>
                    @else
                    <option value="2">Female</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $profile->email }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
