@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href = "{{ action('LevelFeeController@getCreate') }}" class = 'btn btn-default'>Tambahkan Level dan Biaya</a>
        </div>
        <div class="row" style = 'margin-top:1em;'>
            @if($data['status'] == 'success')
                @if(!is_null($data['result']))
                    <table class = 'col-md-8'>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Level</th>
                            <th>Biaya</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/$i =1 /*--}}
                        @foreach($data['result'] as $level)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $level->name }}</td>
                                <td>{{ $level->fee }}</td>
                                <td><a href="{{ action('LevelFeeController@getEdit', $level->id) }}" class = 'btn btn-primary'>Edit</a></td>
                                {!! Form::open(['action' => ['LevelFeeController@postDelete', $level->id]]) !!}
                                <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
                                {!! Form::close() !!}
                            </tr>
                            {{--*/$i++/*--}}
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @else
                <h3>Tidak ada Level dan Biaya yang terdaftar</h3>
            @endif
        </div>
    </div>
@endsection