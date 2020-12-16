@extends('layouts.app')

@section('content')

@if(Auth::user()->role_id)

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                <form action="{{URL::to('allusers/search')}}" method="POST" role="search">
                        {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control text-right" name="usr_nm" placeholder="الاسم الشخصي">
                                <span class="input-group-addon">الاسم الشخصي</span>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control text-right" name="usr_mail" placeholder="البريد الالكتروني">
                                <span class="input-group-addon">البريد الالكتروني</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-3 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary btn-block" name="Search"><span class="glyphicon glyphicon-search"></span>   بحث</button>
                                </div>
                            </div>
                    </form>
                </div>

            @if(isset($details))
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr>
            <h2 class="text-right">لائحة المستخدمين</h2>
			<table class="table text-right">
			    <thead>
    				<tr>
                        <td></td>
    					<td><b>البريد الالكتروني</b></td>
    					<td><b>الاسم العائلي</b></td>
    					<td><b>الاسم الشخصي</b></td>
    				</tr>
			    </thead>
			    <tbody>
    				@foreach($details as $uu)	
                    @if($uu->role_id == 1)
                    <tr class="danger">
                        <td><button type="submit" class="btn btn-danger disabled">توقيف    <span class="glyphicon glyphicon-ban-circle"></span></button></td>
                        <td>{{ $uu->email }}</td>
                        <td>{{ $uu->prenom }}</td>
                        <td>{{ $uu->name }}</td>
                    </tr>
                    @else
    				<tr class="info">
                        <td>
                        @if($uu->actv == 0)
                        <form action="{{ url('allusers/'.$uu->id) }}" method="put">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">توقيف    <span class="glyphicon glyphicon-ban-circle"></span></button>
                        </form>
                        @else
                        <form action="{{ url('allusers/'.$uu->id) }}" method="put">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success">اعدة     <span class="glyphicon glyphicon-ok-sign"></span></button>
                        </form>
                        @endif
                        </td>
                        <td>{{ $uu->email }}</td>
                        <td>{{ $uu->prenom }}</td>
    					<td>{{ $uu->name }}</td>
    				</tr>
                    @endif
    				@endforeach
				</tbody>
			</table>
            @elseif(isset($message))
            <h3 class="text-center">{{ $message }}</h3>
            <center><img src="{{ asset('noresult.gif') }}" alt="" style="width:300px; height:300px;"></center>
            @endif
        </div>
    </div>
</div>
</div>
@endif
@endsection