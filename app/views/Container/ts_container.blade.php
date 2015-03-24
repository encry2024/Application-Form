@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('body')
{{ Form::open(array('url' => 'save_answer')) }}
	@include ('Field.training_survey')

	{{ Form::hidden('survey_id', '2') }}
	{{ Form::hidden('employee_id', $employee->employee_id) }}
{{ Form::close() }}

@endsection