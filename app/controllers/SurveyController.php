<?php

class SurveyController extends BaseController {

	public function saveQuestionnaire() {
		$saveSurvey = Questionnaire::create_questionnaire( Input::all() );

		return $saveSurvey;
	}
}