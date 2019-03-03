<!-- @if(count($errors) > 0 )
	@foreach($errors->all() as $error)
	<div class="message is-danger">
		<div class="message-body">
		{{$error}}
		</div>
	</div>
	@endforeach
@endif

@if(session('success'))
	<div class="message is-success">
		<div class="message-body">
		{{session('success')}}
		</div>
	</div>
@endif

@if(session('error'))
	<div class="message is-danger">
		<div class="message-body">
		{{session('error')}}
		</div>
	</div>
@endif -->




@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

        <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('info'))

<div class="alert alert-info alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($errors->any())

<div class="alert alert-danger">

	<button type="button" class="close" data-dismiss="alert">×</button>

	Please check the form below for errors

</div>

@endif
