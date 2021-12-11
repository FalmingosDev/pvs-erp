<?PHP 
//print_r($list); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                    <div class="row mb-3">  
                        <div class="col-md-7">
                            <h1 style="text-align: left;">Process Supp Client Payment</h1>
                        </div>
                        
                    </div>
                    <?php if($this->session->flashdata('msg')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php echo form_open( base_url( 'supp_payroll' ), array( 'id' => 'supp_payroll_process', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year :    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'month');
                                            $selected = (set_value('month')) ? set_value('month') : '';
                                            echo form_dropdown('month', $month, $selected, $attributes);
                                        ?>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Client Name :    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'client_id','onChange' => 'populatebranch()');
                                            $selected = (set_value('client_id')) ? set_value('client_id') : '';
                                            echo form_dropdown('client_id', $client, $selected, $attributes);
                                        ?>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-3">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Branch Name :    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="branch_id" name="branch_id">
                                                            
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-1">
                            <button type="button" id= "submit_search" class="cr-a" style="padding: 6px 0px;">Search</button>
                        </div>  
                    </div> 
                    <div class="row" id="payroll_div" style="display: none;">
                    	<div class="col-md-5"></div>
                    	<div class="col-md-2">
                    		<button class="cr-a" type="submit">Process for Payroll</button>
                    	</div>
                    	<div class="col-md-5"></div>
                    </div>
                </form>
                    <div class="wrapper-box">
                        <table id="client-table" class="table table-striped table-bordered" style="width:100%">  
                            <thead>
									<tr>
                                        <th>Client</th>
                                        <th>Employee Code & Name</th>
                                        <th>Branch Name</th>
                                        <th>Designation</th>
                                        <th>Month & Year</th>
                                        <th>Duty</th>
                                        <th>W/O</th>
                                        <th>Leave</th>
                                        <th>Ph</th>
                                        <th>Ot Hrs</th>
                                    </tr>
                                </thead>
                                <tbody id="client_attendance_list">
								    <?php //foreach($client_attendance as $att) { ?>

                                       <!--  <tr>
                                            <td><?php //echo $att->client_name; ?></td>
                                            <td><?php //echo $att->employee_name; ?></td>
                                            <td><?php //echo $att->branch_name; ?></td>
                                            <td><?php //echo $att->desig_name; ?></td>
                                            <td><?php //echo $att->MonthYear; ?></td>
                                            <td><?php //echo $att->duty; ?></td>
                                            <td><?php //echo $att->wo; ?></td>
                                            <td><?php //echo $att->leave; ?></td>
                                            <td><?php //echo $att->ph; ?></td>
                                            <td><?php //echo $att->ot; ?></td>
                                                                                       
                                        </tr> -->


                                    <?php //} ?>
                                </tbody>
                            </table>
                        </div>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </section>

<script>
    $(document).ready(function() {
        //$('#client-table').DataTable();
        $('#client-table').hide();
    } );

        function populatebranch(){

        let client_id = $("#client_id").val();
        //alert(client_id);
        var result='';
        
        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('supp_payroll/branch_list'); ?>',
            data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){
            $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                result +='<option value="">Select Branch</option>';

                $.each(data.branch_list,function(key,value){
                    //value(value.city_name);
                    result +='<option value="'+value.branch_id+'">'+value.branch_name+'</option>';
                });
            }
            else{
                result +='<option value="">No Branch selected</option>';
            }
            $("#branch_id").html(result);
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }

    $("#submit_search").click(function(event){

    	//event.preventDefault();
    	var month = $('#month').val();
    	var client_id = $('#client_id').val();
        var branch_id = $('#branch_id').val();
    	//alert(branch_id);

        if(month != '' && client_id != '' && branch_id != ''){
        
        $('#client-table').show();
    	$.ajax({
         type:'POST',
         url: '<?php echo base_url('supp_payroll/search_list'); ?>',
		 data: {<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(), month:month, client_id:client_id, branch_id:branch_id},
         dataType:'json',
         encode:true,

         success: function(data) {
			var html = '';
            var i;
            var c = 0;
			if(data.status){
			 	$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			 	$.each(data.attendance_list,function(key,value){c++;
					html += '<tr>';
					html += '<td>'+value.client_name+'</td>';
                    html += '<td>'+value.employee_name+'</td>';
					html += '<td>'+value.branch_name+'</td>';
					html += '<td>'+value.desig_name+'</td>';
					html += '<td>'+value.MonthYear+'</td>';
					html += '<td>'+value.duty+'</td>';
					html += '<td>'+value.wo+'</td>';
					html += '<td>'+value.leave+'</td>';
					html += '<td>'+value.ph+'</td>';
					html += '<td>'+value.ot+'</td>';					
					html += '</tr>';
			 	})
			}
			else{
				html += '<tr>';
				html += '<td colspan="8">No data Found</td>';
				html += '</tr>';
			}
			$("#client-table").dataTable().fnDestroy();
			$("#client_attendance_list").html(html);
			$("#client-table").DataTable();
            if (month != '' && client_id != '' && c > 0)
            {
                $("#payroll_div").show();
            }
            else
            {
                $("#payroll_div").hide();
            }
        }
})   
}
    else{
        alert(" All fields are mandatory");
    }

    });


</script>
