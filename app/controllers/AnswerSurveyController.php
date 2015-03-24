<?php

class AnswerSurveyController extends BaseController {

	public function saveSurvey() {
		$a_s = AnswerSurvey::save_srvy( Input::all() );

		return $a_s;
	}

}