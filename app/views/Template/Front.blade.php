<!DOCTYPE html>

<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<head>
		{{ HTML::script('packages/foundation-5.4.7/js/vendor/modernizr.js') }}
		{{ HTML::style('packages/foundation-5.4.7/css/foundation.css') }}
		{{ HTML::style('packages/foundation-icons/foundation-icons.css') }}
		{{ HTML::style('packages/foundation-icons/preview.html') }}
		{{ HTML::style('packages/DataTables-1.10.4/media/css/jquery.dataTables.min.css') }}
		{{ HTML::style('packages/custom-style/custom-style.css') }}
		{{ HTML::style('packages/foundation-icons/foundation-icons.ttf') }}
		{{ HTML::style('packages/foundation_icons_general/foundation_icons_general/stylesheets/general_foundicons.css') }}

		{{ HTML::style('assets/css/main.css') }}
		{{ HTML::style('packages/foundation-5.4.7/css/normalize.css') }}
		{{ HTML::style('packages/DataTables-1.10.4/media/css/jquery.dataTables.css') }}
		@yield('head')

	</head>

	<title>
		NSI :: Online Survey
	</title>

	<body>
		{{ HTML::script('packages/DataTables-1.10.4/media/js/jquery.js') }}
	
		{{ HTML::script('packages/foundation-5.4.7/js/vendor/jquery.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/vendor/fastclick.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/foundation.min.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/foundation/foundation.topbar.js') }}
		{{ HTML::script('assets/js/picker.js') }}

		{{ HTML::script('packages/jscripts/moment.js') }}
		{{ HTML::script('packages/jTables/jquery.dataTables.min.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/foundation/foundation.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/vendor/fastclick.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/vendor/jquery.cookie.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/foundation/foundation.tooltip.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/foundation/foundation.dropdown.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/foundation/foundation.alert.js') }}
		{{ HTML::script('packages/foundation-5.4.7/js/foundation/foundation.reveal.js') }}
		{{ HTML::script('packages/DataTables-1.10.4/media/js/jquery.dataTables.min.js') }}
		{{ HTML::script('packages/DataTables-1.10.4/media/js/jquery.dataTables.js') }}
		
		<!-- BODY -->
		@yield('body')
		@yield('style')

		<!-- SCRIPTS -->
		@yield('scripts')
		<script>
		$(document).foundation();
			$.getJSON("{{ URL::to('../../application/public') }}/retrnName", function(data) {
				$.each(data, function(i,data) {
					var listData = "Logged in as :: " + data.firstname + " " + data.lastname;
					$('#adminName').append(listData);
				});
			});
		</script>

		<!-- CUSTOM STYLE -->
		<style type="text/css">
			body {
			margin:0;
			padding:0;
			/*background-color: #f4726d;
			/*background: linear-gradient(to bottom, #ff6935, #4e1400);*/
			background-repeat:no-repeat;
			background-attachment:fixed;
			margin: 0;
			background-size:contain;
			padding: 0;
			height: 100%;
			width: 100%;
			position:relative;
			bottom:0px;
			top:0px;
			margin-top:0px;
			margin-bottom:0px;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			max-height:100%;
			max-width:100%;
			-webkit-font-smoothing: antialiased;
			font-family:Trebuchet MS, Arial, 'Lato_lig', sans-serif;
			font-size:1em;
		}
	</style>
		
	</body>
</html>