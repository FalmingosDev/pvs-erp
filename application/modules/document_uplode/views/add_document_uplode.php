<?PHP
	//print_r($bank); exit;
?>

<?php $today = date('d-m-Y'); ?>
<!--<link href="js/datepicker.min.css" rel="stylesheet">
<link href="js/bootstrap.css" rel="stylesheet">-->

<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <?php echo clientTabs(); ?>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
							<h1>Document Upload</h1>
							<div class="widget-content nopadding">
							
								<?php echo form_open('', array('id' => 'file_doc', 'name' => 'file_doc'));?>
								<!--<div class="heading">
                                    <h2 style="padding-top: 14px;">DOCUMENT</h2>  
                                </div>-->
								<div class="row" style="border-bottom: 2px solid #1a2f6d;margin-bottom: 13px;">
								<input type="hidden" name="client_id" value="<?php echo $client->client_id; ?>">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name</label>
                                                    <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" name="client_name_d" value="<?php echo $client->client_name; ?>" readonly />
                                            <?php echo form_error('client_name_d', '<span class="help-inline">', '</span>'); ?>
													</div>
												</div>

												</div>
								</div>
								<div class="heading">
								<div class="row">
									<div class="col-md-11">
										<h2 style="padding-top: 14px;">Master Agreement</h2>
									</div>
									
									<div class="col-md-1">
										<button type="button" class="cr-a" id="add_doc" >Add</button>
									</div>
									
									<div class="col-md-5">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Agreement Period </label>
                                                    <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-sm" name="client_name_d" value="<?PHP echo date("d/m/Y", strtotime($client->agreement_start_date)); ?> - <?PHP echo date("d/m/Y", strtotime($client->agreement_end_date)); ?>" readonly />
                                            
													</div>
												</div>
 
									</div>
								</div>
								</div>
                                      
                              <!--  </div> -->
								
							<div id="docuplode_rows">  
								

							</div>
							
                       
                                <div class="row" style="border-bottom: 2px solid #1a2f6d;margin-bottom: 13px;">
                                    <div class="offset-md-5 col-md-1">
                                        <button type="submit" class="cr-a" style="margin-bottom: 10px;">Upload</button>
                                    </div>
                                    <div class="col-md-11"></div>  
                                </div> 
                            </form>
                       
                        </div>
                            </div>
                        </div>
                      </div>
                      <div class="container" id="location_div">
                        <div class="row" style="border-bottom: 2px solid #1a2f6d;margin-bottom: 13px;">
                            <div class="col-md-12">                    
                                  <div class="">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="widget-content nopadding">
                                            <?php echo form_open('', array('id' => 'location_doc', 'name' => 'location_doc'));?>
                                            <div class="heading">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h2 style="padding-top: 14px;">Location Wise Agreement</h2>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="cr-a" id="add_loc" >Add</button>
                                                </div>
                                                </div>
                                            </div>

                                          <!--  </div> -->

                                        <div id="location_rows">  


                                        </div>


                                            <div class="row">
                                                <div class="offset-md-5 col-md-1">
                                                    <button type="submit" id = "location_submit" class="cr-a" style="margin-bottom: 10px;">Upload</button>
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
                        <div class="container">
                        <div class="row" style="border-bottom: 2px solid #1a2f6d;margin-bottom: 13px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="text-center">Document Upload List For Master Agreement</h1>
                                    </div>
                                </div>
                                <div class="wrapper-box">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Document Type</th>
                                                    <th>Upload Date</th>
                                                    <th>Remarks</th>
                                                    <th>Download</th>

                                                </tr>
                                            </thead>
                                            <tbody id ="doc_type_list">
                                            <?PHP
                                                foreach($list as $doc){								
                                            ?>
                                                <tr class="gradeX">
                                                    <td><?PHP echo $doc->document_type; ?></td>
                                                    <td><?PHP echo date("d/m/Y", strtotime($doc->period)); ?></td>
                                                    <td><?PHP echo $doc->remarks; ?></td>
                                                    <td><a href="<?php echo base_url('uploads/'.$doc->uplode_file); ?>" class="btn btn-danger" target="_blank">Download</a></td>


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
                    <div class="container" id="location_report_div">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="text-center">Document Upload List For Location Wise Agreement</h1>
                                    </div>
                                </div>
                                <div class="wrapper-box">
                                    <table id="example_list" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Document Type</th>
                                                    <th>Branch</th>
                                                    <th>Period From</th>
                                                    <th>Period To</th>
                                                    <th>Download</th>

                                                </tr>
                                            </thead>
                                            <tbody id ="loc_type_list">
                                            <?PHP
                                                foreach($doclist as $doc){								
                                            ?>
                                                <tr class="gradeX">
                                                    <td><?PHP echo $doc->document_type; ?></td>
                                                    <td><?PHP echo $doc->branch_name; ?></td>
                                                    <td><?PHP echo date("d/m/Y", strtotime($doc->period)); ?></td>
                                                    <td><?PHP echo date("d/m/Y", strtotime($doc->period_end)); ?></td>
                                                    <td><a href="<?php echo base_url('uploads/'.$doc->uplode_file); ?>" class="btn btn-danger" target="_blank">Download</a></td>


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
                    </div>
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
        addnewdoc();
        addnewloc();

        
    });
	var type = '<?PHP echo $client->location_type ?>';
	
	//alert (type);
