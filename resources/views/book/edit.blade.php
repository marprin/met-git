@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-2">
            {!! Form::model($data['result'], ['action' => ['BookController@postUpdateBook', $data['result']['id']]]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name: ') !!}
                    {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('name')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('pengarang', 'Author: ') !!}
                    {!! Form::text('author', Input::old('author'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('author')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('stock', 'Stock: ') !!}
                    {!! Form::text('stock', Input::old('stock'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('stock')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('price', 'Price: ') !!}
                    {!! Form::text('price', Input::old('price'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('price')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ action('BookController@getIndex') }}" class = 'btn btn-danger'>Kembali</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection