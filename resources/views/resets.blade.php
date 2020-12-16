@extends('layouts.app')

@section('content')


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                @foreach($users as $uu) 
                    <tr class="danger">
                        <td><button type="submit" class="btn btn-danger disabled">توقيف    <span class="glyphicon glyphicon-ban-circle"></span></button></td>
                        <td>{{ $uu->email }}</td>
                        <td>{{ $uu->prenom }}</td>
                        <td>{{ $uu->name }}</td>
                    </tr>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection