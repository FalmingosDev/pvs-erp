<?PHP
//print_r($resource); exit;
//echo form_dropdown($resource); exit;
?>
<style type="text/css">
    
</style> 

<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                     
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row pb-2">
                                    <div class="col-md-10">
                                        <h1 class="text-center">Add New Declaration</h1> 
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('it_declaration'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
									<?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    
                                    <?php endif; ?>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php echo form_open( base_url( 'it_declaration/insertitdeclaration' ), array( 'id' => 'departmentform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                             
                                    <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Financial Year :</label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'financial_year_id', 'name' => 'financial_year_id');
                                                            $selected = (set_value('financial_year_id')) ? set_value('financial_year_id') : '';
                                                            echo form_dropdown('financial_year_id', $financial_year, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('financial_year_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee :</label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'employee_id', 'name' => 'employee_id');
                                                            $selected = (set_value('employee_id')) ? set_value('employee_id') : '';
                                                            echo form_dropdown('employee_id', $employee_id, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('employee_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>



                     <!-------------------------------- It deduction section Add------------------------------------------------------>
                                        <div class="row">
                                            <div class="col-md-3">
                                                 <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">It Deduction Section :</label>
                                                    <div class="col-sm-8">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'it_deduction_id','name' => 'it_deduction_id','onChange' => 'itdeclarationfirst()');
                                                            $selected = (set_value('it_deduction_id')) ? set_value('it_deduction_id') : '';
                                                            echo form_dropdown('it_deduction_id[]', $it_deduction_rule, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('it_deduction_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">It Deduction Rule Details :</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm" name="it_deduction_rule_dts[]" id="it_deduction_rule_dts" required>
                                                        </select>
                                                    </div>
                                                    <?php echo form_error('financial_year_id1', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Reference <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="reference[]" id="reference" placeholder="Reference" value="<?php echo set_value('event_name'); ?>" required="required"/>
                                                    </div>
                                                    <?php echo form_error('event_name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">Amount <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="amount[]" id="amount" placeholder="Amount" value="<?php echo set_value('amount'); ?>" required="required"/>
                                                    </div>
                                                    <?php echo form_error('amount', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>



                                        

                                        <div class="row">

                                            <div class="col-md-5"></div>
                                            <div class="col-md-5"></div>
                                             <div class="col-md-2" align="right">
                                                    <button type="button" class="cr-a"  id="add_app">Add</button>
                                             </div>  
                                        </div>
                                    <div id="resource_rows">  </div>
													
			<!--------------------------------End It deduction section Add------------------------------------------------------>			
									<div class="row">
										<div class="col-md-5">
                                        </div>
											<div class="col-md-2">                                             
											  <button type="submit" class="cr-a">Save</button>
										    </div>
											<div class="col-md-5"></div>
									</div>
                                </div>
                            </div>
                                </form>
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
  
    
    var resource = ''; 
    var deductiondetail = '';
   // print_r($data['resource']);exit;
    <?php foreach($resource as $resource) { ?>
    resource += '<option value="<?PHP echo $resource->it_deduction_id;?>"><?PHP echo $resource->section; ?></option>';
    <?php } ?>

    
    var cnt =0;
    var a = 0;
     $("#add_app").on('click', function () {
    
          cnt++;
           a++;

            var row_html ='';
row_html +='<div class="row" id="item_div_' + cnt + '">';


 row_html +='<div class="col-md-3">';
 row_html +='<div class="form-group row">';
 row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">It Deduction Section :</label>';
 row_html += '<div class="col-sm-8">';
 row_html +='<select class="form-control form-control-sm" id="it_deduction_id_add' + a + '" name="it_deduction_id[]" onchange="itdeclarationadd()" required>';
row_html +='<option>Select It Deduction Section</option>';
row_html += resource;                            

row_html +='</select>';
row_html +='<?php echo form_error('resource_id',
'<span class="help-inline">','</span>');';
row_html +='?>';
 row_html +='</div>';
    <?php echo form_error('it_deduction_id', '<span class="help-inline">', '</span>'); ?>
 row_html +='</div>';
 row_html +='</div>';


 row_html +='<div class="col-md-3">';
 row_html +='<div class="form-group row">';
 row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">It Deduction Rule Details :</label>';
 row_html +='<div class="col-sm-8">';

row_html +='<select class="form-control form-control-sm" id="it_deduction_rule_dts_dp' + a + '" name="it_deduction_rule_dts[]" required>';
//row_html +='<option>Select Resource</option>';
//row_html += deductiondetail;
row_html +='</select>';
row_html +='<?php echo form_error('resource_id',
'<span class="help-inline">','</span>');';
row_html +='?>';

 row_html +='</div>';
<?php echo form_error('financial_year_id', '<span class="help-inline">', '</span>'); ?>
 row_html +='</div>';
 row_html +='</div>';


 row_html +='<div class="col-md-3">';
 row_html +='<div class="form-group row">';
 row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Reference <span class="help-inline">*</span> : </label>';
 row_html +='<div class="col-sm-8">';
 row_html +='<input type="text" class="form-control form-control-sm" name="reference[]" id="event_name_' + cnt + '" placeholder="Reference" required="required" />';
  row_html +='</div>';
 <?php echo form_error('event_name', '<span class="help-inline">', '</span>'); ?>
 row_html +='</div>';
 row_html +='</div>';




 row_html +='<div class="col-md-3">';
 row_html +='<div class="form-group row">';
 row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">Amount <span class="help-inline">*</span> : </label>';
 row_html +='<div class="col-sm-8">';
 row_html +='<input type="text" class="form-control form-control-sm" name="amount[]" id="event_name_' + cnt + '" placeholder="Amount" required="required" />';
 row_html +='</div>';
 <?php echo form_error('amount', '<span class="help-inline">', '</span>'); ?>
 row_html +='</div>';


row_html += '<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delChild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
row_html +='</div>';

$("#resource_rows").append(row_html);


$("#tab_body").html(row_html);
cnt++;
 row_html +='</div>';
 });

    function delChild(psa)
        {
           // alert(pa);
            $("#item_div_"+psa).remove();
        }



 function itdeclarationfirst(){
         var it_deduction_rule_dts = $('#it_deduction_id').val();
          //alert(employee);
        $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('it_declaration/add_itdeclaration'); ?>',
        data: {it_deduction_rule_dts: it_deduction_rule_dts,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    .done(function(data){       
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        //alert(data.status);
        if(data.status){  
        var result ='';     
            result +='<option value="">Select Declaration Details</option>';
                //alert(data.employee);
            $.each(data.emp_list,function(key,value){
                //alert(value.employee_id);
                result +='<option value="'+value.it_deduction_detail_id+'">'+value.sub_head_name+'</option>';
            });
        }
        else{
            result +='<option value="">No Employee selected</option>';
        }
        $("#it_deduction_rule_dts").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
    }

    


        var k = 0;
    function itdeclarationadd(){
    	//alert(1);
        k++;

        var it_deduction_rule_dts_dp = $('#it_deduction_id_add'+k).val();
          //alert(employee);
        $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('it_declaration/add_itdeclaration_id'); ?>',
        data: {it_deduction_rule_dts_dp: it_deduction_rule_dts_dp,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    .done(function(data){       
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        //alert(data.status);
        if(data.status){  
        var result ='';     
            result +='<option value="">Select Declaration Details</option>';
                //alert(data.employee);
            $.each(data.emp_list,function(key,value){
                //alert(value.employee_id);
                result +='<option value="'+value.it_deduction_detail_id+'">'+value.sub_head_name+'</option>';
            });
        }
        else{
            result +='<option value="">No Select Declaration Details selected</option>';
        }
        $("#it_deduction_rule_dts_dp"+k).html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
    

}

    </script>