@extends('layouts.app')


@section('content')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12 text-center">
        	<form action="{{ url('req_msg') }}" method="post">
        		{{ csrf_field() }}
        		<textarea name="req"  rows="4" class="form-control text-right">
        		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span>
              ارسال
            </button>
        	</form>
        </div>
    </div>
</div>
@endsection