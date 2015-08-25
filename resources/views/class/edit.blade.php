@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-md-4 col-md-offset-2">
            {!! Form::model($data['result'], ['action' => ['ClassController@postUpdate', $data['result']->id]]) !!}
            <div class="form-group">
                {!! Form::label('class', 'Class: ') !!}
                {!! Form::text('class', Input::old('class'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('class')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ action('ClassController@getIndex') }}" class = 'btn btn-danger'>Kembali</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection