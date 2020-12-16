@extends('layouts.app')

@section('content')

<link rel="stylesheet"  href="http://maxodn.bootstrapodn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxodn.bootstrapodn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
		  <form action="{{route('myCaptchaPost')}}" method="post" role="form" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="col-md-4 control-label"> Email add</label>
                <div class="col-md-6">
                    <input class="form-control" id="email" type="text" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <label for="email" class="col-md-4 control-label"> Email add</label>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <div class="captcha">
                        <span>{!! captcha_img() !!}</span>
                        <button class="btn btn-success btn-refresh" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </div>
                    <input id="captcha" type="text" class="form-control" name="captcha" placeholder="Enter Captcha">
                    @if ($errors->has('captcha'))
                        <span class="help-block">
                            <strong>{{ $errors->first('captcha') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                    تسجيل الدخول
                    </button>           
                </div>
            </div>

          </form>			
        </div>
	</div>
</div>

<script type="text/javascript">
    
    $(".btn-refresh").click(function (){

        $.ajax({
            type:'GET',
            url:'/refresh_captcha',
            success:function (data) {
                $(".captcha span").html(data.captcha);
            }
        });

    });

</script>

@endsection