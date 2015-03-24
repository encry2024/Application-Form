<?php

class Survey extends Eloquent {


	public function employee() {
		return $this->hasMany('Employee');
	}

	public function questionnaires() {
		return $this->hasMany('Questionnaire');
	}

	public function employeesurvey() {
		return $this->hasMany('EmployeeSurvey');
	}

	public function answersurvey() {
		return $this->hasMany('AnswerSurvey');
	}

}