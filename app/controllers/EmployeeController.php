<?php

class EmployeeController extends BaseController {

	public function saveEmp() {
		$employee = Employee::saveEmployee( Input::all() );

		return $employee;
	}

	public function updateSurvey() {
		$survey = Employee::update_survey( Input::all() );

		return $survey;
	}
}