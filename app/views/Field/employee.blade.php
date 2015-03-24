



<br>
<div class="large-10 small-12 columns large-centered mainpage-container input_fields_wrap right" style=" margin-right: 7rem; width: 75%; ">
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<div class="large-12 columns large-centered">
			<br><br>
				<div class="large-10 columns large-centered">	
					@if ($errors->has())
						@foreach ($errors->all() as $error)
						<div class="panel error-Panel">
							<label class="large-12 error-Message">{{ $error }}</label>
						</div>
						@endforeach
					@endif
					<br>
					<div class="panel radius panel-body">
						<div class="panel panel-header cus-pan-hd-3 radius">
							<label class="size-22 laravel-fnt large-10 label-mg-left label-ln-ht-1"># Employee Information</label>
						</div>
						<div class="panel-body">
							<div id="abody">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>