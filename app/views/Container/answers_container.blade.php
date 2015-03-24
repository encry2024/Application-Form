@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('body')
	@include ('Field.answers')
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {

	// SURVEY TABLE

	$.getJSON("{{ URL::to('/') }}/fetch/{{$emp->employee_id}}/survey/{{$survey->id}}/answers", function(data) {
    $('#answers').dataTable({
		"aaData": data,
		"aaSorting": [[ 1, 'asc' ]],
		//DISPLAYS THE VALUE
		//sTITLE - HEADER
		//MDATAPROP - TBODY
		"aoColumns": 
		[
    		{"sTitle": "#", "mDataProp": "id", "sClass": "size-14"},
    		{"sTitle": "Survey", "mDataProp": "survey"},
    		{"sTitle": "Questions", "sWidth": "267px", "mDataProp": "questions"},
    		{"sTitle": "Answers", "mDataProp": "answers"},
    		{"sTitle": "Date Answered", "mDataProp": "created_at"}
    	],
    	"aoColumnDefs": 
    	[
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
			{

				"aTargets": [ 1 ], // Column to target
				"mRender": function ( data, type, full ) {
				// 'full' is the row's data object, and 'data' is this column's data
				// e.g. 'full[0]' is the comic id, and 'data' is the comic title

				return '<label class="text-center size-14">' + full["survey"] + '</label>';
				}
			},
			//SURVEY QUESTIONS
			{
				"aTargets": [ 2 ], // Column to target
				"mRender": function ( data, type, full ) {
					// 'full' is the row's data object, and 'data' is this column's data
					// e.g. 'full[0]' is the comic id, and 'data' is the comic title
					return '<label class="size-14 dtem">' + full["questions"] + '</label>';
				}
			},

			//SURVEY ANSWER
			{
				"aTargets": [ 3 ], // Column to target
				"mRender": function ( data, type, full ) {
				// 'full' is the row's data object, and 'data' is this column's data
				// e.g. 'full[0]' is the comic id, and 'data' is the comic title
				return '<label class="text-center size-14">' + full["answers"] + '</label>';
				}
			},

			//CREATED_AT
			{
				"aTargets": [ 4 ], // Column to target
				"mRender": function ( data, type, full ) {
				// 'full' is the row's data object, and 'data' is this column's data
				// e.g. 'full[0]' is the comic id, and 'data' is the comic title
				return '<label class="text-center size-14"> ' + full["created_at"] + ' </label>';
				}
			}
		],

		"fnDrawCallback": function( oSettings ) {
			/* Need to redo the counters if filtered or sorted */
			if ( oSettings.bSorted || oSettings.bFiltered )
			{
				for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ) {
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( "<label>" + (i+1) + "</label>" );
				}
			}
		}
	});
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