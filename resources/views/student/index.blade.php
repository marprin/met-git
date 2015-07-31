@extends('layout.master')
@section('content')
    <div class="container">
        @if($data['status'] == 'success')
            @if(!is_null($data['result']))
                <table class = 'col-md-10 col-xs-10 col-lg-12'>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nomor Murid</td>
                            <td>Nama Murid</td>
                            <td>Alamat</td>
                            <td>Ulang Tahun</td>
                            <td colspan = '2'>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        {{--*/$i = 1/*--}}
                        @foreach($data['result'] as $student)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$student->student_id}}</td>
                                <td>{{ucwords($student->name)}}</td>
                                <td>{{ucwords($student->address)}}</td>
                                <td>{{date('d-m-Y', strtotime($student->birthday))}}</td>
                                <td><a href = "{{action('StudentController@getEdit', $student->student_id)}}" class = 'btn btn-primary'>Edit</a></td>
                                {!! Form::open(['action' => ['StudentController@postDelete', $student->student_id]]) !!}
                                    <td>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</td>
                                {!! Form::close() !!}
                            </tr>
                            {{--*/$i++/*--}}
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3>Tidak ada murid yang terdaftar</h3>
            @endif
        @else
            <h3>Tidak ada murid yang terdaftar</h3>
        @endif
    </div>
@endsection