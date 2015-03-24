@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('body')
{{ Form::open(array('url'=>'updatesurvey')) }}

	<!-- SIDEBAR -->
	@include('Utilities.Sidebar.sidebar_emp_profile')

	<!-- EMPLOYEE FIELD -->
	@include('Field.employee_profile')

	<!-- HIDDEN VALUES -->
{{ Form::close() }}
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {

	// SURVEY TABLE

	$.getJSON("{{ URL::to('/') }}/fetch/{{$emp->employee_id}}/survey",function(data) {
    $('#survey').dataTable({
		"aaData": data,
		"aaSorting": [[ 3, 'desc' ]],
		//DISPLAYS THE VALUE
		//sTITLE - HEADER
		//MDATAPROP - TBODY
		"aoColumns": 
		[
    		{"sTitle": "#", "mDataProp": "survey_id", "sClass": "size-14"},
    		{"sTitle": "Survey", "sWidth": "267px", "mDataProp": "name"},
    		{"sTitle": "Survey Status", "mDataProp": "status"},
    		{"sTitle": "Date Taken", "mDataProp": "created_at"}
    	],
    	"aoColumnDefs": 
    	[
    		//FORMAT THE VALUES THAT IS DISPLAYED ON mDataProp
    		//ID
    		{ "bSortable": false, "aTargets": [ 0 ] },
			{

				"aTargets": [ 0 ], // Column to target
				"mRender": function ( data, type, full ) {
				// 'full' is the row's data object, and 'data' is this column's data
				// e.g. 'full[0]' is the comic id, and 'data' is the comic title

				return '<label class="text-center size-14">' + data + '</label>';
				}
			},
			//APPLICANTS FULLNAME
			{
				"aTargets": [ 1 ], // Column to target
				"mRender": function ( data, type, full ) {
					// 'full' is the row's data object, and 'data' is this column's data
					// e.g. 'full[0]' is the comic id, and 'data' is the comic title
					return '<label class="size-14 dtem">' + full["name"] + '</label>';
				}
			},

			//APPLICANT_ID
			{
				"aTargets": [ 2 ], // Column to target
				"mRender": function ( data, type, full ) {
				// 'full' is the row's data object, and 'data' is this column's data
				// e.g. 'full[0]' is the comic id, and 'data' is the comic title
				return '<label class="text-center size-14">' + full["status"] + '</label>';
				}
			},

			//dateofapplication
			{
				"aTargets": [ 3 ], // Column to target
				"mRender": function ( data, type, full ) {
				// 'full' is the row's data object, and 'data' is this column's data
				// e.g. 'full[0]' is the comic id, and 'data' is the comic title
				return '<label class="text-center size-14"> ' + full["created_at"] + ' </label>';
				}
			}
		],

		//Assign ID
		"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		//var id = aData[0];
			var id = aData.employee_id;
			$(nRow).attr("data-pass", id);
			return nRow;
		},

		"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		//var id = aData[0];
			var id = aData.survey_id;
			$(nRow).attr("data-pass", id);
			return nRow;
		},

		"fnDrawCallback": function( oSettings ) {
			$('#survey tbody tr').click( function() {
				var id = $(this).attr("data-pass");
				document.location.href = "{{ URL::to('/') }}/view/{{ $emp->employee_id }}/survey/" + id + "/answers" ;
			});

			$('#survey tbody tr').hover(function() {
				$(this).css('cursor', 'pointer');
			}, function() {
				$(this).css('cursor', 'auto');
			});
			/* Need to redo the counters if filtered or sorted */
			if ( oSettings.bSorted || oSettings.bFiltered )
			{
				for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
				{
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( "<label>" + (i+1) + "</label>" );
				}
			}
		}
	});
	});



	$("#obsrvy").click( function () {
		document.getElementById("ob").value = "1";
	});

	$("#training_survey").click( function () {
		document.getElementById("training").value = "1";
	});

	$("#operation_survey").click( function () {
		document.getElementById("operation").value = "1";
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