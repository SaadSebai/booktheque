@extends('layouts.app')


@section('content')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12 text-center">
        	<img src="{{ asset('book.gif') }}" alt="" style="width:200px; height:200px;">
            <h1></h1>
            @foreach($livre as $pp)
            <h2>{{ $pp->prnd->id }}</h2>
            @endforeach
        </div>
    </div>
</div>
@endsection