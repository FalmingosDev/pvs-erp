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
                                        <h1 class="text-center">Add New Holiday</h1> 
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('holiday'); ?>" class="cr-a">Back</a>  
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
							<?php echo form_open( base_url( 'holiday/add' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Year <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="year" name="year" placeholder="Select Year" required="required">
														<option value="">Select Year</option>
                                                        <?php 
                                                            $year = (date('Y') + 1);
                                                            for($y = 2021; $y <= $year; $y++){ 
                                                        ?>
                                                            <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                                        <?php } ?>
                                                        </select>
								<?php echo form_error('year', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
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

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">State :</label>
                                                <div class="col-sm-9" onchange="details_list()" required>
                                                <?php 
												    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
												    $selected = (set_value('state_id')) ? set_value('state_id') : '';
													echo form_dropdown('state_id', $state, $selected, $attributes);
												    ?>
                                                </div>
												<?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                        </div>

                                    <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Event Date <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="event_date[]" id="event_date_0" class="form-control form-control-sm" required="required">
														<?php echo form_error('event_date', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Event Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="event_name[]" id="event_name_0" placeholder="Event name" value="<?php echo set_value('event_name'); ?>" required="required"/>
                                                    </div>
													<?php echo form_error('event_name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
										 <div class="col-md-2" align="right">
                                                <button type="button" class="cr-a" onclick="addMore();">Add</button>
                                         </div>
                                        </div>
                                    <div id="resource_rows">  </div>
													
													
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
							<div class="row">
                                    <div class="col-md-12">
                                        <table id="advance-entry-tb" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                   <th>Year</th>
													<th>State</th>
													<th>Event Date</th>
													<th>Event Name</th>
                                                </tr>
                                            </thead>
                                            <tbody id="holiday_details">
											
                                              
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
      var cnt = 1;
      function addMore(){
		// alert('kk');
        var row_html ='';
			row_html +='<div class="row" id="item_div_' + cnt + '">';
				row_html +='<div class="col-md-5">';
					row_html +='<div class="form-group row">';
					
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Event Date : </label>';
						row_html +='<div class="col-sm-8">';
						
							row_html +='<input type="date" name="event_date[]" id="event_date_' + cnt + '" class="form-control form-control-sm" required="required">';
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
				row_html +='<div class="col-md-5">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Event Name: </label>';
						row_html +='<div class="col-sm-8" > ';
						row_html +='<input type="text" class="form-control form-control-sm" name="event_name[]" id="event_name_' + cnt + '" placeholder="Event name" required="required" />';
						row_html +='</div>';
						/*row_html +='<div class="col-sm-2" align="right">';
						row_html +='<button type="button" class="cr-a" id="add_app1">Add</button>';
						row_html +='</div>';*/
						
					  row_html +='</div>';
				row_html +='</div>';
                row_html +='<div class="col-md-2">';
					row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delChild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
				row_html +='</div>';
		row_html += '</div>';
        $("#resource_rows").append(row_html);
        cnt++;
    }

    function delChild(psa)
        {
           // alert(pa);
            $("#item_div_"+psa).remove();
        }
	
		
		
function details_list()
{
	
var state_id  = $("#state_id").val();
var year  = $("#year").val();
//alert(year); 
 $.ajax({
type: 'POST',   
url: '<?php echo base_url('holiday/holiday_list'); ?>',
data: {state_id: state_id,year: year, <?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
dataType: 'json',
encode: true,
})

.done(function(data){
$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
//alert(data.status);
if(data.status){
	var list_html ='';
	
	$.each(data.list,function(key,value){	
		list_html +='<tr>';
			list_html +='<td>' + value.year + '</td>';
			list_html +='<td>' + value.state_name + '</td>';
			list_html +='<td>' + value.event_date + '</td>';
			list_html +='<td>' + value.event_name + '</td>';
		list_html +='</tr>';
	});
	$("#holiday_details").html(list_html);
}

})


}
    </script>