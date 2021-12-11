<?PHP
	//print_r($emp); exit;
?>

<section class="main-wrapper">
          <div class="container" id="location_div">
            <div class="row">
                <div class="col-md-12">   
				<?php echo employeeTabs(); ?>				
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
						  <div class="row">
						  
							<div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Employee Code : </label>
                                    </div> 
                                    <div class="col-md-7">
                                        
                                    <tr class="gradeX">
                                        <p><?PHP echo $emp->employee_code; ?><p>
									
                                    </div>
                                </div>
                              </div>
							  <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Employee Name : </label>
                                    </div> 
                                    <div class="col-md-7">
                                        <p><?PHP echo $emp->empname; ?><p>
                                    </div>
                                </div>
                              </div>
							  
							 
						  </div>
							
							<div class="widget-content nopadding">
							
								<?php echo form_open('', array('id' => 'uplode_doc', 'name' => 'uplode_doc'));?>
								<div class="heading">
								<input type="hidden" name="employee_id" value="<?php echo $emp->employee_id; ?>">
								<div class="row">
									<div class="col-md-10">
										<h2 style="padding-top: 14px;">Document</h2>
									</div>
									<div class="col-md-1">
										<button type="button" class="cr-a" id="add_loc" >Add</button>
									</div>
									</div>
								</div>
                                      

								
							<div id="location_rows">  
								

							</div>
							
                       
                                <div class="form-actions">
                                    <button type="submit" id = "location_submit" class="btn btn-success">Upload</button>
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
          </div>        
</section>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Uploaded Document</h1>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Document Type</th>
                                        <th>Document Number</th>
                                        <th>Download</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id ="doc_type_list">
								<?PHP
									foreach($emplist as $emplist){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $emplist->doc_name; ?></td>
                                        <td><?PHP echo $emplist->document_no; ?></td>
                                        
										<td><a href="<?php echo base_url('uploads/employee/'.$emplist->doc_file); ?>" class="btn btn-danger" target="_blank">Download</a></td>
										
                                        
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
       var employee_id = '<?PHP echo $emp->employee_id ?>';
        addnewloc();
		uplode_doc_list(employee_id);
        
    });
	
	
var branch_dd = ''; 
<?php foreach($doc as $doc) { ?>
branch_dd += '<option value="<?PHP echo $doc->emp_doc_type_id;?>"><?PHP echo $doc->doc_name; ?></option>';
<?php } ?>
function addnewloc(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              row_html += '<div class="row">';
                                
						   row_html += '<div class="col-md-3">';
                                                row_html += '<div class="form-group row">';
                                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Type</label>';
                                                    row_html += '<div class="col-sm-9">';
                                                        row_html += '<select id="doc_id" name="doc_id[]" class="form-control form-control-sm" required>';
                                                        	row_html += '<option value="">Select Document</option>';
															row_html += branch_dd;
															
                                                        row_html += '</select>';
                                                    row_html += '</div>';
                                                  row_html += '</div>';
                            row_html += '</div>';
							row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Number</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm" name="doc_name[]" id="doc_name_1" placeholder="Document Number" required/>';
                                       row_html += '</div>';
                                   row_html += '</div>';

                               row_html += '</div>';
							row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm p-0">Doc Exp Date</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="date" class="form-control form-control-sm" name="doc_expiry[]" id="doc_expiry_1" placeholder="Doc Exp Date" />';
                                       row_html += '</div>';
                                   row_html += '</div>';

                            row_html += '</div>';
							   
							row_html +='<div class="col-md-2">';
                                 row_html += '<div class="form-group row">';
											row_html +='<div class="col-md-12 pr-0">';
												row_html +='<input type="hidden" class="form-control form-control-sm" name="file_count[]" value="0"><input type="file" class="form-control form-control-sm"  name="fileuplode_0" id="fileuplode0"required>';
											row_html +='</div>';
									row_html +='</div>';
                           row_html += '</div> ';
							
				row_html += '</div>';
        $("#location_rows").html(row_html);
    }
	
var count =0;
 $("#add_loc").on('click', function () {
	 //alert('ss');
	
          count++;
		  //i++;
		  
           var row_html ='';
		   row_html +='<div class="add_more_loc" id="add_more_loc'+count+'" >';
              row_html += '<div class="row">';
                               
						   row_html += '<div class="col-md-3">';
                                                row_html += '<div class="form-group row">';
                                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Type</label>';
                                                    row_html += '<div class="col-sm-9">';
                                                        row_html += '<select id="doc_id" name="doc_id[]" class="form-control form-control-sm" required>';
                                                        	row_html += '<option value="" >Select Document</option>';
															
															row_html += branch_dd;
															 
                                                        row_html += '</select>';
                                                    row_html += '</div>';
                                                  row_html += '</div>';
                            row_html += '</div>';
							row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Number</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm" name="doc_name[]" id="doc_name_'+count+'" placeholder="Document Number"  required/>';
                                       row_html += '</div>';
                                   row_html += '</div>';
                                row_html += '</div>';
								   
							row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm p-0">Doc Exp Date2</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="date" class="form-control form-control-sm" name="doc_expiry[]" id="doc_expiry_'+count+'" placeholder="Doc Exp Date" />';  
                                       row_html += '</div>';
                                   row_html += '</div>';

                            row_html += '</div>'; 
							row_html +='<div class="col-md-2">';
                                 row_html += '<div class="form-group row">';
											row_html +='<div class="col-md-12 pr-0">';
												row_html +='<input type="hidden" class="form-control form-control-sm" name="file_count[]" value="'+count+'"><input type="file" class="form-control form-control-sm" name="fileuplode_'+count+'" id="fileuplode'+count+'" required>';
											row_html +='</div>';
									row_html +=	'</div>';
									row_html +='</div>';
							
                                    row_html +=' <div class="col-md-1 text-center">';
									row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+count+'" onclick="delchild('+count+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
									
									
                           row_html += '</div>';
				row_html += '</div>';
			row_html += '</div>';

            $("#location_rows").append(row_html)


			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_loc').remove();
					});
        });
		
		function delchild(psa)
        {
           // alert(pa);
            $("#add_more_loc"+psa).remove();
        }
		



$("#uplode_doc").submit(function(event){
	event.preventDefault();
	$("#location_submit").prop('disabled', true);
var employee_id = '<?PHP echo $emp->employee_id ?>';
//alert(employee_id);
//alert(new FormData(this));

 
		$.ajax({
		type: 'POST',		// data goto the server through POST method 
		url: '<?php echo base_url('employee_documents/upload'); ?>',
		data : new FormData(this),
		dataType: 'json',	// what type of data formate we will wante from the server
		contentType : false,
		processData	: false
	})
	
	.done(function(data){ 
		//alert(data.status);
		if(data.status){
			var msg = 'Data inserted sucssfully!';
			alert(msg);
			location.reload();
			//window.location.href = "<?php echo base_url('employee_documents/upload/'); ?>;"
		}
		
		else{
		var msg = 'Data inserted Not sucssfully!';
		alert(msg);
		}
		})
	
})


</script>