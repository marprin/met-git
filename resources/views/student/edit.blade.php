@extends('layout.master')
@section('css')
<link rel = 'stylesheet' href = '{{asset("css/jquery.datetimepicker.css")}}' type = 'text/css' />
@endsection
@section('content')
    <div class="container">
        <div class="col-md-6">
            {!! Form::model($data['result'], ['action' => ['StudentController@postEdit', $data['result']->student_id]]) !!}
                <div class="form-group">
                    {!! Form::label('student_id', 'ID Murid: ') !!}
                    {!! Form::text('student_id', Input::old('student_id'), ['readonly' => true, 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('student_name', 'Nama Murid: ') !!}
                    {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('name')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('alamat', 'Alamat: ') !!}
                    {!! Form::text('address', Input::old('address'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('address')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('birthday', "Ulang Tahun: ") !!}
                    {!! Form::text('birthday', Input::old('birthday'), ['class' => 'form-control', 'id' => 'birthday']) !!}
                    <p class="text-danger"><small>{{$errors->first('birthday')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('active', 'Status: ') !!}
                    {!! Form::select('still_on_course', ['No' => 'Tidak aktif', 'Yes' => 'Aktif'], [$data['result']->still_on_course == "Yes"? 'Yes': 'No']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    <a href = "{{ action('StudentController@getIndex') }}" class = 'btn btn-danger'>Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@endsection
@section('js')
<script type="text/javascript" src = '{{asset("js/jquery.js")}}'></script>
<script type = "text/javascript" src="{{ asset('js/jquery.datetimepicker.js') }}"></script>
<script>
$(document).ready(function()
{
    $('#birthday').datetimepicker({
        format : "Y-m-d",
        timepicker:false
    });
});
</script>
@endsection