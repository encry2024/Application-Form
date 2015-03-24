



<div class="large-2 columns">
	<label class="laravel-fnt sidebar-button size-24">Create Survey</label>
	<div class="radius">
		<ul class="side-nav">
		<br><br><br>
			<li>{{ link_to('#', ' Add Question', $attributes = array('class' => 'laravel-fnt sidebar-button right add_field_button')) }}</li>
			<li class="separator custom-separator" style="margin-top: 3rem !important;"></li>
			<li>{{ Form::submit('Save Survey', ["class"=>"button small laravel-fnt sidebar-button right", "style"=>"background-color: transparent"]) }}</li>
			<li>{{ link_to('/', ' Return Home', ["class"=>"laravel-fnt sidebar-button right"]) }}</li>
		</ul>
	</div>
</div>