<?php

class EmployeeSurvey extends Eloquent {
	protected $table = "employee_survey";


	public function survey() {
		return $this->belongsTo('Survey');
	}

	public function employee() {
		return $this->belongsTo('Employee');
	}
	
}