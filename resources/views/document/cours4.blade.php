@extends('layouts.app')


@section('content')

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="container" id="app">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10"><h3 class="panel-title"></h3></div>
                    </div>
                </div>
                <div class="panel-body">

                <table class="table text-right">
                    <body>
                        <tr><td><a href="{{ url('documents/all/ib') }}" class="AA text-center">التعليم الابتدائي</a></td></tr>
                       	<tr><td><a href="{{ url('documents/all/i3') }}" class="AA text-center">التعليم الثانوي الإعدادي</a></td></tr>
                       	<tr><td><a href="{{ url('documents/all/tha') }}" class="AA text-center">التعليم الثانوي التاهيلي</a></td></tr>
                       	<tr><td><a href="{{ url('documents/all/t3') }}" class="AA text-center">التعليم العالي</a></td></tr>
                    </body>

                </table>

                </div>
            </div>
            <form action="{{URL::to('documents/filter')}}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="nivo" class="pull-right">بحث</label>

                <div class="form-group">
                    <select class="form-control" id="nivo" name="nivo" dir="rtl" required>
                        <optgroup>
                            <option>ابتدائي السنة الاولى</option>
                            <option>ابتدائي السنة الثانية</option>
                            <option>ابتدائي السنة الثالثة</option>
                            <option>ابتدائي السنة الرابعة</option>
                            <option>ابتدائي السنة الخامسة</option>
                            <option>ابتدائي السنة السادسة</option>
                        </optgroup>
                        <optgroup>
                            <option>اعدادي السنة الاولى</option>
                            <option>اعدادي السنة الثانية</option>
                            <option>اعدادي السنة الثالثة</option>
                        </optgroup>
                        <optgroup>
                            <option>I الجذع المشترك العلمي</option>
                            <option>I الجذع المشترك للاداب والعلوم الانسانية</option>
                            <option>I الاداب والعلوم الانسانية</option>
                            <option>I اللغة العربية</option>
                            <option>I الاقتصاد والتدبير</option>
                            <option>I العلوم التجريبية</option>
                            <option>I العلوم الرياضية</option>
                        </optgroup>
                        <optgroup>
                            <option>II الاداب</option>
                            <option>II العلوم الانسانية</option>
                            <option>II الاقتصاد</option>
                            <option>II العلوم الرياضية  ا</option>
                            <option>II العلوم الرياضية ب</option>
                            <option>II العلوم الفيزيائية</option>
                            <option>II علوم الحياة والارض</option>
                        </optgroup>
                        <optgroup>
                            <option>السنة الخامسة</option>
                            <option>لا شيئ مما سبق</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="matiere" name="matiere" dir="rtl" required>
                        <optgroup>
                            <option>الرياضيات</option>
                            <option>اللغة الفرنسية</option>
                            <option>اللغة العربية</option>
                            <option>النشاط العلمي</option>
                            <option>الاجتماعيات</option>
                            <option>التربة اسلامية</option>
                            <option>علوم الحياة والارض</option>
                            <option>الفيزياء</option>
                            <option>المعلوميات</option>
                            <option>الترجمة</option>
                            <option>علوم المهندس</option>
                            <option>لاشيئ مما سبق</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="type" name="type" dir="rtl" required>
                        <option>تمارين</option>
                        <option>دروس</option>
                        <option>امتحانات</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>   بحث</button>
            </div>
            </form>
        </div>
        <div class="col-md-9">
        	<div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10"><h3 class="panel-title"></h3></div>
                    </div>
                </div>
                <div class="panel-body">
                	@foreach($documents as $dd)
                	@if($dd->nivo_id == 4)
                	<a href="{{ url('documents/'.$dd->id.'/telecharger/') }}" class="pull-right"><font size="+1">تحميل {{ $dd->fnom }}</font></a><
                    @if(pathinfo($dd->fileplc, PATHINFO_EXTENSION) == 'pdf')
                    <img src="{{ asset('pdf.png') }}" alt="" style="width:40px; height:40px;">
                    @elseif(pathinfo($dd->fileplc, PATHINFO_EXTENSION) == 'jpg' || pathinfo($dd->fileplc, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($dd->fileplc, PATHINFO_EXTENSION) == 'png')
                    <img src="{{ asset('photo.png') }}" alt="" style="width:40px; height:40px; border-radius:50%;">
                    @elseif(pathinfo($dd->fileplc, PATHINFO_EXTENSION) == 'doc' || pathinfo($dd->fileplc, PATHINFO_EXTENSION) == 'docx')
                    <img src="{{ asset('doc.png') }}" alt="" style="width:40px; height:40px;">
                    @endif
                	<br>
                	<br>
                	<p class="text-right">{{ $dd->description }}</p>
                	<br>
                	<hr>
                	@endif
                	@endforeach
                </div>
            </div>
            <div class="text-center">
                {!! $documents->links(); !!}
            </div>
        </div>
    </div>
</div>


@endsection