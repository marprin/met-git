@extends('layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href = "{{ action('TeacherController@getCreate') }}" class = 'btn btn-default'>Tambahkan Guru</a>
        </div>
        <div class="row" style = 'margin-top:1em;'>
            @if($data['status'] == 'success')
                @if(!is_null($data['result']))
                    <table class = 'col-md-8'>
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Guru</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Masih Mengajar</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--*/$i =1 /*--}}
                        @foreach($data['result'] as $teacher)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $teacher->teacher_id }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ $teacher->still_teach == 'Yes' ? 'Ya' : 'Tidak' }}</td>
                                <td><a href="{{ action('TeacherController@getEdit', $teacher->teacher_id) }}" class = 'btn btn-primary'>Edit</a></td>
                                {!! Form::open(['action' => ['TeacherController@postDelete', $teacher->teacher_id]]) !!}
                                    <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
                                {!! Form::close() !!}
                            </tr>
                            {{--*/$i++/*--}}
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @else
                <h3>Tidak ada guru yang terdaftar</h3>
            @endif
        </div>
    </div>
@endsection