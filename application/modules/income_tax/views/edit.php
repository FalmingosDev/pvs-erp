<?PHP

?>
<style type="text/css">
    .wrapper-box {
    padding: 10px 15px;
    border: 1px solid #c0c0c0;
    width: 72%;
    display: block;
    margin: 0 auto;
}
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
                                    <div class="col-md-7">
                                        <h1>Edit Income Tax</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('income_tax'); ?>" class="ad-btn-a-tag">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php foreach($income_tax_view as $income_tax){ ?>
							    <?php echo form_open( '', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                                <!-- <?php echo form_open( ' ', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?> -->
								<div class="wrapper-box">
                                <form>
								<input type="hidden" name="income_tax_id" value="<?php echo $income_tax->income_tax_id; ?>">								
								 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Financial Year :</label>
                                                    <div class="col-sm-9">
														<?php 
															 $attributes = array('class' => 'form-control form-control-sm', 'id' => 'financial_year_id');
                                                            $selected = (set_value('financial_year_id')) ? set_value('financial_year_id') : $income_tax->financial_year_id;
															echo form_dropdown('financial_year_id', $financial_year, $selected, $attributes);
														?>
													</div>
													<?php echo form_error('financial_year_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                </div>
								
								
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <label class="cont-radio-location"><input type="radio" name="citizen_type" value="I" <?php echo set_checkbox('citizen_type', 'I'); ?>>Individual</label>
                                                        <label class="cont-radio-location"><input type="radio" name="citizen_type" value="S" <?php echo set_checkbox('citizen_type', 'S'); ?>>Senior Citizen</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary From :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_from" id="salary_from" placeholder="Salary From" value="<?php echo $income_tax->salary_from; ?>">
														<?php echo form_error('salary_from', '<span class="help-inline">', '</span>'); ?>
													</div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary To :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_to" id="salary_to" placeholder="Salary To" value="<?php echo $income_tax->salary_to; ?>">
														<?php echo form_error('salary_to', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div> 
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tax Percentage :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="tax_percentage" id="tax_percentage" placeholder="Tax Percentage" value="<?php echo $income_tax->tax_percentage; ?>">
														<?php echo form_error('tax_percentage', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div> 								
                                <div class="row">
											<div class="col-md-5"></div>
												<div class="col-md-2">                                             
												  <button type="submit" class="cr-a">Save</button>
												 </div>
											<div class="col-md-5"></div>
								</div>
                            </form>
							<?php } ?>
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

      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Edited Income Tax</h1>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                        <th>Financial Year</th>
                                        <th>Salary From</th>
                                        <th>Salary To</th>
                                        <th>Citizen Type</th>
                                        <th>Tax Percentage </th>
                                    </tr>
                                </thead>
                                <tbody id ="income_tax_list">
								<?PHP
									foreach($income_tax_view as $income_tax_view){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $income_tax_view->fy_name; ?></td>
                                        <td><?PHP echo $income_tax_view->salary_from; ?></td>
                                        <td><?PHP echo $income_tax_view->salary_to; ?></td>
                                        <td><?PHP echo $income_tax_view->citizen_type; ?></td>
                                        <td><?PHP echo $income_tax_view->tax_percentage; ?></td>
                                        
										<!-- <td><a href="<?php echo base_url('income_tax/edit/'); ?>" class="ad-btn-a-tag">Back</a></td> -->
                                        <td><a href="<?php echo base_url('income_tax/edit/'); ?>"> </a></td>
										
                                        
                                    </tr>
									
									<?PHP 									
									}																		
									?> 
                                    
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
          </div>
</section>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
     <!--Include all compiled plugins (below), or include individual files as needed
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<script>

$(document).ready(function(){
    	$('.datepicker').datepicker();
       var income_tax_id = '<?PHP echo $income_tax->income_tax_id ?>';
        addnewloc();
		uplode_doc_list(income_tax_id);
        
    });
	
	
// var branch_dd = ''; 
// <?php foreach($financial_year as $financial_year) { ?>
// branch_dd += '<option value="<?PHP echo $financial_year->financial_year_id;?>"><?PHP echo $financial_year->fy_name; ?></option>';
// <?php } ?>
// function addnewloc(){
// 		//alert('kk');
//         var row_html ='';
// 		row_html +='<div class="" id="" ></div>';
//               row_html += '<div class="row">';
                                
// 						   row_html += '<div class="col-md-3">';
//                                                 row_html += '<div class="form-group row">';
//                                                     row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Type</label>';
//                                                     row_html += '<div class="col-sm-9">';
//                                                         row_html += '<select id="doc_id" name="doc_id[]" class="form-control form-control-sm" required>';
//                                                         	row_html += '<option value="">Select Document</option>';
// 															row_html += branch_dd;
															
//                                                         row_html += '</select>';
//                                                     row_html += '</div>';
//                                                   row_html += '</div>';
//                             row_html += '</div>';
// 							row_html +='<div class="col-md-3">';
//                                   row_html +=  '<div class="form-group row">';
//                                     row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Number</label>';
//                                        row_html += '<div class="col-sm-9">';
//                                            row_html += '<input type="text" class="form-control form-control-sm" name="doc_name[]" id="doc_name_1" placeholder="Document Number" required/>';
//                                        row_html += '</div>';
//                                    row_html += '</div>';

//                                row_html += '</div>'; 
// 							row_html +='<div class="col-md-2">';
//                                  row_html += '<div class="form-group row">';
// 										row_html +='<div class="row">';
// 											row_html +='<div class="col-sm-8">';
// 												row_html +='<input type="hidden" name="file_count[]" value="0"><input type="file" name="fileuplode_0" id="fileuplode0"required>';
// 											row_html +='</div>';
// 									row_html +=	'</div>';
// 									row_html +='</div>';
//                            row_html += '</div> ';
							
// 				row_html += '</div>';
//         $("#location_rows").html(row_html);
//     }
	
// var count =0;
//  $("#add_loc").on('click', function () {
// 	 //alert('ss');
	
//           count++;
// 		  //i++;
		  
//            var row_html ='';
// 		   row_html +='<div class="add_more_loc" id="add_more_loc'+count+'" >';
//               row_html += '<div class="row">';
                               
// 						   row_html += '<div class="col-md-3">';
//                                                 row_html += '<div class="form-group row">';
//                                                     row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Type</label>';
//                                                     row_html += '<div class="col-sm-9">';
//                                                         row_html += '<select id="doc_id" name="doc_id[]" class="form-control form-control-sm" required>';
//                                                         	row_html += '<option value="" >Select Document</option>';
															
// 															row_html += branch_dd;
															 
//                                                         row_html += '</select>';
//                                                     row_html += '</div>';
//                                                   row_html += '</div>';
//                             row_html += '</div>';
// 							row_html +='<div class="col-md-3">';
//                                   row_html +=  '<div class="form-group row">';
//                                     row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Number</label>';
//                                        row_html += '<div class="col-sm-9">';
//                                            row_html += '<input type="text" class="form-control form-control-sm" name="doc_name[]" id="doc_name_'+count+'" placeholder="Document Number"  required/>';
//                                        row_html += '</div>';
//                                    row_html += '</div>';

//                                row_html += '</div>';
// 							row_html +='<div class="col-md-2">';
//                                  row_html += '<div class="form-group row">';
// 										row_html +='<div class="row">';
// 											row_html +='<div class="col-sm-8">';
// 												row_html +='<input type="hidden" name="file_count[]" value="'+count+'"><input type="file" name="fileuplode_'+count+'" id="fileuplode'+count+'" required>';
// 											row_html +='</div>';
// 									row_html +=	'</div>';
// 									row_html +='</div>';
//                            row_html += '</div> ';
							
//                                     row_html +=' <div class="col-md-2 text-center">';
// 									row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+count+'" onclick="delchild('+count+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
									
									
//                            row_html += '</div>';
// 				row_html += '</div>';
// 			row_html += '</div>';

//             $("#location_rows").append(row_html)


		// 	 $('.del_div').on('click',function()
		// 			{
		// 		//alert(abc);
		// 				$(this).parents('.add_more_loc').remove();
		// 			});
        // });
		
		// function delchild(psa)
        // {
        //    // alert(pa);
        //     $("#add_more_loc"+psa).remove();
        // }
		



$("#uplode_doc").submit(function(event){
	event.preventDefault();
	$("#location_submit").prop('disabled', true);
var income_tax_id = '<?PHP echo $income_tax->income_tax_id ?>';
//alert(employee_id);
//alert(new FormData(this));

 
		$.ajax({
		type: 'POST',		// data goto the server through POST method 
		url: '<?php echo base_url('income_tax/edit/'); ?>',
		data : new FormData(this),
		dataType: 'json',	// what type of data formate we will wante from the server
		contentType : false,
		processData	: false
	})
	
	.done(function(data){ 
		//alert(data.status);
		if(data.status){
			var msg = 'Data Edited Sucssfully!';
			alert(msg);
			location.reload();
			//window.location.href = "<?php echo base_url('income_tax/edit/'); ?>;"
		}
		
		else{
		var msg = 'Data edit Not sucssfully!';
		alert(msg);
		}
		})
	
})


</script>

	  
