@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <marquee scrollamount="10"><h1 class="text-center">اهلا بك في موقع مجلد الحكمة</h1></marquee>
      <div class="panel panel-primary">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <center>
                    <a href="{{ url('/livres/search') }}" class="text-center">
                      <img src="{{ asset('bookSrc.jpg') }}" alt="">
                    </a>
                    <hr>
                    <a href="{{ url('/livres/search') }}" class="text-center"><font size="+2" style="font-family: 'Lateef', serif;">البحث عن المقررات الدراسية</font></a>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <center>
                    <a href="{{ url('documents/all') }}" class="text-center">
                      <img src="{{ asset('file_search.jpg') }}" alt="">
                    </a>
                    <hr>
                    <a href="{{ url('documents/all') }}" class="text-center"><font size="+2" style="font-family: 'Lateef', serif;">البحث عن دروس، تمارين وفروض</font></a>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <center>
                    <a href="{{ url('forums') }}" class="text-center">
                      <img src="{{ asset('qq.jpg') }}" alt="">
                    </a>
                    <hr>
                    <a href="{{ url('forums') }}" class="text-center"><font size="+2" style="font-family: 'Lateef', serif;">طرح تساؤل او استفسار</font></a>
                  </center>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection