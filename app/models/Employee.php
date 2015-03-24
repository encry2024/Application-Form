<?php

class Employee extends Eloquent {

	public function survey() {
		return $this->belongsTo('Survey');
	}

	public function employeesurvey() {
		# code...
		return $this->hasMany('EmployeeSurvey');
	}

	public function answersurvey() {
		return $this->hasMany('AnswerSurvey');
	}

	public static function saveEmployee( $data ) {

		$rules = array(
			'id' => 'required|unique:employees,employee_id'
		);

		$messages = array('id.unique' => 'User already exists');
		// do the validation ----------------------------------
		// validate against the inputs from our form
		$validator = Validator::make(Input::all(), $rules, $messages);

		// check if the validator failed -----------------------
		if ($validator->fails()) {

			// get the error messages from the validator
			$messages = $validator->messages();

			// redirect our user back to the form with the errors from the validator
			return Redirect::back()
			->withErrors($validator);

		} else {
			$employee = new Employee;
			$employee->employee_id = Input::get("id");
			$employee->survey_id = 1;
			$employee->name = Input::get("name");
			$employee->save();

			return Redirect::back();
		}
	}

	public static function update_survey($data) {
		$employee = Employee::where('employee_id', $data["emp_id"])->first();
		
		if ($employee->ob_srvy == 2 ) {
			$employee->training_survey = 1;
		}

		if ($employee->training_survey == 2 ) {
			$employee->operation_survey = $data['operation_survey'];
		}

		$employee->save();

		return Redirect::back();
	}
}