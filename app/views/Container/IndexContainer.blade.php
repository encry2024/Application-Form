@extends ('Template.Front')

@section('head')
	@include ('Utilities.Topbar.topbar')
@endsection

@section('onScript')
	onLoad="checkUser()"
@endsection

@section('body')
	@include ('Utilities.Sidebar.sidebar')
	@include ('Field.index')
@endsection

@section('scripts')
<script type="text/javascript">


$(document).ready(function() {
	rtrApplicants();

	$.getJSON("{{ URL::to('/') }}/rtvEmployee",function(data) {
    $('#example1').dataTable({
		"aaData": data,
		"aaSorting": [[ 3, 'desc' ]],
		//DISPLAYS THE VALUE
		//sTITLE - HEADER
		//MDATAPROP - TBODY
		"aoColumns": 
		[
    		{"sTitle": "#", "mDataProp": "id", "sClass": "size-14"},
    		{"sTitle": "Fullname", "sWidth": "267px", "mDataProp": "name"},
    		{"sTitle": "Employee ID", "mDataProp": "employee_id"},
    		{"sTitle": "Date Applied", "mDataProp": "dateofapplication"}
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
				return '<label class="text-center size-14">' + full["employee_id"] + '</label>';
				}
			},

			//dateofapplication
			{
				"aTargets": [ 3 ], // Column to target
				"mRender": function ( data, type, full ) {
				// 'full' is the row's data object, and 'data' is this column's data
				// e.g. 'full[0]' is the comic id, and 'data' is the comic title
				return '<label class="text-center size-14">' + full["created_at"] + '</label>';
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

		"fnDrawCallback": function( oSettings ) {
			$('#example1 tbody tr').click( function() {
				var id = $(this).attr("data-pass");
				document.location.href = "{{ URL::to('/') }}/employee/" + id + "/profile";
			});

			$('#example1 tbody tr').hover(function() {
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

	function rtrApplicants() {
		$.getJSON("{{ URL::to('../../application/public/') }}/getEmployee",function(data) {
			$('#abody').empty();
			$.each(data, function(i,data) {
				var listData = "<a href='employee/" + data.employee_id + "/information' class='sn-bg notif size-14 cnt mrg-lft-1 left label-black'> [ " + data.created_at + ' ] [ Applicant ID: ' + data.applicant_id + ' ] ' + data.firstname + ' ' + data.middle + ' ' + data.lastname + " </a>";
				$('#abody').append(listData);
				//employee/" + data.applicant_id + "/profile
			});
		});
	}
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