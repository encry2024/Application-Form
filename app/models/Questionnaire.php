<?php 

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Questionnaire extends Eloquent {
	
	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	protected $softDelete = true;
	protected $fillable = array(
		'question',
		'type'
	);

	public function questionnaire() {
		return $this->belongsTo('Survey');
	}

	public function answersurvey() {
		return $this->hasMany('AnswerSurvey');
	}

	public static function create_questionnaire($data) {
		$values = array(
			'question' => $data["question"],
			'type' => $_POST["type"]
		);

		$rules = array(
			'question' => 'required'
		);

		$validation = Validator::make($values, $rules);

		if($validation->fails()) {
			return Redirect::back()
				->withErrors($validation);
		} else {
			$questionnaires = new Questionnaire;
			$questionnaires->survey_id = $data["survey_id"];
			$questionnaires->question = $data["question"];
			$questionnaires->type = $data["type"];
			$questionnaires->group = $data["grp"];
			
			if ($data["type"] == "radio") {
				$c_q = Questionnaire::where('survey_id', $data["survey_id"])->get();
				$questionnaires->choice_r1 = $data["ans1"];
				$questionnaires->choice_r2 = $data["ans2"];
				$questionnaires->choice_r3 = $data["ans3"];
				$questionnaires->choice_r4 = $data["ans4"];
				$questionnaires->choice_r5 = $data["ans5"];
				if ( count($c_q) != 15 ) {
					$questionnaires->save();
					return Redirect::back();
				} else {
					return Redirect::back()->withErrors('You already have 15 Questions on On-Board Survey');
				}
			} elseif ($data["type"] == "checkbox") {
				$c_q = Questionnaires::where('survey_id', $data["survey_id"])->get();
				$questionnaires->choice_cb1 = $data["ans1"];
				$questionnaires->choice_cb2 = $data["ans2"];
				$questionnaires->choice_cb3 = $data["ans3"];
				$questionnaires->choice_cb4 = $data["ans4"];
				$questionnaires->choice_cb5 = $data["ans5"];
				if ( count($c_q) != 15 ) {
					$questionnaires->save();
					return Redirect::back();
				} else {
					return Redirect::back()->withErrors('You already have 15 Questions on On-Board Survey');
				}
			} else {
				$c_q = Questionnaires::where('survey_id', $data["survey_id"])->get();
				if ( count($c_q) != 15 ) {
					$questionnaires->save();
					return Redirect::back();
				} else {
					return Redirect::back()->withErrors('You already have 15 Questions on On-Board Survey');
				}
			}
		}
	}
}