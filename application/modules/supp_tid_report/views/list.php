

<?PHP 
//print_r($list); exit;
?>
<section class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php  echo form_open( base_url( 'supp_tid_report/supp_tid_pdf' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) );  ?>
                <div class="row">
                    <div class="col-md-7">
                        <h1 style="text-align: center;">Supplimentary Payment Bank Transfer Statement</h1>
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
                            <button type = "button" class="cr-a" onclick="staff_search()">Search</button>
                        </div>
                        <div class="col-md-2" id="pdf_download">                                             
                            
                        </div>
                        
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tid-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>A/C No</th>
                                <th>Reference No</th>
                                <th>Bank Name</th>
                                <th>Net Pay</th>
                                <th>Employee Code & Employee Name</th>
                                <th>Unit Name & Location</th>
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
		var result='';
		
        var year = $("#year").val();
		var month = $("#month").val();		
		var tid = $("#tid").val();
		//alert (month_id);
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('supp_tid_report/search'); ?>',
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
            var pdf_result = '';
            
				
				$.each(data.list,function(key,value){
                    //alert(value.tid);
					result +='<tr class="gradeX">';
					
					if(value.tid != null){
						// alert(value.month);
						count++;
					
						//alert(1);						
						result +='<td>'+value.account_no+'</td>';
						result +='<td>'+value.reference_no+'</td>';
						result +='<td>'+value.bank_name+'</td>';
						result +='<td>'+value.net_pay+'</td>';
						result +='<td>'+value.employee+'</td>';
                        result +='<td>'+value.client+'</td>';
						
					} 
					result +='</tr>';
					
				});
                var loc = "supp_tid_report/supp_tid_pdf?year="+year+ "& month=" +month+ "& tid=" +tid;
                // alert(loc);
                if($("#tid").val() != ''){
                    pdf_result += '<div class="add-btn-div">'; 
                    pdf_result += '<a href="<?php echo base_url('supp_tid_report/supp_tid_pdf'); ?>?year='+year+'&month='+month+'&tid='+tid+'" class="cr-a" >PDF Download</a> ';
                    pdf_result += '</div>';
                    $("#pdf_download").html(pdf_result);
                }
                else{
                    alert("Please select TID");
                    $("#pdf_download").html('');
                }
                
			}
			else{
				result +='<option value="">No Client selected</option>';
			}
			$("#pay_list").html(result);
            	
			
		})
		 
	}
	
</script>


