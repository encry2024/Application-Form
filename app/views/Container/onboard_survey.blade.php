@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('body')
{{ Form::open(array('url' => 'save_answer')) }}
	@include ('Field.ob_survey')

	{{ Form::hidden('survey_id', '1') }}
	{{ Form::hidden('employee_id', $employee->employee_id) }}
{{ Form::close() }}

@endsection