if(type == 'S'){
	$("#location_div").hide();
	$("#location_report_div").hide();
}	
else{
	$("#location_div").show();
	$("#location_report_div").show();
}


	function addnewdoc(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              row_html += '<div class="row">';
                                row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" required>Document Type</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm text-center" name="doc_name[]" id="doc_name0" placeholder="Document Type" required />';
                                       row_html += '</div>';
                                   row_html += '</div>';

                               row_html += '</div>'; 
								
								row_html += '<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Upload Date :</label>';
                                    row_html +='<div class="col-sm-8">';
                                      row_html +=  '<input type="text" name="billstartdate[]" id="billstartdate0" value="<?php echo $today; ?>" class="form-control form-control-sm text-center" readonly>';
                                   row_html += '</div>';
                              row_html +=  '</div> ';
                           row_html += '</div> ' ;
						   
						   row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" required>Remarks</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm text-center" name="remarks[]" id="remarks0" placeholder="Remarks"  />';
                                       row_html += '</div>';
                                   row_html += '</div>';

                            row_html += '</div>'; 
							
							row_html +='<div class="col-md-3">';
								row_html +='<input type="hidden" name="file_count[]" value="0"><input type="file" style="width: 100%;" name="fileuplode_0" id="fileuplode0" required>';
                           row_html += '</div> ';
							
				row_html += '</div>';
				
				
		
        $("#docuplode_rows").html(row_html);
    }
	
var cnt =0;
 $("#add_doc").on('click', function () {
	 //alert('ss');
          cnt++;

           var row_html ='';
		   row_html +='<div class="add_more_doc" id="add_more_doc'+cnt+'" >';
              row_html += '<div class="row">';
                                row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Type</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm text-center" name="doc_name[]" id="doc_name'+cnt+'" placeholder="Document Type" required/>';
                                       row_html += '</div>';
                                   row_html += '</div>';

                               row_html += '</div>';
								
								row_html += '<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Upload Date :</label>';
                                    row_html +='<div class="col-sm-8">';
                                      row_html +=  '<input type="text"  value="<?php echo $today; ?>" name="billstartdate[]" id="billstartdate'+cnt+'" class="form-control form-control-sm text-center" readonly>';
                                    row_html += '</div>';
                              row_html +=  '</div> ';
                           row_html += '</div> ' ;
						   
						     row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" required>Remarks</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm text-center" name="remarks[]" id="remarks'+cnt+'" placeholder="Remarks"  />';
                                       row_html += '</div>';
                                   row_html += '</div>';

                            row_html += '</div>'; 
							
							row_html +='<div class="col-md-3">';
										row_html +='<div class="row">';
											row_html +='<div class="col-md-10">';
												row_html +='<input type="hidden" name="file_count[]" value="'+cnt+'"><input type="file" style="width: 100%;" name="fileuplode_'+cnt+'" id="fileuplode'+cnt+'" required>';
											row_html +='</div>';
											row_html +=' <div class="col-md-2 text-center">';
									row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
									
									
                           row_html += '</div>';
									row_html +=	'</div>';
                           row_html += '</div> ';
							
                                    
				row_html += '</div>';
			row_html += '</div>';

            $("#docuplode_rows").append(row_html)


			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_doc').remove();
					});
        });
		
		
		
		
		
		function delchild(psa)
        {
           // alert(pa);
            $("#add_more_doc"+psa).remove();
        }
