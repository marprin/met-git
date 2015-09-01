@extends('layout.master')
@section('css')
<link rel = 'stylesheet' href = '{{asset("css/jquery.datetimepicker.css")}}' type = 'text/css' />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-2">
            {!! Form::model($student_data, ['action' => ['PaymentController@postPayment']]) !!}
                <div class="form-group">
                    {!! Form::label('student_id', 'Student ID: ') !!}
                    {!! Form::text('student_id', Input::old('student_id'), ['class' => 'form-control', 'readonly' => true]) !!}
                    <p class="text-danger"><small>{{$errors->first('student_id')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('student-name', 'Student name: ') !!}
                    {!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'readonly' => true]) !!}
                    <p class="text-danger"><small>{{$errors->first('name')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('total_payment', 'Total Payment: ') !!}
                    {!! Form::text('total_payment', Input::old('total_payment'), ['class' => 'form-control']) !!}
                    <p class="text-danger"><small>{{$errors->first('total_payment')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::label('payment', 'Payment Date: ') !!}
                    {!! Form::text('paid_at', Input::old('paid_at'), ['class' => 'form-control', 'id' => 'payment_date']) !!}
                    <p class="text-danger"><small>{{$errors->first('paid_at')}}</small></p>
                </div>
                <div class="form-group">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary', 'name' => 'simpan']) !!}
                    @if(!is_null($status))
                        {!! Form::submit('Simpan dan lanjutkan pendaftaran murid ke kelas', ['class' => 'btn btn-primary', 'name' => 'saveandcontinuetoclass']) !!}
                    @endif
                    <a href="{{ action('PaymentController@getIndex') }}" class = 'btn btn-danger'>Cancel</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript" src = '{{asset("js/jquery.js")}}'></script>
<script type = "text/javascript" src="{{ asset('js/jquery.datetimepicker.js') }}"></script>
<script>
$(document).ready(function()
{
    $('#payment_date').datetimepicker({
        format : "Y-m-d",
        timepicker:false
    });
});
</script>
@endsection