@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-2">
            {!! Form::open(['action' => ['TeacherController@postCreate']]) !!}
                <div class="form-group">
                    {!! Form::label('teacher-id', 'Teacher ID: ') !!}
                    {!! Form::text('teacher_id', Input::old('teacher_id'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('teacher_id')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('teacher-name', 'Teacher name: ') !!}
                    {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('name')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Address: ') !!}
                    {!! Form::text('address', Input::old('address'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('address')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ action('TeacherController@getIndex') }}" class = 'btn btn-danger'>Kembali</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection