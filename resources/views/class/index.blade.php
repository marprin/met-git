@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href = "{{ action('ClassController@getCreate') }}" class = 'btn btn-default'>Tambahkan Kelas</a>
        </div>
        <div class="row" style = 'margin-top:1em;'>
            @if($data['status'] == 'success')
                @if(!is_null($data['result']))
                    <table class = 'col-md-8'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Class</th>
                                <th rowspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{--*/$i = 1/*--}}
                        @foreach($data['result'] as $class)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $class->class }}</td>
                                <td><a href="{{ action('ClassController@getEdit', $class->id) }}" class = 'btn btn-primary'>Edit</a></td>
                                {!! Form::open(['action' => ['ClassController@postDelete', $class->id]]) !!}
                                    <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
                                {!! Form::close() !!}
                            </tr>
                            {{--*/$i++/*--}}
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h3>Maaf, tidak ada kelas yang dibuat</h3>
                @endif
            @else
                <h3>Maaf, tidak ada kelas yang dibuat</h3>
            @endif
        </div>
    </div>
@endsection