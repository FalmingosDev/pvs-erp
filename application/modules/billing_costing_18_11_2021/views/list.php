	<div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="#" class="current">Tables</a>
			</div>
			<div class="row-fluid">
			<div class="widget-title">
				<span class="icon"><i class="icon-th-list"></i></span>
                <h5>Billing Costing List</h5>
				<div class="buttons">
					<a id="add_btn" href="<?php echo base_url('billing_costing/add'); ?>" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> Add new</a>
				</div>
			</div>
			</div>
							
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <!-- <span class="icon"><i class="icon-th"></i></span>
                            <h5>Data table</h5> -->
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th></th>
										<th>Client Code.</th>
										<th>Client Name</th>
										<th>Contract Period</th>
										<th>Approved by</th>
										<th>View/Edit/Approve</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script>
function format ( d ) {
	var resultHTML = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' + 
        '<tr style="color: #4059c2;">' + 
            '<th colspan="5" style="text-align:center;">Sales/Billing</th>' + 
        '</tr>' + 
        '<tr style="color: #fff;background: #c4a16c;">' + 
            '<th>Billing Ref. No.</th>' + 
			'<th>Name for Billing</th>' + 
			'<th>Location</th>' + 
			'<th>Bill Type</th>' + 
            '<th>View/Edit</th>' +
        '</tr>';
	$.each(d.billing, function(key, value) {
		resultHTML += '<tr>' + 
			'<td>' + value.billing_no + '</td>' + 
			'<td>' + value.billing_name + '</td>' + 
			'<td>' + value.location + '</td>' + 
			'<td>' + value.bill_type + '</td>' + 
            '<td><a class="vd-ed-1" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="vd-ed-2" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>' + 
		'</tr>';
	});
    resultHTML += '</table>';
	
	resultHTML += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' + 
        '<tr style="color: #4059c2;">' + 
            '<th colspan="4" style="text-align:center;">Client Location</th>' + 
        '</tr>' + 
        '<tr style="color: #000;background: #a6c4dd;">' + 
            '<th>Billing Ref. No.</th>' + 
			'<th>Location</th>' + 
			'<th>Site</th>' + 
            '<th>View/Edit</th>' +
        '</tr>';
	$.each(d.deployment, function(key, value) {
		resultHTML += '<tr>' + 
			'<td>' + value.billing_no + '</td>' + 
			'<td>' + value.location + '</td>' + 
			'<td>' + value.site + '</td>' + 
            '<td><a class="vd-ed-1" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="vd-ed-2" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>' + 
		'</tr>';
	});
    resultHTML += '</table>';
	
	resultHTML += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' + 
        '<tr style="color: #4059c2;">' + 
            '<th colspan="4" style="text-align:center;">Cost Sheet</th>' + 
        '</tr>' + 
        '<tr style="color: #fff;background: #795548;">' + 
            '<th>Billing Ref. No.</th>' + 
			'<th>Location</th>' + 
			'<th>Designation</th>' +
            '<th>View/Edit</th>' +
        '</tr>';
	$.each(d.cost_sheet, function(key, value) {
		resultHTML += '<tr>' + 
			'<td>' + value.billing_no + '</td>' + 
			'<td>' + value.location + '</td>' + 
			'<td>' + value.designation + '</td>' +
            '<td><a class="vd-ed-1" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="vd-ed-2" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>' + 
		'</tr>';
	});
    resultHTML += '</table>';
	
	return resultHTML;
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "<?php echo base_url() . 'assets/objects.json'; ?>",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "docket_no" },
            { "data": "client_name" },
            { "data": "contract_period" },
            { "data": "approved_by" },
            { "data": "buttons" }
        ],
        "order": [[1, 'asc']],
		
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"sDom": '<""l>t<"F"fp>'
    } );
     
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
      </script>