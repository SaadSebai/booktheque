@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-right"><font size="+1">تسجيل </font></div>

                <div class="panel-body">
                    <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="input-group form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <input id="name" type="text" class="form-control text-right" name="name" value="{{ old('name') }}" required autofocus>
                            
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">الاسم العائلي</span>
                        </div>

                        <div class="input-group form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">

                                <input id="prenom" type="text" class="form-control text-right" name="prenom" value="{{ old('prenom') }}" required autofocus>

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">الاسم الشخصي</span>
                        </div>

                        <div class="input-group form-group{{ $errors->has('ville') ? ' has-error' : '' }}">

                                <input id="ville" type="text" class="form-control text-right" name="ville" value="{{ old('ville') }}" required autofocus>

                                @if ($errors->has('ville'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ville') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">المدينة</span>
                        </div>

                        <div class="input-group form-group">

                                <select class="form-control text-right" id="sexe" name="sexe" value="{{ old('sexe') }}" required>
                                  <option>ذكر</option>
                                  <option>انثى</option>
                                </select>
                            <span class="input-group-addon">الجنس</span>
                        </div>

                        <div class="input-group form-group{{ $errors->has('telephon') ? ' has-error' : '' }}">

                                <input id="telephon" type="text" class="form-control text-right" name="telephon" value="{{ old('telephon') }}"  placeholder="+212600000000"  required autofocus>

                                @if ($errors->has('telephon'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephon') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">رقم الهاتف</span>
                        </div>

                        <div class="input-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control text-right" name="email" value="{{ old('email') }}" placeholder="exmaple@gmail.com" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">البريد الالكتروني</span>
                        </div>

                        <div class="input-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" class="form-control text-right" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon">كلمة السر</span>
                        </div>

                        <div class="input-group form-group">

                                <input id="password-confirm" type="password" class="form-control text-right" name="password_confirmation" required>
                            <span class="input-group-addon">تاكيد كلمة السر</span>
                        </div>

                        <div class="g-recaptcha pull-right" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>

                        <div class="form-group text-right">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fas fa-save"></i>       تسجيل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection