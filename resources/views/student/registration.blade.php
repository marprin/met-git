@extends('layout.master')
@section('css')
<link rel = 'stylesheet' href = '{{asset("css/jquery.datetimepicker.css")}}' type = 'text/css' />
@endsection
@section('content')
    <div class="container">
        {!! Form::open(['action' => ['StudentController@postCreate']]) !!}
            <div class="form-group">
                {!! Form::label('student_id', 'ID Murid: ') !!}
                {!! Form::text('student_id', Input::old('student_id'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('student_id')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::label('student_name', 'Nama Murid: ') !!}
                {!! Form::text('student_name', Input::old('student_name'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('student_name')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Alamat: ') !!}
                {!! Form::text('address', Input::old('address'), ['class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('address')}}</small></p>
            </div>
            <div class="form-group">
                {!! Form::label('birthday', 'Tanggal Lahir: ') !!}
                {!! Form::text('birthday', Input::old('birthday'), ['id' => 'birthday', 'class' => 'form-control']) !!}
                <p class="text-danger"><small>{{$errors->first('birthday')}}</small></p>
            </div>
            <div class="form-group">
               {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                <a href = '{{ action('StudentController@getIndex') }}' class = 'btn btn-danger'>Back</a>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('js')
<script type="text/javascript" src = '{{asset("js/jquery.js")}}'></script>
<script type = "text/javascript" src="{{ asset('js/jquery.datetimepicker.js') }}"></script>
<script>
$('#birthday').datetimepicker({
    format : "Y-m-d",
    timepicker:false
});
</script>
@endsection