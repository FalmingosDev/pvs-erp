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
                            <h1>Staff Salary List</h1>
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
										<th>DOB</th>
										<th>DOJ</th>
										<th>Designation</th>
										<th>Branch</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach($employees as $doc){ ?>

						                <tr class="gradeX">
						                  <td><?php echo $doc->employee_code ?></td>
						                  <td><?php echo $doc->employee_name; ?></td>
						                  <td><?php echo date("d/m/Y", strtotime($doc->dob)); ?></td>
						                  <td><?php echo date("d/m/Y", strtotime($doc->doj)); ?></td>
						                  <td><?php echo $doc->desig_name; ?></td>
						                  <td><?php echo $doc->branch_name; ?></td>
						                  <td><a href="<?php echo base_url('salary_structure/add/'.$doc->employee_id); ?>" class="btn btn-primary">View/Add</a>&nbsp;<?php if($doc->salary_structure_id != ''){ ?><a href="<?php echo base_url('salary_structure/edit/'.$doc->salary_structure_id.'/'.$doc->employee_id); ?>" class="btn btn-info">View/Edit</a><?php } ?></td>
						                </tr>

						              <?php  } ?>
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