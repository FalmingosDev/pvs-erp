	<style>
		.client-list-table{
			padding: 20px 0px;
		}
		.ad-cl{
			padding: 7px 20px;
			border: none;
			background: #007bff;
			color: #fff;
			display: block;
			text-align: right;
			float: right;
		}
		.vd-ed-1 {
			padding: 5px 9px;
			background: #007bff;
			display: inline-block;
			margin-right: 8px;
			color: #fff;
		}
		.vd-ed-2 {
			padding: 5px 9px;
			background: #1fac30;
			display: inline-block;
			color: #fff;
		}
		td.details-control {
			background: url('<?php echo base_url(); ?>assets/img/resources/details_open.png') no-repeat center center;
			cursor: pointer;
		}
		tr.shown td.details-control {
			background: url('<?php echo base_url(); ?>assets/img/resources/details_close.png') no-repeat center center;
		}
    </style>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Client List</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('client/add'); ?>" class="ad-btn-a-tag">Add</a>  
                            </div>
                        </div>
                    </div>
					
					<div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
										<th>Client Code.</th>
										<th>Client Name</th>
										<th>Contract Period</th>
										<th>Address</th>
										<th>Contact No.</th>
										<th>Location Type</th>
										<th>Approved by</th>
										<th>View/Edit/Approve</th>
                                    </tr>
                                </thead>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </section>
	<script>
//alert('hi...');

function format ( d ) {
	var resultHTML = '';
	console.log(d);
	if(d.sales_billing != undefined){
		resultHTML += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' + 
			'<tr style="color: #4059c2;">' + 
				'<th colspan="5" style="text-align:center;">Sales/Billing</th>' + 
			'</tr>' + 
			'<tr style="color: #fff;background: #c4a16c;">' + 
				'<th>Contact Person</th>' + 
				'<th>Location</th>' + 
				'<th>Bill Type</th>' + 
				'<th>View/Edit</th>' +
			'</tr>';
		$.each(d.sales_billing, function(key, value) {
			resultHTML += '<tr>' + 
				'<td>' + value.contact_name + '</td>' + 
				'<td>' + value.contact_address_1 + '</td>' + 
				'<td>' + value.bill_type + '</td>' + 
				'<td><a class="vd-ed-1" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="vd-ed-2" href="<?php echo base_url("sales_billing/edit_sales_billing/' + d.client_id + '/' + value.sales_billing_id + '"); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>' + 
			'</tr>';
		});
		resultHTML += '</table>';
	}
	
	if(d.branch != undefined){
		resultHTML += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' + 
			'<tr style="color: #4059c2;">' + 
				'<th colspan="5" style="text-align:center;">Client Branches</th>' + 
			'</tr>' + 
			'<tr style="color: #000;background: #a6c4dd;">' + 
				'<th>Branch Name</th>' + 
				'<th>Address</th>' + 
				'<th>Sile Id</th>' + 
				'<th>View/Edit</th>' +
			'</tr>';
		$.each(d.branch, function(key, value) {
			resultHTML += '<tr>' + 
				'<td>' + value.branch_name + '</td>' + 
				'<td>' + value.branch_address + '</td>' + 
				'<td>' + value.sole_id + '</td>' + 
				'<td><a class="vd-ed-1" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="vd-ed-2" href="<?php echo base_url("branch/edit/' + d.client_id + '/' + value.branch_id + '"); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>' + 
			'</tr>';
		});
		resultHTML += '</table>';
	}
	
	if(d.billing_costing != undefined){
		resultHTML += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' + 
			'<tr style="color: #4059c2;">' + 
				'<th colspan="4" style="text-align:center;">Cost Sheet</th>' + 
			'</tr>' + 
			'<tr style="color: #fff;background: #795548;">' + 
				'<th>Designation</th>' +
				'<th>Gross Pay</th>' + 
				'<th>HSN</th>' + 
				'<th>View/Edit</th>' +
			'</tr>';
		$.each(d.billing_costing, function(key, value) {
			resultHTML += '<tr>' + 
				'<td>' + value.desig_short_name + '</td>' +
				'<td>' + value.gross_pay + '</td>' + 
				'<td>' + value.hsn_no + '</td>' +
				'<td><a class="vd-ed-1" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a><a class="vd-ed-2" href="<?php echo base_url("billing_costing/edit/' + d.client_id + '/' + value.billing_costing_cost_id + '"); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>' + 
			'</tr>';
		});
		resultHTML += '</table>';
	}
	if(resultHTML == ''){
		resultHTML = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%"><tr><td align="center">No more information available</td></tr></table>';
	}
	else{
		resultHTML += '<hr style="border-top: 1px solid #000000;" />';
	}
	console.log(resultHTML);
	return resultHTML;
}
 
$(document).ready(function() {
    var table = $('#example').DataTable( {
        //"ajax": "<?php echo base_url() . 'assets/objects.json'; ?>",
        "ajax": "<?php echo base_url() . 'client/ajax_client_list'; ?>",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "client_code" },
            { "data": "client_name" },
            { "data": "contract_period" },
            { "data": "address" },
            { "data": "contact_no" },
            { "data": "location_type" },
            { "data": "approved_by" },
            { "data": "buttons" }
        ],
        "order": false
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
            console.log(row.data());
            tr.addClass('shown');
        }
    } );
} );
    </script>