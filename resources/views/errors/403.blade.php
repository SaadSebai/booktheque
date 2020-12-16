@extends('layouts.app')


@section('content')

<div class="container">
	<div class="col-md-8 col-md-offset-2 text-center">
		<h2>Cette page est non autoriser</h2>
		<a href="{{ url('home') }}">Retour</a>
	</div>
</div>

@endsection