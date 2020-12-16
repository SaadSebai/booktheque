<div class="container">
    <div class="row">
      <div class="col-md-12">
        
          <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">                            
                  <h3 class="text-center"><strong><h1>لا يمكنك استخدام هذه الصفحة الان</h1></strong></h3>
                </div>
                  <div class="panel-body text-center">
                    <font size="+1">
                    <p>لقد تم توقيفك من الصفح بسبب خرقك لبعض القوانين</p>
                    <p>يمكنك كتابة رسالة استسماح لمحاولة ارجاع حسابك</p>
                    </font>
                  </div>
            </div>
          <form action="{{ url('message') }}" method="post">
            {{ csrf_field() }}
          <div class="col-md-8 col-md-offset-2">
          <div class="from-group">
            <textarea name="msg"  rows="4" class="form-control text-right">{{ old('lvr_dscp') }}</textarea>
          </div>
          <br>
          <div class="form-group">
            <center>
            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span>
              ارسال
            </button>
            </center>
          </div>
          </div>
          </form>
      </div>
    </div>
</div>