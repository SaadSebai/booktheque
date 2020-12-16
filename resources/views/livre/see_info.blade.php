@extends('layouts.app')


@section('content')

    
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <img src="/storage/{{ $livre->user->user_avatar }}" style="width:150px; height:150px; float:right; border-radius:50%; margin-right:25px;">
            <h2 class="text-right">{{ $livre->user->prenom }}   {{ $livre->user->name }}     :اسم المستخدم</h2>
            <h2 class="text-right"></h2>
            <a href="{{ url('livres/'.$livre->id) }}" class="btn btn-warning btn-lg">موافقة   <span class="glyphicon glyphicon-ok-circle"></span></a>
            <br>
            <br>
            <hr>
            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading text-center">معلومات الكتاب</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                        <td>{{ $livre->livr_nom }}</td>
                        <td>{{ $livre->matiere->matiere_nom }}</td>
                        <td>{{ $livre->livr_nivo }}</td>
                        <td>{{ $livre->ville_prnd }}</td>
                        </tr>
                    </table>
                    <h2 class="text-center">{{ $livre->lvr_dscp }}</h2>
                    <br>
                    <center><img src="{{ asset('storage/'.$livre->photo) }}" alt="" style="width:300px; height:400px;"></center>
                </div>
            </div>
            </div>
            
        </div>
    </div>
</div>
@endsection