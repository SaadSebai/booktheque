

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/lateef.css">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
 <nav class="navbar navbar-fff navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

             <!-- Branding Image -->
            
        </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-lift">

            @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><font size="+2"><b>   تسجيل الدخول </b></font></a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-user-plus"></i><font size="+2"><b>     تسجيل</b></font></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                  <img src="/storage/{{ Auth::user()->user_avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%;"><span class="caret">
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                      <a href="{{ url('profile') }}" class="pull-right">الملف الشخصي     <span class="glyphicon glyphicon-user"></span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="pull-right"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                            <span class="glyphicon glyphicon-off"></span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                      </ul>


             
                <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                @if (Auth::guest())
            @else
            @if(Auth::user()->actv)
            @else
            <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret"></span>    <font size="+2"><b>خاص بالمستخدم </b></font></a>

                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="{{ url('livres') }}" class="pull-right">الكتب الخاصة بك</a>
                      </li>
                      <li>
                        <a href="{{ url('documents') }}" class="pull-right">الملفات المطروحة من طرفك</a>
                      </li>
                    </ul>
                    </li>
            </ul>
              @if(Auth::user()->role_id)
              <li><a href="{{ url('message_show') }}"><font size="+2"><b>طلبات</b></font></a></li>
              <li><a href="{{ url('allusers') }}"><font size="+2"><b>رؤية المستخدمين</b></font></a></li>
              @endif
              <li><a href="{{ url('') }}"><font size="+2"><b>مساعدة</b></font></a></li>
              <li><a href="{{ url('forums') }}"><font size="+2"><b>تساؤلات</b></font></a></li>
              <li><a href="{{ url('documents/all') }}"><font size="+2"><b>دروس وامتحانات</b></font></a></li>
              <li><a href="{{ url('/livres/search') }}"><font size="+2"><b>بحث عن كتاب</b></font></a></li>
              <li><a href="{{ url('/home') }}"><font size="+1"><b><i class="fas fa-home"></i></b></font></a></li>
              @endif
            @endif
     
            </ul>
      </div>
  </div>
</nav>