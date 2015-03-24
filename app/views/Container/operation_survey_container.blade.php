@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('body')
{{ Form::open(array('url' => 'createsurvey')) }}
	@include ('Utilities.Sidebar.sidebar_crtsrvy')
	@include ('Field.create_operation')
{{ Form::close() }}
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		var max_fields      = 15; //maximum input boxes allowed
		var wrapper         = $(".input_fields_wrap"); //Fields wrapper
		var add_button      = $(".add_field_button"); //Add button ID

		var x = 1; //initial text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row"><div class="large-11 columns large-centered"><div class="row"><div class="large-10 columns"><input type="text" name="mytext[]" class="text-center size-16 h-3 radius inputField " placeholder="Question # ' + (x) + '" style=" width: 106%; margin-left: -1.7rem; border-bottom-left-radius: 0px;"/><select name="type[]" class="left" style=" line-height: 1rem; margin-bottom: 1rem; margin-top: 0rem; width: 30%; margin-left: -1.7rem; margin-top: -1rem; border-bottom-right-radius: 4px;"><option value="text" selected>Open Field (textbox)</option><option value="radio">Radio Button</option><option value="checkbox">Check Boxes</option></select></div><div class="large-4 columns"><div class="row collapse"><div class="small-3 columns"><span class="postfix" style=" margin-top: -3.3rem; margin-left: 13rem; border-left: solid; border-left-color: #cccccc; border-left-width: 1px; border-right: none;">GROUP</span></div><div class="small-9 columns"><input name="grp[]" type="text" placeholder="Provide group if type is Radio" style=" margin-top: -3.3rem; border-bottom-right-radius: 4px; margin-left: 13rem; width: 115%;"/></div></div></div><a href="#" id="Font" class="tiny remove_field radius" style=" margin-left: 1rem; "><i class="fi-x" style=" line-height: 3rem; "></a></div></div></div>'); //add input box
			}
		});

		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
			e.preventDefault(); 
			$(this).parent('div').remove();
			x--;
		});
	});
</script>
@endsection

@section('style')
<style type="text/css">
	body {
		background-color: #f5f5f5;
	}
</style>
@endsection