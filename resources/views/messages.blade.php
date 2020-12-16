@extends('layouts.app')


@section('content')

@if(Auth::user()->role_id)

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-right">طلبات استرجاع الحساب : <span class="label label-info">{{ $msg_reqs->where('msg_actv','=','0')->count() }}</span></h1>
			<table class="table text-right">
			    <thead>
    				<tr>
                        <td><b>الطلب</b></td>
    					<td><b>وقت الارسال</b></td>
    					<td><b>البريد الالكتروني</b></td>
    					<td><b>الاسم العائلي</b></td>
    					<td><b>الاسم الشخصي</b></td>
    				</tr>
			    </thead>
			    <tbody>
				@foreach($msg_reqs as $mg) 
				@if($mg->user->actv && $mg->msg_actv == 0)
            		<tr class="info">
                		<td>{{ $mg->msg }}</td>
                		<td>{{ $mg->created_at }}</td>
                		<td>{{ $mg->user->email }}</td>
                        <td>{{ $mg->user->name }}</td>
                        <td>{{ $mg->user->prenom }}</td>
            		</tr>
            	@endif
        		@endforeach
        		</tbody>
			</table>
		</div>
	</div>
</div>
@endif
@endsection