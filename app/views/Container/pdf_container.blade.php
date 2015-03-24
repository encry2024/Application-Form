<!DOCTYPE html>

<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<head>
	</head>

	<title>
	</title>

	<body>
		
		<!-- BODY -->

		<?php 
			echo "<label style='font-size: 22px; margin-left: 17rem;'>" . $survey->name . "</label><br><br><br>";
			echo "<label class='size-14'>ID: " . $employee->employee_id . "<br>";
			echo "<label class='size-14'>Name: " . $employee->name . "<span style='margin-left: 19rem;'>Date: ". date('F d, Y', strtotime($employee_survey->created_at)) ."</span><br><br>";
			echo "<div style='border-top-style: solid; border-top-color: #ddd; border-top-width: 2px;'></div><br>";
			
			$ctr = 0;
			foreach ($answer_survey as $answer) {
				echo ++$ctr . ") " . $answer->questionnaire->question . "<br>"
				. "<label style='margin-left: 1rem;'>- " . $answer->answer . "<label><br><br>" ;
			} 
		?>

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