var branch_dd = ''; 
<?php foreach($bank as $bank) { ?>
branch_dd += '<option value="<?PHP echo $bank->branch_id;?>"><?PHP echo escape_str($bank->branch_name); ?></option>';
<?php } ?>
function addnewloc(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              row_html += '<div class="row">';
                                row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Type</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm text-center" name="loc_doc_name[]" id="doc_name_1" placeholder="Document Type" required/>';
                                       row_html += '</div>';
                                   row_html += '</div>';

                               row_html += '</div>'; 
								
								row_html += '<div class="col-md-5">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Period :</label>';
                                    row_html +='<div class="col-sm-10">';
									row_html +='<div class="row">';
									row_html +='<div class="col-sm-6">';
                                      row_html +=  '<input type="date" data-date="01-02-2013" data-date-format="dd-mm-yyyy"                                            value="01-02-2013" name="loc_billstartdate[]" id="loc_billstartdate" class="datepicker form-control form-control-sm text-center" required>';
									  row_html += '</div>';
									  row_html +='<div class="col-sm-6">';
									  row_html +=  '<input type="date" data-date="01-02-2013" data-date-format="dd-mm-yyyy"                                            value="01-02-2013" name="loc_billenddate[]" id="loc_billenddate" class="datepicker form-control form-control-sm text-center" required>';
									  row_html +='</div>';
									  row_html +='</div>';
                                   row_html += '</div>';
                              row_html +=  '</div> ';
                           row_html += '</div> ' ;
						   
						   row_html += '<div class="col-md-2">';
                                                row_html += '<div class="form-group row">';
                                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Location</label>';
                                                    row_html += '<div class="col-sm-9">';
                                                        row_html += '<select id="branch_id_1" name="branch_id[]" class="form-control form-control-sm" required>';
                                                        	row_html += '<option value="">Select Branch</option>';
															row_html += branch_dd;
															
                                                        row_html += '</select>';
                                                    row_html += '</div>';
                                                  row_html += '</div>';
                            row_html += '</div>';
							row_html +='<div class="col-md-2">';
												row_html +='<input type="hidden" name="file_count[]" value="0"><input type="file" name="fileuplode_0" style="width: 100%;" id="fileuplode0"required>';
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
                                row_html +='<div class="col-md-3">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Document Type</label>';
                                       row_html += '<div class="col-sm-9">';
                                           row_html += '<input type="text" class="form-control form-control-sm text-center" name="loc_doc_name[]" id="doc_name_'+count+'" placeholder="Document Type"  required/>';
                                       row_html += '</div>';
                                   row_html += '</div>';

                               row_html += '</div>';
								
								row_html += '<div class="col-md-5">';
                                  row_html +=  '<div class="form-group row">';
                                    row_html += '<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Period :</label>';
                                    row_html +='<div class="col-sm-10">';
									row_html +='<div class="row">';
									row_html +='<div class="col-sm-6">';
                                      row_html +=  '<input type="date" data-date="01-02-2013" data-date-format="dd-mm-yyyy" name="loc_billstartdate[]" id="loc_billstartdate'+count+'" class="datepicker form-control form-control-sm text-center" required>';
									  row_html += '</div>';
									  row_html +='<div class="col-sm-6">';
									  row_html +=  '<input type="date" data-date="01-02-2013" data-date-format="dd-mm-yyyy" name="loc_billenddate[]" id="loc_billenddate'+count+'" class="datepicker form-control form-control-sm text-center" required>';
									  row_html += '</div>';
									  row_html += '</div>';
                                    row_html += '</div>';
                              row_html +=  '</div> ';
                           row_html += '</div> ' ;
						   row_html += '<div class="col-md-2">';
                                                row_html += '<div class="form-group row">';
                                                    row_html += '<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Location</label>';
                                                    row_html += '<div class="col-sm-9">';
                                                        row_html += '<select id="branch_id_'+count+'" name="branch_id[]" class="form-control form-control-sm" required>';
                                                        	row_html += '<option value="" >Select Branch</option>';
															
															row_html += branch_dd;
															 
                                                        row_html += '</select>';
                                                    row_html += '</div>';
                                                  row_html += '</div>';
                            row_html += '</div>';
							row_html +='<div class="col-md-2">';
							row_html +='<div class="row">';
							row_html +='<div class="col-md-9">';
												row_html +='<input type="hidden" name="file_count[]" value="'+count+'"><input style="width: 100%;" type="file" name="fileuplode_'+count+'" style="width="100%;" id="fileuplode'+count+'" required>';
							row_html += '</div> ';
							row_html +=' <div class="col-md-2 text-center">';
									row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+count+'" onclick="delchild('+count+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
									
									
                           row_html += '</div>';
                           row_html += '</div> ';
							row_html += '</div> ';
                                    
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
		

$("#file_doc").submit(function(event){
	event.preventDefault();
	
var client_id = '<?PHP echo $client->client_id ?>';
//alert(client_id);
//alert(new FormData(this));

 
		$.ajax({
		type: 'POST',		// data goto the server through POST method 
		url: '<?php echo base_url();?>document_uplode/add_document_uplode/' + client_id,
		data : new FormData(this),
		dataType: 'json',	// what type of data formate we will wante from the server
		contentType : false,
		processData	: false
	})
	
		var msg = 'Document uploaded successfully';
		alert(msg);
		
		loadLocationWiseDocs(client_id);
		
		$(this).closest('form').trigger("reset");
})

function loadLocationWiseDocs(client_id){
	//doc_type_list
	//alert(client_id);
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url();?>document_uplode/add_document_uplode_list',
		data: {client_id:client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
		dataType: 'json',
		encode: true
	})
	
	//var result='';
	//var i=0;
	//alert(doclist);
	.done(function(data){ 
	//alert(data.newHash);
	$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		var result='';
		var i=0;
		$.each(data.doclist,function(key,value){
            	result += '<tr>'
				result += '<td>' + value.document_type + '</td>';
				result += '<td>' + value.period + '</td>';
				result += '<td>' + value.period_end + '</td>';
				result += '<td><a href="<?php echo base_url();?>uploads/'+value.uplode_file+'" class="btn btn-danger" target="_blank">Download</a></td>';
				result += '</tr>';
            });
			$("#doc_type_list").html(result);
	})
	
}


