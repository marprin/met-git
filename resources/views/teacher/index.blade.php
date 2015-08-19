@extends('layout.master')
@section('content')
    <div class="container-fluid">
        @if($data['status'] == 'success')
            @if(!is_null($data['result']))
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Masih Mengajar</th>
                            <th></th>
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
@endsection