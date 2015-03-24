<?php
	$ctr = 0;
?>



<br> 
<div class="large-10 small-12 columns large-centered mainpage-container  right" style=" width: 75%; margin-right: 7rem; ">
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<br><br>
				<div class="large-10 columns large-centered">
					@if($errors->has())
						<div class="panel error-Panel">
							<label class="large-12 error-Message">{{ $errors }}</label>
						</div>
					@endif
					<label class="laravel-fnt size-24"># On-board Survey</label>
					
					<br>

					{{ Form::text('question', '', array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Enter your Question", 'style'=>" border-bottom-left-radius: 0px;")) }}
					<select name="type" class="left" style=" line-height: 1rem; width: 28%; border-bottom-right-radius: 4px;">
						<option value="text" selected>Open Field (textbox)</option>
						<option value="radio">Radio Button</option>
						<option value="checkbox">Check Boxes</option>
					</select>

					<div class="large-4 columns">
						<div class="row">
							<div class="small-3 columns">
								<span class="postfix" style=" border-left: solid; border-left-color: #cccccc; border-left-width: 1px; border-right: none; width: 130%;">GROUP</span>
							</div>
							<div class="small-9 columns">
								<input type="text" name="grp" placeholder="Provide group if type is Radio" style=" border-bottom-right-radius: 4px; margin-left: -0.15rem; width: 140%;"/>
							</div>
						</div>
					</div>
					<br><br>
					<div><label style=" margin-right: 20rem; ">Provide only if Radio Button or Checkboxes</label></div>
					<br>
					<div class="input_fields_wrap">
						{{ Form::text('ans1', '', array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Enter your Choices ( Radio or Checkbox only )", 'style'=>" border-bottom-left-radius: 0px;")) }}
						{{ Form::text('ans2', '', array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Enter your Choices ( Radio or Checkbox only )", 'style'=>" border-bottom-left-radius: 0px;")) }}
						{{ Form::text('ans3', '', array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Enter your Choices ( Radio or Checkbox only )", 'style'=>" border-bottom-left-radius: 0px;")) }}
						{{ Form::text('ans4', '', array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Enter your Choices ( Radio or Checkbox only )", 'style'=>" border-bottom-left-radius: 0px;")) }}
						{{ Form::text('ans5', '', array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Enter your Choices ( Radio or Checkbox only )", 'style'=>" border-bottom-left-radius: 0px;")) }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="separator"></div>
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<label class="right">(Total no. of Questions : {{ count($q) }} / 15 )</label>
			<br><br>
				@foreach ($q as $questions)
				<div class="panel lrvl-bg radius large-10" style=" margin-left: 5.1rem; ">
					<div class="panel qst-title cus-pan-hd-3 radius">
						<label class="size-18 laravel-fnt large-12 label-ln-ht-1">Question # {{ ++$ctr }}</label>
					</div>
					<label>Question <span>:</span> <span style=" margin-left: 1rem; ">{{ $questions->question }}</span></label>
					<label>Type <span style=" margin-left: 1.7rem; ">:</span> <span style=" margin-left: 1rem; ">{{ $questions->type }}</span></label>
					@if ($questions->type == "radio")
						<br>
						<label>
							Choices:<br>
							<br><li><span>{{ $questions->choice_r1 }}</span></li>
							<br><li><span>{{ $questions->choice_r2 }}</span></li>
							<br><li><span>{{ $questions->choice_r3 }}</span></li>
							<br><li><span>{{ $questions->choice_r4 }}</span></li>
							<br><li><span>{{ $questions->choice_r5 }}</span></li>
						</label>
					@endif
					
					@if ($questions->type == "checkbox")
						<br>
						<label>
							Choices:<br>
							<br><li><span>{{ $questions->choice_cb1 }}</span></li>
							<br><li><span>{{ $questions->choice_cb2 }}</span></li>
							<br><li><span>{{ $questions->choice_cb3 }}</span></li>
							<br><li><span>{{ $questions->choice_cb4 }}</span></li>
							<br><li><span>{{ $questions->choice_cb5 }}</span></li>
						</label>
					@endif
						<div class="panel qst-footer">
							{{ link_to('delete/'.$questions->id.'/question', 'Delete', ["class"=>"nsi-btn button small qst-btn radius right"]) }}
							{{ link_to('update/'.$questions->id.'/question', 'Edit', ["class"=>"nsi-btn button small qst-btn radius right", "style"=>" margin-right: 0.4rem; "]) }}
						</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>