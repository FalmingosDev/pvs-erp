<?PHP 
//print_r($list); exit;
?>
<section class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php  echo form_open( base_url( 'tid/tid_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) );  ?>
                <div class="row">
                    <div class="col-md-7">
                        <h1 style="text-align: center;">Client Payment Bank Transfer Details</h1>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Year :    </label>
                                <div class="col-sm-9">
                                    <?php 
                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'year');
                                        $selected = (set_value('year')) ? set_value('year') : '';
                                        echo form_dropdown('year', $payment_year, $selected, $attributes);
                                    ?>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month:    </label>
                                <div class="col-sm-9">
                                    <?php 
                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'month');
                                        $selected = (set_value('month')) ? set_value('month') : '';
                                        echo form_dropdown('month', $payment_month, $selected, $attributes);
                                    ?>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">TID:  </label>
                                <div class="col-sm-9">
                                    <?php 
                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'tid');
                                        $selected = (set_value('tid')) ? set_value('tid') : '';
                                        echo form_dropdown('tid', $tid, $selected, $attributes);
                                    ?>
                                </div>
                            </div>    
                        </div>    
                        <div class="col-md-1">                                             
                            <button type = "button" class="cr-a" style="padding: 6px 0px;" onclick="staff_search()">Search</button>
                        </div>
                        <div class="offset-md-1 col-md-1">
                            <button type = "submit" class="cr-a" style="padding: 6px 0px;" >Download</button>
                        </div> 
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tid-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>TID</th>
                                    <th>Unit Code</th>
                                    <th>Unit</th>
                                    <th>Location</th>
                                    <th>Employee Code</th>
                                    <th>Employee Name</th>
                                    <th>Employee Designation</th>
                                    <th>A/C No</th>
                                    <th>Reference No</th>
                                    <th>Bank Name</th>
                                    <th>Net Pay</th>
                                    <th>Pay Date</th>
                                    <th>Company Location</th>
                                    <!-- <th>Com Cash</th>
                                    <th>Com Bank</th>
                                    <th>Com Corpid</th>
                                    <th>Com Dbcr</th>
                                    <th>Com Narr</th>
                                    <th>Com Scat</th>
                                    <th>Com Regi</th> -->
                                </tr>
                            </thead>
                            <tbody id = "pay_list">
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(document).ready(function() {
        $('#tid-table').DataTable();
    } );
	$("#month").change(() => {
	        var month_id = $("#month").val();
			//alert(month_id);
	        populatid(month_id);
		})
		
	
	function populatid(month_id){
        //alert(month_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('tid/tidlist'); ?>',
			data: {month_id: month_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){            
				result +='<option value="">Select TID</option>';
				
				$.each(data.tidlist,function(key,value){
				//	alert (value.tid);
					result +='<option value="'+value.tid+'">'+value.tid+'</option>';
				});
			}
			else{
				result +='<option value="">No TID selected</option>';
			}
			$("#tid").html(result);		
		})
		
		.fail(function(data){
			// show the any errors
			console.log(data);
		});
	}
	
    function staff_search()
    {
        $('#tid-table').dataTable().fnDestroy();
		var result='';
		
        var year = $("#year").val();
		var month = $("#month").val();		
		var tid = $("#tid").val();
		//alert (month_id);
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('tid/search'); ?>',
			data: {month:month,year: year,tid:tid,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){  
			var count=0;
            var result = '';
				
				$.each(data.list,function(key,value){
                    //alert(value.tid);
					result +='<tr class="gradeX">';
					
					if(value.tid != null){
						// alert(value.month);
						count++;
					
						//alert(1);						
						result +='<td>'+value.tid+'</td>';
						result +='<td>'+value.client_code+'</td>';
						result +='<td>'+value.client_name+'</td>';
						result +='<td>'+value.branch_name+'</td>';
						result +='<td>'+value.employee_code+'</td>';
						result +='<td>'+value.employee_name+'</td>';
						result +='<td>'+value.employee_desig+'</td>';
						result +='<td>'+value.account_no+'</td>';
						result +='<td>'+value.reference_no+'</td>';
						result +='<td>'+value.bank_name+'</td>';
						result +='<td>'+value.net_pay+'</td>';
						result +='<td>'+value.payment_month+'-'+value.payment_year+'</td>';
						result +='<td></td>';
						
					} 
					result +='</tr>';
					
				});
			}
			else{
				result +='<option value="">No Client selected</option>';
			}
			$("#pay_list").html(result);
            $('#tid-table').DataTable();	
			
		})
		 
	}
	
</script>
