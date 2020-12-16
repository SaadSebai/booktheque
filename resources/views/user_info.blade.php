@extends('layouts.app')


@section('content')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12 text-center">
        	<img src="{{ asset('book.gif') }}" alt="" style="width:200px; height:200px;">
            <h1>تم اعلام المستخدم برغبتك في الاخذ الكتاب</h1>
            <h3>{{ $livre->user->email }} يمكنك ارسال ايمايل الى</h3>
            <h3>او الاتصال بالرقم الاتي {{ $livre->user->telephon }} للاتفاق</h3>
            <h3><a href="{{ url('livres/search') }}" class="btn btn-primary btn-lg"><i class="fas fa-undo-alt"></i>    رجوع</span></a></h3>
        </div>
    </div>
</div>
@endsection