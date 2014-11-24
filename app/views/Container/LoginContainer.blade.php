@extends('Template.Front')

@section('head')
<div class="large-12 columns">
	<div class="row">
		<div class="large-8 columns large-centered">
			{{HTML::image('packages/imgs/portal-logo.png')}}
		</div>
	</div>
</div>
@endsection

@section('body')
@include('Fields.Login.Login')
@endsection