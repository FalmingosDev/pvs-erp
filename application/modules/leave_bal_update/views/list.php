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
                            <h1>Leave Balance Update List</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                
                            </div>
                        </div>
                    </div>
					
					<div class="wrapper-box">
                        <table id="list-table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Employee Code.</th>
										<th>Name</th>
										<th>Designation</th>
										<th>Opening EL</th>
										<th>Opening SL</th>
										<th>Opening CL</th>
										<th>Leave Taken EL</th>
										<th>Leave Taken SL</th>
										<th>Leave Taken CL</th>
										<th>Balance EL</th>
										<th>Balance SL</th>
										<th>Balance CL</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($employees as $leave){ ?>

						                <tr class="gradeX">
						                  <td><?php echo $leave->employee_code ?></td>
						                  <td><?php echo $leave->employee_name; ?></td>
						                  <td><?php echo $leave->desig_name; ?></td>
										  <td><?php echo $leave->opening_el; ?></td>
										  <td><?php echo $leave->opening_sl; ?></td>
										  <td><?php echo $leave->opening_cl; ?></td>
										  <td><?php echo $leave->el; ?></td>
										  <td><?php echo $leave->sl; ?></td>
										  <td><?php echo $leave->cl; ?></td>
										  <td><?php echo $leave->b_el; ?></td>
										  <td><?php echo $leave->b_sl; ?></td>
										  <td><?php echo $leave->b_cl; ?></td>
						                  <td><a href="<?php echo base_url('leave_bal_update/edit/'.$leave->employee_id); ?>" class="btn btn-info">Edit</a><?php } ?></td>
									
						                </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </section>


    <script>
    $(document).ready(function() {
    $('#list-table').DataTable();
	} );
	</script>