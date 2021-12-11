<?PHP 
//print_r($list); exit;
?>
<section class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php  echo form_open( base_url( 'client_tid_report/tid_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) );  ?>
                <div class="row">
                    <div class="col-md-7">
                        <h1 style="text-align: center;">Client TID Report</h1>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-1"></div>
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
                        <div class="col-md-1"></div>
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
                                    <th>S.No</th>
                                    <th>TID</th>
                                    <th>Client Code</th>
                                    <th>Client Name</th>
                                    <th>Branch Code</th>
                                    <th>Branch Name</th>
                                    
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

    function staff_search()
    {
        $('#tid-table').dataTable().fnDestroy();
		var result='';
		
        var year = $("#year").val();
		var month = $("#month").val();
        //alert(year);		
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('client_tid_report/search'); ?>',
			data: {month:month,year: year,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
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
            var si=0;

				
				$.each(data.list,function(key,value){
                    // var si=0;
                    //alert(value.tid);
					result +='<tr class="gradeX">';
					
					if(value.tid != null){
						// alert(value.month);
						count++;
                        si++;
					
						// alert(si);
      //                   count=count+1;
                        result +='<td>'+si+'</td>';						
						result +='<td>'+value.tid+'</td>';
						result +='<td>'+value.client_code+'</td>';
						result +='<td>'+value.client_name+'</td>';
						result +='<td>'+value.branch_code+'</td>';
						result +='<td>'+value.branch_name+'</td>';
						
						//result +='<td>'+value.payment_month+'-'+value.payment_year+'</td>';
					
						
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
