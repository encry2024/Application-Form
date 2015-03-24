<?php $ctr = 0; ?>




<br> 
<div class="large-10 small-12 columns large-centered mainpage-container input_fields_wrap right">
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<br><br>
				<div class="large-10 columns">
				<label class="laravel-fnt size-24"># On-board Survey Question</label>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<br><br>
				<div class="large-10 columns">
				@foreach ($qst as $q)
					
					@if ($q->type == "radio")
					<div class="row">
						<div class="large-12 columns" >
							<label>{{++$ctr . " ) " . $q->question }}</label>
							@if ($q->choice_r1 != '')
								{{ Form::radio('ans', $q->choice_r1, null, ['id'=>'y_id','class' => 'text-center', "name"=>"qst-".$q->id]) }} <label class="mTop-07 text-center"> {{ $q->choice_r1 }} </label>
							@endif

							@if ($q->choice_r2 != '')
								{{ Form::radio('ans', $q->choice_r2, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"qst-".$q->id]) }} <label class="mTop-07 text-center"> {{ $q->choice_r2 }} </label>
							@endif

							@if ($q->choice_r3 != '')
								{{ Form::radio('ans', $q->choice_r3, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"qst-".$q->id]) }} <label class="mTop-07 text-center"> {{ $q->choice_r3 }} </label>
							@endif

							@if ($q->choice_r4 != '')
								{{ Form::radio('ans', $q->choice_r4, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"qst-".$q->id]) }} <label class="mTop-07 text-center"> {{ $q->choice_r4 }} </label>
							@endif

							@if ($q->choice_r5 != '')
								{{ Form::radio('ans', $q->choice_r5, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"qst-".$q->id]) }} <label class="mTop-07 text-center"> {{ $q->choice_r5 }} </label>
							@endif
							<br>
						</div>
					</div>
					@elseif ($q->type == "text")
						<label>{{++$ctr . " ) " . $q->question }}</label>
						{{ Form::text('answer_text', '', ["class"=>"inputField text-center size-16 h-3 radius", "name"=>"qst-".$q->id]) }}
					@elseif ($q->type == "checkbox")
						<label>{{++$ctr . " ) " . $q->question }}</label>
							@if ($q->choice_cb1 != '')
								{{ Form::checkbox('ans', 'choice_cb1:'.$q->choice_cb1, null, ['id'=>'y_id','class' => 'text-center', "name"=>"cb-".$q->id."[]"]) }} <label class="mTop-07 text-center"> {{ $q->choice_cb1 }} </label>
							@endif

							@if ($q->choice_cb2 != '')
								{{ Form::checkbox('ans', 'choice_cb2:'.$q->choice_cb2, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"cb-".$q->id."[]"]) }} <label class="mTop-07 text-center"> {{ $q->choice_cb2 }} </label>
							@endif

							@if ($q->choice_cb3 != '')
								{{ Form::checkbox('ans', 'choice_cb3:'.$q->choice_cb3, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"cb-".$q->id."[]"]) }} <label class="mTop-07 text-center"> {{ $q->choice_cb3 }} </label>
							@endif

							@if ($q->choice_cb4 != '')
								{{ Form::checkbox('ans', 'choice_cb4:'.$q->choice_cb4, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"cb-".$q->id."[]"]) }} <label class="mTop-07 text-center"> {{ $q->choice_cb4 }} </label>
							@endif

							@if ($q->choice_cb5 != '')
								{{ Form::checkbox('ans', 'choice_cb5:'.$q->choice_cb5, null, ['id'=>'n_id', 'class' => 'text-center', "name"=>"cb-".$q->id."[]"]) }} <label class="mTop-07 text-center"> {{ $q->choice_cb5 }} </label>
							@endif
						<br>
					@endif
					<br>
				@endforeach
				{{ Form::submit('Submit', ["class"=>"nsi-btn button small radius right"]) }}
				</div>
			</div>
		</div>
	</div>
</div>