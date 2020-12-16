@extends('layouts.app')


@section('content')

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.jquery.min.js"></script>
    <script src="https://maxcdbootstrap.min.js"></script>

	<div class="container" id="app">
		<div class="row">
			<div class="col-md-12">

				<h1 class="text-right">لائحة ملفاتي</h1>
				<center>
					<a href="{{ url('documents/create') }}" class="btn btn-success" style="width:56px; height:50px; border-radius:50%;"><font size="+3"><span class="glyphicon glyphicon-plus-sign"></span></font></a>
				</center>
				<br>
				<br>
				<hr>
				<div class="row">
					@foreach($documents as $doc)
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							@if(pathinfo($doc->fileplc, PATHINFO_EXTENSION) == 'pdf')
							<img src="{{ asset('pdf.png') }}" alt="" style="width:200px; height:200px;">
							@elseif(pathinfo($doc->fileplc, PATHINFO_EXTENSION) == 'jpg' || pathinfo($doc->fileplc, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($doc->fileplc, PATHINFO_EXTENSION) == 'png')
							<img src="{{ asset('storage/'.$doc->fileplc) }}" alt="" style="width:200px; height:200px; border-radius:50%;">
							@elseif(pathinfo($doc->fileplc, PATHINFO_EXTENSION) == 'doc' || pathinfo($doc->fileplc, PATHINFO_EXTENSION) == 'docx')
							<img src="{{ asset('doc.png') }}" alt="" style="width:200px; height:200px;">
							@endif
							<div class="caption text-right">
								<h3>{{ $doc->fnom }}</h3>
								<p>{{ $doc->nivo }}</p>
								<p>
									<form action="{{ url('documents/'.$doc->id) }}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<a href="{{ url('documents/'.$doc->id.'/telecharger/') }}" class="btn btn-primary">تحميل   <span class="glyphicon glyphicon-download-alt"></span></a>

									<button type="submit" class="btn btn-danger">مسح   <span class="glyphicon glyphicon-trash"></span></button>
									</form>
								</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>
	</div>
	</div>


@endsection