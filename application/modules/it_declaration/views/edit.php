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
                                        <h1 class="text-center">Edit Declaration</h1> 
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
                            <?php echo form_open( base_url( 'it_declaration/edit_it_declaration' ), array( 'id' => 'departmentform', 'class' => 'form-horizontal' ) ); ?>
                                <div class="wrapper-box">
                             
                                    <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Financial Year :</label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'financial_year_id', 'name' => 'financial_year_id');
                                                            $selected = (set_value('financial_year_id')) ? set_value('financial_year_id') : $it_declaration->financial_year_id;
                                                            echo form_dropdown('financial_year_id', $financial_year_edit, $selected, $attributes);
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

                                          
                                          <input type="hidden" name="edit_id" value="<?php echo $edit_declaration_data->employee_it_declaration_id; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee :</label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'employee_id', 'name' => 'employee_id');
                                                            $selected = (set_value('employee_id')) ? set_value('employee_id') : $it_declaration->employee_id;
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
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'it_deduction_id','onChange' => 'itdeclarationfirst()','name' => 'it_deduction_id_add');
                                                            $selected = (set_value('it_deduction_id')) ? set_value('it_deduction_id') :  $it_declaration->it_deduction_id;
                                                            echo form_dropdown('it_deduction_id', $it_deduction_id, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('it_deduction_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">It Deduction Rule Details :</label>
                                                    <div class="col-sm-8">
                                                        <!-- <select class="form-control form-control-sm" name="it_deduction_rule" id="it_deduction_rule" required> -->

                                                        	<?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'it_deduction_rule','name' => 'it_deduction_rule');
                                                            $selected = (set_value('it_deduction_rule')) ? set_value('it_deduction_rule') :  $it_declaration->it_deduction_detail_id;
                                                            echo form_dropdown('it_deduction_rule', $it_deduction_detail_id, $selected, $attributes);
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <?php echo form_error('financial_year_id1', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                         
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Reference <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="reference" id="reference" placeholder="Reference" value="<?php  echo  $edit_declaration_data->reference;  ?>" required="required"/>
                                                    </div>
                                                    <?php echo form_error('event_name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">Amount <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="amount" id="amount" placeholder="Amount" value="<?php  echo  $edit_declaration_data->amount;  ?>" required="required"/>
                                                    </div>
                                                    <?php echo form_error('amount', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
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
      	function itdeclarationfirst(){
         var it_deduction_rule = $('#it_deduction_id').val();
          //alert(employee);
        $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('it_declaration/edit_itdeclaration'); ?>',
        data: {it_deduction_rule: it_deduction_rule,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
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
        $("#it_deduction_rule").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
    }
      	
      </script>