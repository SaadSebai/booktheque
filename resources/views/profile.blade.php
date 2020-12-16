@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.mi"></script>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<img src="{{ asset('storage/'.$user->user_avatar) }}" style="width:200px; height:200px; float:left; border-radius:50%; margin-right:25px;">
			<h2>{{ $user->name }} {{ $user->prenom }}</h2>

			<form enctype="multipart/form-data" action="{{ url('profile/'.$user->id) }}" method="POST">
				<input type="file" name="user_avatar" id="file" class="inputfile" />
          <label for="file"><i class="fas fa-upload" for="file"></i>تغيير الصورة الشخصية</label>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br>
				<div class="form-group">
                     <button type="submit" class="btn btn-blue">
                      	تاكيد
                     </button>
				 </div>
			</form>
          
			<br>
			<br>
			<hr>
      <h1 class="text-right">خدمات</h1>
      <div class="panel panel-primary">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <div class="col-md-4 col-md-offset-2">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <center>
                    <a href="{{ url('livres') }}" class="text-center">
                      <img src="{{ asset('ooko.png') }}" alt="">
                    </a>
                    <hr>
                    <a href="{{ url('livres') }}" class="text-center"><font size="+2" style="font-family: 'Lateef', serif;">الكتب الخاصة بك</font></a>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <center>
                    <a href="{{ url('documents') }}" class="text-center">
                      <img src="{{ asset('doccc.png') }}" alt="">
                    </a>
                    <hr>
                    <a href="{{ url('documents') }}" class="text-center"><font size="+2" style="font-family: 'Lateef', serif;">الملفات المطروحة من طرفك</font></a>
                  </center>
                </div>
              </div>
            </div>
          </div>
          </div>
            <hr>
		<h1 class="text-right">تعديل المعلومات</h1>
		<div class="col-md-8 col-md-offset-2">
      <center><button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">تعديل المعلومات</button></center>
      <div id="demo" class="collapse">
			<form action="{{ url('profile/'.$user->id) }}" method="post">
				<input type="hidden" name="_method" value="PUT">
                         {{ csrf_field() }}

                        <div class="input-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input id="name" type="text" class="form-control text-right" name="name" value="{{ old('name') }}" required>
                            
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">الاسم العائلي</span>
                        </div>

                        <div class="input-group form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">

                                <input id="prenom" type="text" class="form-control text-right" name="prenom" value="{{ old('prenom') }}" required>

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">الاسم الشخصي</span>
                        </div>

                        <div class="input-group form-group{{ $errors->has('ville') ? ' has-error' : '' }}">

                                <input id="ville" type="text" class="form-control text-right" name="ville" value="{{ old('ville') }}" required>

                                @if ($errors->has('ville'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ville') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">المدينة</span>
                        </div>
                        <div class="input-group form-group{{ $errors->has('telephon') ? ' has-error' : '' }}">

                                <input id="telephon" type="text" class="form-control text-right" name="telephon" value="{{ old('telephon') }}" required>

                                @if ($errors->has('telephon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephon') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">رقم الهاتف</span>
                        </div>

                        <div class="input-group form-group">

                                <select class="form-control text-right" id="sexe" name="sexe" value="{{ old('sexe') }}" required>
                                  <option>ذكر</option>
                                  <option>انثى</option>
                                </select>
                            <span class="input-group-addon">الجنس</span>
                        </div>
						<div class="form-group">
                        <button type="submit" class="btn btn-blue">
                          		تعديل
                        </button>
				  		</div>
                        
                </form>
              </div>
            </div>
		</div>
	</div>
</div>
@endsection