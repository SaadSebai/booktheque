@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">البحث عن كتاب</div>
                <div class="panel-body">
                    <form action="{{URL::to('livres/search')}}" method="POST" role="search">
                        {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control text-right" name="lname" placeholder="اسم الكتاب">
                                <span class="input-group-addon">اسم الكتاب</span>
                            </div>
                            <br>
                            <div class="input-group">
                                <select class="form-control" id="matiere_nom" name="matiere_nom" value="{{ old('matiere_nom') }}"  dir="rtl">
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
                                    <option>التربة تشكيلية</option>
                                    <option>التربة اسرية</option>
                                    <option>لاشيئ مما سبق</option>
                                </select>
                                <span class="input-group-addon">مادة الكتاب</span>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control text-right" name="lnivo" placeholder="مستوى الكتاب">
                                <span class="input-group-addon">مستوى الكتاب</span>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" class="form-control text-right" name="lville" placeholder="مدينة التبادل">
                                <span class="input-group-addon">مدينة التبادل</span>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-3 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary btn-block" name="Search"><span class="glyphicon glyphicon-search"></span>   بحث</button>
                                </div>
                            </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        @if(isset($details))
        <div class="container">
        <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <p class="text-right panel-title">نتيجة البحث</p>
            </div>
            <table class="table table-striped">
                <thead class="text-right">
                    <tr>
                        <td></td>
                        <td>مدينة التبادل</td>
                        <td>مستوى الكتاب</td>
                        <td>اسم الكتاب</td>
                    </tr>
                </thead>
            <tbody class="text-right">
                @foreach($details as $lvr)
                
                <tr>
                    @if($lvr->acc == 0)
                        <td>
                            <a href="{{ url('livres/'.$lvr->id.'/see_info') }}" class="btn btn-success">متوفر    <span class="glyphicon glyphicon-info-sign"></span></a>
                        </td>
                        @if(Auth::user()->role_id)
                        <td>
                            <form action="{{ url('livres/aa/'.$lvr->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">مسح   <span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>
                        @endif
                    @else
                    <td>هذا الكتاب غير متوفر</td>
                    @endif
                    <td>{{$lvr->ville_prnd}}</td>
                    <td>{{$lvr->livr_nivo}}</td>
                    <td>{{$lvr->livr_nom}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        @elseif(isset($message))
            <h3 class="text-center">{{ $message }}</h3>
            <center><img src="{{ asset('noresult.gif') }}" alt="" style="width:300px; height:300px;"></center>
        @endif
</div>
@endsection