@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-right"><font size="+1">تسجيل الدخول</font></div>

                <div class="panel-body">
                    <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        
                        <div class="input-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                                <input id="email" type="email" class="form-control text-right" name="email" value="{{ old('email') }}"  placeholder="البريد الالكتروني" required autofocus>
                                
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        </div>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <li>البريد الالكتروني غير صالح</li>
                                    </span>
                                @endif

                        <div class="input-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                                <input id="password" type="password" class="form-control text-right" name="password" placeholder="كلمة السر" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        </div>

                        <div class="form-group pull-right">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرني
                                    </label>
                                </div>
                        </div>
                        <br>
                        <br>
                        <div class="g-recaptcha pull-right" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                        <br>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                     استرجاع كلمة السر؟
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    تسجيل الدخول
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