$("#location_doc").submit(function(event){
	event.preventDefault();
	
var client_id = '<?PHP echo $client->client_id ?>';
//alert(client_id);
//alert(new FormData(this));

 
		$.ajax({
		type: 'POST',		// data goto the server through POST method 
		url: '<?php echo base_url();?>document_uplode/docupload/' + client_id,
		data : new FormData(this),
		dataType: 'json',	// what type of data formate we will wante from the server
		contentType : false,
		processData	: false
	})
	
		var msg = 'Document uploaded successfully';
		alert(msg);
		
		
		LocationloadLocationWiseDocs(client_id);
			
		$(this).closest('form').trigger("reset");
})


function LocationloadLocationWiseDocs(client_id){
	//doc_type_list
	//alert(client_id);
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url();?>document_uplode/loc_document_uplode_list',
		data: {client_id:client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
		dataType: 'json',
		encode: true
	})
	
	.done(function(data){ 
	//alert(data.newHash);
	$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		var result='';
		var i=0;
		$.each(data.loclist,function(key,value){
				//alert(value.document_type);
            	result += '<tr>'
				result += '<td>' + value.document_type + '</td>';
				result += '<td>' + value.branch_name + '</td>';
				result += '<td>' + value.period + '</td>';
				result += '<td>' + value.period_end + '</td>';
				result += '<td><a href="<?php echo base_url();?>uploads/'+value.uplode_file+'" class="btn btn-danger" target="_blank">Download</a></td>';
				result += '</tr>';
            });
			$("#loc_type_list").html(result);
	})
	
}
</script>