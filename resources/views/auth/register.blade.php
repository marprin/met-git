@extends('layout.master')
@section('content')
    <div class="container">
        <div class="col-md-6 col-xs-4 col-lg-6">
            {!! Form::open(['action' => ['Auth\AuthController@postRegister']]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
                      <p class="text-danger"><small>{{$errors->first('name')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('username', 'Username: ') !!}
                    {!! Form::text('username', Input::old('username'), ['class' => 'form-control']) !!}
                      <p class="text-danger"><small>{{$errors->first('username')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('e_mail', 'E-mail: ') !!}
                    {!! Form::text('email', Input::old('email'), ['class' => 'form-control']) !!}
                      <p class="text-danger"><small>{{$errors->first('email')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password: ') !!}
                    {!! Form::password('password', Input::old('password'), ['class' => 'form-control']) !!}
                      <p class="text-danger"><small>{{$errors->first('password')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('confirm_password', 'Confirm Password: ') !!}
                    {!! Form::password('confirm_password', Input::old('confirm_password'), ['class' => 'form-control']) !!}
                      <p class="text-danger"><small>{{$errors->first('confirm_password')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
                    <a href = '' class = 'btn btn-danger'>Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection