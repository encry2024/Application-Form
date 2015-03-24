@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('body')
{{ Form::open(array('url'=>'save_employee')) }}

	<!-- SIDEBAR -->
	@include('Utilities.Sidebar.sidebar_emp')

	<!-- EMPLOYEE FIELD -->
	@include('Field.employee')

	<!-- hidden values -->
	{{ Form::hidden('training_survey', '', ["id"=>"training"]) }}
	{{ Form::hidden('operation_survey', '', ["id"=>"operation"]) }}
{{ Form::close() }}
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	rtrApplicants();

	$("#obsrvy").click( function () {
		document.getElementById("ob").value = "1";
	});

	$("#training_survey").click( function () {
		document.getElementById("training").value = "1";
	});

	$("#operation").click( function () {
		document.getElementById("operation").value = "1";
	});

	function rtrApplicants() {
		$.getJSON("{{ URL::to('../../application/public/') }}/fetch/{{ $emp }}/employee", function(data) {
			$('#abody').empty();
			$.each(data, function(i,data) {
				var emp_id = "<label class='info-fnt' style='line-height: 2rem;'>Employee ID <span style=' margin-left: 15rem; '> &#8212 </span> <span class='size-14 label-black right info-fnt' name='id'><input type='text' value='" + data.employee_id + "' name='id' readOnly/></span> </label><br>";
				var emp_name = "<label class='info-fnt' style='line-height: 2rem;'>Emplyoee Name  <span style=' margin-left: 13.7rem; '> &#8212 </span> <span class='right'>  <input type='text' value='" + data.firstname + " " + data.middle + " " + data.lastname + "' name='name' readOnly/></span> </label> <br>";
				var emp_dateApplied = "<label class='info-fnt' style='line-height: 2rem;'>Date Applied  <span style=' margin-left: 14.9rem; '> &#8212 </span> <span class='right'> <input type='text' value='" + data.dateofapplication + "' readOnly/> </span> </label>";
				
				$('#abody').append(emp_id + emp_name + emp_dateApplied);
				//employee/" + data.applicant_id + "/profile
			});
		});
	}
});
</script>
@endsection

@section('style')
<style type="text/css">
	body {
		background-color: #f5f5f5;
	}
</style>
@endsection