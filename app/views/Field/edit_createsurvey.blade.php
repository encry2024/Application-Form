



<br> 
<div class="large-10 small-12 columns large-centered mainpage-container input_fields_wrap right">
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<br><br>
				<div class="large-10 columns">
				<label class="laravel-fnt size-24"># Edit Survey</label>
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
				@foreach ($questions as $q)
					{{ Form::text('mytext[]', $q->question, array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Question # 1", 'style'=>" border-bottom-left-radius: 0px")) }}
					{{ Form::Select('type[]', array('text'=>'Open Field (Textbox)', 'radio'=>'Radio Button', 'checkbox'=>'Check Boxes'), $q->type, array('class' => 'lHeight-1 label-black left', "style"=>" line-height: 1rem; margin-bottom: 1rem; margin-top: 0rem; width: 28%; margin-top: -1rem; border-bottom-right-radius: 4px;")) }}
				@endforeach
				</div>
			</div>
		</div>
	</div>
</div>