@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-2">
            {!! Form::open(['action' => ['BookController@postCreate']]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nama Buku: ') !!}
                    {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('pengarang', 'Author: ') !!}
                    {!! Form::text('author', Input::old('author'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('stock', 'Stock: ') !!}
                    {!! Form::text('stock', Input::old('stock'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ action('BookController@getIndex') }}" class = 'btn btn-danger'>Kembali</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection