


<br>
<div class="large-10 small-12 columns large-centered mainpage-container input_fields_wrap right" style=" margin-right: 7rem; width: 75%; ">
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<br><br>
			<label class="size-24" name="emp_id">{{ $emp->employee_id }}</label>
			<label class="size-16">{{ $emp->name }}</label>
			
			<br><br><br><br>
			@include('Backend.employee_profile')
		</div>
	</div>
</div>