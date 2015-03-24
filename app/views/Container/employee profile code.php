			<label class="laravel-fnt size-16"># Surveys to Take</label>
			<div class='c-separator-2'></div><br>

			<!-- SURVEY VALIDATION -->
				@foreach($employee as $e_s)
					@if($e_s->survey_id == 1)
						{{ link_to('onboard_survey', 'On-board Survey') }} &mdash; Ongoing
					@elseif($e_s->survey_id == 2)
						{{ link_to('training_survey', 'Training Survey') }} &mdash; Ongoing
					@elseif($e_s->survey_id == 3)
						{{ link_to('operation_survey', 'Operation Survey') }} &mdash; Ongoing
					@endif
				@endforeach

			</div>
		</div>
	</div>

	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<br><br>
			<label class="laravel-fnt size-16"># Survey Completed</label>
			<div class='c-separator-2'></div><br>
				@foreach($emp_sur as $e_s)
					@if(count($emp_sur) == 0 )
						<label class="alert">The employee haven't finished any surveys yet.</label>
					@else
						@if($e_s->survey_id == 1)
							{{ link_to('onboard_survey', $e_s->survey->name) }} &mdash; Completed<br>
						@endif

						@if($e_s->survey_id == 2)
							{{ link_to('training_survey', $e_s->survey->name) }} &mdash; Completed<br>
						@endif

						@if($e_s->survey_id == 3)
							{{ link_to('operation_survey', $e_s->survey->name) }} &mdash; Completed<br>
						@endif
					@endif
				@endforeach
			</div>
		</div>
	</div>