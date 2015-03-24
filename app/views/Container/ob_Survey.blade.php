@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('body')

{{ Form::open(array('url' => 'createsurvey')) }}
	@include ('Utilities.Sidebar.sidebar_crtsrvy')
	@include ('Field.createsurvey')
	{{ Form::hidden('survey_id', '1') }}
{{ Form::close() }}

@endsection

@section('scripts')
<script type="text/javascript">
</script>
@endsection

@section('style')
<style type="text/css">
	body {
		background-color: #f5f5f5;
	}
</style>
@endsection