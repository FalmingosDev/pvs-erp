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
                        <div class="col-md-11">
                            <h1 class="text-center">Employee List</h1>
                        </div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('employee/add'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				
			<?php //echo form_open('', array('id' => 'search_form')); ?>
			<form id="search_form">
			<div class="row" style="padding-left: 15px;">
				<div class="col-md-12">	
					<div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="doj_from" class="col-sm-3 col-form-label col-form-label-sm pr-0">DOJ From: </label>
								<div class="col-sm-7 p-0">
									<input type="date" class="form-control form-control-sm" id="doj_from" name="doj_from" value="<?php echo set_value('doj_from'); ?>">  
								</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label for="doj_to" class="col-sm-2 col-form-label col-form-label-sm pr-0">To: </label>
								<div class="col-sm-9 pl-0">
									<input type="date" class="form-control form-control-sm" id="doj_to" name="doj_to" value="<?php echo set_value('doj_to'); ?>">
								</div>
                            </div>
                        </div>
						<div class="col-md-3 pr-0">
                             <div class="form-group row">
                                 <label for="job_type" class="col-sm-3 col-form-label col-form-label-sm pr-0">Job Type: </label>
                                    <div class="col-sm-9">
                                        <select name="job_type" id="job_type" class="form-control form-control-sm">
                                            <option value="">Any</option>
                                            <option value="G"<?php echo set_select('job_type', 'G'); ?>>Staff</option>
                                            <option value="C"<?php echo set_select('job_type', 'C'); ?>>Contractual</option>
											<option value="B"<?php echo set_select('job_type', 'B'); ?>>Contractual Staff</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-1">
                            <button class="cr-a" style="padding: 6px 0px;">Search</button>
                        </div>  
                    </div> 
                </div> 
			</div> 
			<?php //echo form_close(); ?>
			</form>
			<div class="row">
				<div class="col-md-12">	
					<div class="wrapper-box">
                        <table id="list-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th></th>
										<th>Employee Code.</th>
										<th>Name</th>
										<th>Contact No.</th>
										<th>Designation</th>
										<th>Aadhaar No</th>
										<th>DOB</th>
										<th>DOJ</th>
										<th>Job Type</th>
										<th>View Reports</th>
										<th>Edit/Approve</th>
                                    </tr>
                                </thead>
                        </table>
                    </div>
                </div>
			</div>
            </div>
          </div>
      </section>
	<script>
//alert('hi...');
var table;
function format ( d ) {
	var resultHTML = '';
	console.log(d);
	if(d.employee_detail != undefined){
		resultHTML += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" width="100%">' + 
			'<tr style="color: #4059c2;">' + 
				'<th colspan="5" style="text-align:center;">Employee Details</th>' + 
			'</tr>' + 
			'<tr style="color: #fff;background: #c4a16c;">' + 
				'<th>Qualification</th>' + 
				'<th>Gun License Expiry Date</th>' + 
				'<th>Driving License Renewal Date</th>' + 
				'<th>Emergency Contact</th>' + 
				'<th>View/Edit</th>' +
			'</tr>';
		$.each(d.employee_detail, function(key, value) {
			resultHTML += '<tr>' + 
				'<td>' + value.qualification + '</td>' + 
				'<td>' + value.gun_license_expiry_date + '</td>' + 
				'<td>' + value.driving_license_renewal_date + '</td>' + 
				'<td>' + value.accidental_contact_name + ' <br /> Ph: ' + value.accidental_contact_no + '</td>' + 
				'<td><a class="vd-ed-2" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a> &nbsp; <a class="vd-ed-2" href="<?php echo base_url("employee_detail/edit/' + d.employee_id + '/' + value.employee_detail_id + '"); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>' + 
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
    getEmployees();
} );
function getEmployees(){
	if(table){
		$("#list-table").dataTable().fnDestroy();
	}
	table = $('#list-table').DataTable( {
        "ajax": {
			"url" :"<?php echo base_url() . 'employee/ajax_employee_list'; ?>",
			"type" : "GET",
			"data": {
				'doj_from': $("#doj_from").val(),
				'doj_to': $("#doj_to").val(),
				'job_type': $("#job_type").val()
			}
		},
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "employee_code" },
            { "data": "employee_name" },
            { "data": "telephone_no" },
            { "data": "desig_name" },
            { "data": "aadhaar_card_no" },
            { "data": "dob" },
            { "data": "doj" },
            { "data": "job_type" },
            { "data": "view_btn" },
            { "data": "buttons" }
        ],
        "order": false
    } );
    
    $('#list-table tbody').on('click', 'td.details-control', function () {
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
}
$("#search_form").submit(function(event){
	event.preventDefault();
	getEmployees();
});
    </script>