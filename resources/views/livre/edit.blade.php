@extends('layouts.app')


@section('content')


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


<div class="container" id="app">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<form action="{{ url('livres/'.$livre->id) }}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

			<div class="form-group @if($errors->get('livr_nom')) has-error @endif text-right">
				<label for="">اسم الكتاب</label>
				<input type="texe" class="form-control text-right" name="livr_nom" value="{{ $livre->livr_nom }}" placeholder="اسم الكتاب">
			</div>

			@if($errors->get('livr_nom'))
				@foreach($errors->get('livr_nom') as $msg)
					<li>{{ $msg }}</li>
				@endforeach
			@endif

			<div class="form-group">
                <label for="lvr_matiere_id" class="pull-right">مستوى الكتاب</label>

                <div class="form-group">
                    <select class="form-control" id="lvr_matiere_id" name="lvr_matiere_id" value="{{ old('lvr_matiere_id') }}"  dir="rtl" required>
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
                </div>
            </div>

			<div class="form-group @if($errors->get('livr_nivo')) has-error @endif text-right">
				<label for="">مستوى الكتاب</label>
				<input type="texe" class="form-control text-right" name="livr_nivo" value="{{ $livre->livr_nivo }}" placeholder="مستوى الكتاب">
			</div>

			@if($errors->get('livr_nivo'))
				@foreach($errors->get('livr_nivo') as $msg)
					<li>{{ $msg }}</li>
				@endforeach
			@endif

			<div class="form-group @if($errors->get('ville_prnd')) has-error @endif text-right">
				<label for="">مدينة التبادل</label>
				<input type="texe" class="form-control text-right" name="ville_prnd" value="{{ $livre->ville_prnd }}" placeholder="مدينة التبادل">
			</div>

			@if($errors->get('ville_prnd'))
				@foreach($errors->get('ville_prnd') as $msg)
					<li>{{ $msg }}</li>
				@endforeach
			@endif

			<div class="from-group @if($errors->get('lvr_dscp')) has-error @endif ">
				<label class="pull-right">الوصف</label>
				<textarea name="lvr_dscp" class="form-control text-right">{{ old('lvr_dscp') }}</textarea>

				@if($errors->get('lvr_dscp'))
					@foreach($errors->get('lvr_dscp') as $message)
					<li>{{ $message }}</li>
					@endforeach	
				@endif
				<br>
			</div>

			<div class="form-group pull-right">

				<input type="file" name="photo" id="file" class="form-control inputfile" />
          		<label for="file">صورة الكتاب</label>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</div>

			<center><div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div></center>

			<div class="form-group">
				<input type="submit" class="form-control btn btn-danger" name="Modifier" value="تعديل">
			</div>

		</form>
	</div>
	</div>
</div>

@endsection