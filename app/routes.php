<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('entry', function() {
	return View::make('Container.entry');	
});

Route::get('take/on-board_survey/{id}', function ( $id ) {
	$employee 	= Employee::where('employee_id', $id)->first();
	$qst 		= Questionnaire::where('survey_id', 1)->get();

	return View::make('Container.onboard_survey')->with('qst', $qst)->with('employee', $employee);
});

Route::get('/mainpage', function() {
	if ( Auth::guest() ) {
		return Redirect::to( URL::to('../../application/public/Mainpage') );
	}
	return View::make('Container.IndexContainer');
});

Route::get('return', function() {
	return Redirect::to( URL::to('../../application/public/') );
});

Route::get('onboard_survey', function() {
	$questionnaire = Questionnaire::where('survey_id', 1)->get();

	return View::make('Container.ob_Survey')->with('id', 1)->with('q', $questionnaire);
});

Route::get('training_survey', function() {
	$questionnaire = Questionnaire::where('survey_id', 2)->get();

	return View::make('Container.training_survey_container')->with('id', 2)->with('q', $questionnaire);
});

Route::get('operation_survey', function() {
	$questionnaire = Questionnaire::where('survey_id', 3)->get();

	return View::make('Container.operation_survey_container')->with('id', 3)->with('q', $questionnaire);
});

Route::get('update/survey/{id}', function( $id ) {
	$question = Questionnaire::where('survey_id', $id)->get();

	return View::make('Container.EditSurveyContainer')->with('questions', $question);
});

Route::get('employee/{id}/information', function ( $id ) {
	$employee = Employee::where("employee_id", $id)->first();

	return View::make('Container.employee_container')->with('emp', $id);
});

Route::get('employee/{id}/profile', array('before' => 'validate_auth', function ( $id ) {
	$employee 		= Employee::where('employee_id', $id)->get();
	$emp 			= Employee::where('employee_id', $id)->first();
	$answer_survey 	= AnswerSurvey::where('employee_id', $id)->get();
	$emp_sur 		= EmployeeSurvey::where('employee_id', $id)->get();

	return View::make('Container.employee_profile_container')
	->with('employee', $employee)
	->with('srvy_cnt', $employee)
	->with('emp', $emp)
	->with('emp_sur', $emp_sur)
	->with('answer_survey', $answer_survey);
}));

Route::get('take/training_survey/{id}', function($id) {
	$employee 	= Employee::where('employee_id', $id)->first();
	$qst 		= Questionnaire::where('survey_id', 2)->get();

	return View::make('Container.ts_container')->with('qst', $qst)->with('employee', $employee);
});

Route::get('view/{employee_id}/survey/{survey_id}/answers', function( $e_id, $s_id ) {
	$employee 	= Employee::where('employee_id', $e_id)->first();
	$survey 	= Survey::find($s_id);
	return View::make('Container.answers_container')
	->with('emp', $employee)
	->with('survey', $survey);
});

Route::get('print/employee/{id}/survey/{survey_id}', function($id, $survey_id) {
	$data['employee'] 			= Employee::where('employee_id', $id)->first();
	$data['survey'] 			= Survey::find($survey_id);
	$data['answer_survey'] 		= AnswerSurvey::where('survey_id', $survey_id)->where('employee_id', $id)->get();
	$data['employee_survey'] 	= EmployeeSurvey::where('employee_id', $id)->where('survey_id', $survey_id)->first();

	$pdf = PDF::loadView('Container.pdf_container', $data);
	return $pdf->stream("Employee.pdf");
});









#JSONs
Route::get('rtvEmployee', function() {
	$json = array();
	$emp = Employee::all();
	foreach ($emp as $emps) {
		$json[] = array(
			'id' 			=> $emps->id,
			'name' 			=> $emps->name,
			'employee_id' 	=> $emps->employee_id,
			'created_at' 	=> date('m/d/Y [ h:i A D ]', strtotime($emps->created_at)),
		);
	}
	return json_encode($json);
});

Route::get('fetch/{id}/survey', function( $id ) {
	$json 	= array();
	$s_data = Survey::all();

	foreach ($s_data as $s_d) {
		// QUERY EMPLOYEE_SURVEY. SEARCH FOR THE S_DATA->ID ( SURVEY_DATA ) ID...
		// COUNT THE QUERY IF IT RETURNS 1
		// DISPLAY ITS STATUS AS COMPLETED...
		$find_survey = EmployeeSurvey::where('survey_id', $s_d->id)->where('employee_id', $id)->first();
		if ( count($find_survey) != 0 ) {
			$json[] = array(
				'employee_id' 	=> $find_survey->employee_id,
				'survey_id' 	=> $s_d->id,
				'name' 			=> $s_d->name,
				'status' 		=> "Completed",
				'created_at' 	=> date('m/d/Y [ h:i A D ]', strtotime($find_survey->created_at)),
			);
		} else {
			// QUERY EMPLOYEE. SEARCH THE S_DATA ( SURVEY_DATA ) ID ON THE EMPLOYEE...
			// COUNT THE QUERY IF IT RETURNS 1
			// DISPLAY ITS STATUS AS ON PROGRESS...
			$emp = Employee::where('survey_id', $s_d->id)->where('employee_id', $id)->get();
			if (count($emp) != 0) {
				$json[] = array(
					'id' 			=> $s_d->id,
					'name' 			=> $s_d->name,
					'status' 		=> "On Progress",
					'created_at' 	=> "-",
				);
			} else {
				$json[] = array(
					'id' 			=> $s_d->id,
					'name' 			=> $s_d->name,
					'status' 		=> "On Queue",
					'created_at' 	=> "-",
				);
			}
		}
	}
	return json_encode($json);
});


Route::get('fetch/{id}/survey/{s_id}/answers', function($id, $s_id) {
	$json = array();
	$ans_sur = AnswerSurvey::where('employee_id', $id)->where('survey_id', $s_id)->get();

	foreach ($ans_sur as $answers) {
		$json[] = array(
			'id' 			=> $answers->id,
			'survey' 		=> $answers->survey->name,
			'questions' 	=> $answers->questionnaire->question,
			'answers' 		=> $answers->answer,
			'created_at' 	=> date('m/d/Y [ h:i A D ]', strtotime($answers->created_at) ),
		);
	}
	return json_encode($json);
});








#POST
Route::post('save_answer', 'AnswerSurveyController@saveSurvey');
Route::post('createsurvey', 'SurveyController@saveQuestionnaire');
Route::post('save_employee', 'EmployeeController@saveEmp');
Route::post('updatesurvey', 'EmployeeController@updateSurvey');
Route::post('access', function() {

	$employee = Employee::where('employee_id', Input::get("employee_id"))->first();

	if (count($employee) != 0 ) {
		if ($employee->survey_id == 1) {
			return Redirect::to("take/on-board_survey/".$employee->employee_id);
		} else if ($employee->survey_id == 2) {
			return Redirect::to("take/training_survey/".$employee->employee_id);
		} else if ($employee->survey_id == 3) {
			return Redirect::to("take/training_survey/".$employee->employee_id);
		}
	} else {
		return Redirect::back()->with('error', "The system couldn't find the Employee's ID.");
	}
});
