@extends('layouts.app')


@section('content')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">



<div class="container">
    <div class="panel-group">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <center><h4>أهلا بك في مجلد الحكمة</h4></center>
            </div>
            <div class="panel-body text-right">
                <p class="text-right">
                <h3>  . pdf يمكن موقعنا المنخرطين  من  تحميل وتنزيل الإمتحانات والدروس والتمارين   </h3>
                <h3> .كما يمكن  الموقع من المنخرط  تنزيل المقررات الدراسية المراد اعطائها  وايضا امكانية طلب المقررات   </h3>    
                <h3>  . للاستفادة من هذه الخدمات وغيرها المرجو الإشتراك معنا  في الموقع   </h3></p>
            </div>
        </div>
    </div>          
   
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="">
    <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" style="background-color: black;" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" style="background-color: black;" data-slide-to="1"></li>
        <li data-target="#myCarousel" style="background-color: black;" data-slide-to="2"></li>
        </ol>

    <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/page1.png" alt="Los Angeles"  width="1000" height="500">
            </div>

        <div class="item">
            <img src="img/page2.png" alt="Chicago"  width="1000" height="500">
        </div>
    
        <div class="item">
            <img src="img/page3.png" alt="New york"  width="1000" height="500">
        </div>
        </div>

    <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>


@endsection