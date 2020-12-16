@if(session()->has('success'))

	<div class="alert alert-success text-right">
					{{ (session()->get('success')) }}
	</div>

	@endif

	@if(session()->has('del'))

	<div class="alert alert-danger text-right">
					{{ (session()->get('del')) }}
	</div>

	@endif

	@if(session()->has('mod'))

	<div class="alert alert-warning text-right">
					{{ (session()->get('mod')) }}
	</div>

	@endif

	@if(session()->has('info'))

	<div class="alert alert-info text-right">
					{{ (session()->get('info')) }}
	</div>

	@endif