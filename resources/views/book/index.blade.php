@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{{ action('BookController@getCreate') }}" class = 'btn btn-default'>Daftarkan Buku</a>
        </div>
        <div class="row" style = 'margin-top:1em;'>
            @if($data['status'] == 'success')
                @if(!is_null($data['result']))
                    <table class = 'col-md-8'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Book Name</th>
                                <th>Author</th>
                                <th>Stock</th>
                                <th colspan = '2'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{--*/$i = 1/*--}}
                        @foreach($data['result'] as $books)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$books['name']}}</td>
                                <td>{{$books['author']}}</td>
                                <td>{{$books['stock']}}</td>
                                <td><a href = "{{ action('BookController@getEditBook', $books['id']) }}" class = 'btn btn-primary'>Edit</a></td>
                                {!! Form::open(['action' => ['BookController@postDeleteBook', $books['id']]]) !!}
                                    <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
                                {!! Form::close() !!}
                            </tr>
                            {{--*/$i++/*--}}
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>Tidak ada buku yang ditemukan</h3>
                @endif
            @else
                <h3>Tidak ada buku yang ditemukan</h3>
            @endif
        </div>
    </div>
@endsection