@extends('layout.master')
@section('content')
    <div class="container">
        <div class="col-md-8">
            <h4>Welcome <b>{{Auth::user()->name}}</b>,</h4>
        </div>
    </div>
@endsection