@extends('layouts.app')


@section('content')


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


<div class="container" id="app">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<form action="{{ url('documents/'.$document->id) }}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			{{ csrf_field() }}

			<div class="form-group @if($errors->get('fnom')) has-error @endif">
                <label class="pull-right">اسم الملف</label>
                <input type="texe" class="form-control text-right" name="fnom" value="{{ $document->fnom }}">
            </div>

            @if($errors->get('fnom'))
                @foreach($errors->get('fnom') as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            @endif

            <div class="form-group">
                <label for="nivo" class="pull-right">المستوى</label>

                <div class="form-group">
                    <select class="form-control" id="nivo" name="nivo" value="{{ $document->nivo }}"  dir="rtl" required>
                        <optgroup>
                            <option>ابتدائي السنة الاولى</option>
                            <option>ابتدائي السنة الثانية</option>
                            <option>ابتدائي السنة الثالثة</option>
                            <option>ابتدائي السنة الرابعة</option>
                            <option>ابتدائي السنة الخامسة</option>
                            <option>ابتدائي السنة السادسة</option>
                        </optgroup>
                        <optgroup>
                            <option>اعدادي السنة الاولى</option>
                            <option>اعدادي السنة الثانية</option>
                            <option>اعدادي السنة الثالثة</option>
                        </optgroup>
                        <optgroup>
                            <option>I الجذع المشترك العلمي</option>
                            <option>I الجذع المشترك للاداب والعلوم الانسانية</option>
                            <option>I الاداب والعلوم الانسانية</option>
                            <option>I اللغة العربية</option>
                            <option>I الاقتصاد والتدبير</option>
                            <option>I العلوم التجريبية</option>
                            <option>I العلوم الرياضية</option>
                        </optgroup>
                        <optgroup>
                            <option>II الاداب</option>
                            <option>II العلوم الانسانية</option>
                            <option>II الاقتصاد</option>
                            <option>II العلوم الرياضية  ا</option>
                            <option>II العلوم الرياضية ب</option>
                            <option>II العلوم الفيزيائية</option>
                            <option>II علوم الحياة والارض</option>
                        </optgroup>
                        <optgroup>
                            <option>السنة الخامسة</option>
                            <option>لا شيئ مما سبق</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="matiere" class="pull-right">المادة</label>

                <div class="form-group">
                    <select class="form-control" id="matiere" name="matiere" value="{{ old('matiere') }}"  dir="rtl" required>
                        <optgroup>
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
                            <option>لاشيئ مما سبق</option>
                        </optgroup>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="doc_type" class="pull-right">نوعية الملف</label>

                <div class="form-group">
                    <select class="form-control" id="doc_type" name="doc_type" value="{{ old('doc_type') }}"  dir="rtl" required>
                        <option>تمارين</option>
                        <option>دروس</option>
                        <option>امتحانات</option>
                    </select>
                </div>
            </div>

            <div class="from-group @if($errors->get('description')) has-error @endif ">
                <label class="pull-right">الوصف</label>
                <textarea name="description" class="form-control text-right" value="{{ $document->description }}">{{ $document->description }}</textarea>

                @if($errors->get('description'))
                    @foreach($errors->get('description') as $message)
                    <li>{{ $message }}</li>
                    @endforeach 
                @endif
                <br>
            </div>

            <div class="form-group">
                <label class="pull-right">الملف</label>
                <input class="form-control" type="file" name="fileplc">
            </div>

            <div class="g-recaptcha pull-right" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>

			<div class="form-group">
				<input type="submit" class="form-control btn btn-danger" name="Modifier">
			</div>

		</form>
	</div>
	</div>
</div>

@endsection