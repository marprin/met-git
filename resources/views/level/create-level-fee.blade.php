@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-2">
            {!! Form::open(['action' => ['LevelFeeController@postCreate']]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Level Name: ') !!}
                {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('name')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::label('fee', 'Biaya: ') !!}
                {!! Form::text('fee', Input::old('fee'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('fee')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ action('LevelFeeController@getIndex') }}" class = 'btn btn-danger'>Kembali</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection