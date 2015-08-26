@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-2">
            {!! Form::model($data['result'], ['action' => ['TeacherController@postEdit', $data['result']->teacher_id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Teacher name: ') !!}
                {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('name')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Address: ') !!}
                {!! Form::text('address', Input::old('address'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('address')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::label('masih-mengajar', 'Masih Mengajar: ') !!}
                {!! Form::select('still_teach', ['Yes' => 'Ya', 'No' => 'Tidak'], Input::old('stock'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('still_teach')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href="{{ action('TeacherController@getIndex') }}" class = 'btn btn-danger'>Kembali</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection