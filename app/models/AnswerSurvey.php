<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class AnswerSurvey extends Eloquent {

	use SoftDeletingTrait;

	protected $table = "answer_survey";
	protected $dates = ['deleted_at'];
	protected $softDelete = true;

	public function employee() {
		return $this->belongsTo('Employee');
	}

	public function survey() {
		return $this->belongsTo('Survey');
	}

	public function questionnaire() {
		return $this->belongsTo('Questionnaire');
	}

	public static function save_srvy($data) {
		foreach($data as $key=>$value) {
			if(strpos($key,'qst') !== false OR strpos($key,'cb') !== false) {

				//REMOVE "-" FROM EVERY INPUTS
				$q_id = explode("-", $key);
				
				$a_s = new AnswerSurvey;
				$a_s->survey_id = $data["survey_id"];
				$a_s->employee_id = $data["employee_id"];

				//IF KEY CONTAINS QST THE FIELD IS EITHER RADIO BUTTON OR TEXTBOX
				if(strpos($key,'qst') !== false) {
					$qId = $q_id[1];
					$a_s->questionnaire_id = $qId;
					//get id (questionnaire_id : 1)
					$a_s->answer = $value;
					$a_s->save();
				}

				//IF KEY CONTAINS CB THE FIELD IS CHECKBOX
				if (strpos($key, 'cb') !== false) {
					$qId = $q_id[1];
					$a_s->questionnaire_id = $qId;
					$answer = implode(', ', $value);
					$a_s->answer = $answer;
					$a_s->save();
				}
			}
		}
		// AFTER SAVING SURVEY; REPLACE SURVEY ID WITH NEXT SURVEY...
		$employee = Employee::where('employee_id', $data["employee_id"])->first();
		// IF THE SUBMITTED SURVEY ID IS 1; CHANGE SURVEY ID TO 2..
		if ($data["survey_id"] == 1) {
			$employee->survey_id = 2;
			$employee->save();
			// SAVE NEW EMPLOYEE SURVEY
			$emp_sur = new EmployeeSurvey;
			
			$emp_sur->employee_id = $data["employee_id"];
			$emp_sur->survey_id = 1;
			$emp_sur->save();
		} elseif ($data["survey_id"] == 2) {
			$employee->survey_id = 3;
			$employee->save();

			// SAVE NEW EMPLOYEE
			$emp_sur = new EmployeeSurvey;
			$emp_sur->employee_id = $data["employee_id"];
			$emp_sur->survey_id = 2;
			$emp_sur->save();
		}
		return Redirect::to(URL::to("../../laravel/public/login"));
	}
}