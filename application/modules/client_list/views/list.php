
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
                            <h1 style="text-align: left;">Client List</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <!-- <button  onclick="pdfDownload()" id="pdf_download" class="ad-btn-a-tag">PDF DOWNLOAD</button>   -->
                            </div>
                        </div>
                    </div>
                    <?php echo form_open( base_url('client_list'), array( 'id' => 'search', 'class' => 'form-horizontal' ) ); ?>
					<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name : </label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" onChange="populatebranch(this.value)" id="client_id" name="client_id" >
                                                <option value="">Select Client</option>
                                                <?php
                                                    foreach($client as $client_row)
                                                    {
                                                        if(!empty($show_client_id))
                                                        {
                                                            if($show_client_id==$client_row->client_id)
                                                            {
                                                                ?>
                                                                <option value="<?=$client_row->client_id?>" selected><?=$client_row->client_name?></option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?=$client_row->client_id?>"><?=$client_row->client_name?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?=$client_row->client_id?>"><?=$client_row->client_name?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch State: </label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" id="branch_state_id" name="branch_state_id">
											<?php
                                                    foreach($branch_list as $branch_list_row)
                                                    {
                                                        if(!empty($show_branch_state_id))
                                                        {
                                                            if($show_clshow_branch_state_id==$branch_list_row['state_id'])
                                                            {
                                                                ?>
                                                                <option value="<?=$branch_list_row['state_id']?>" selected><?=$branch_list_row['state_name']?></option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?=$branch_list_row['state_id']?>"><?=$branch_list_row['state_name']?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?=$branch_list_row['state_id']?>"><?=$branch_list_row['state_name']?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>  
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
					
					
					<div class="row">

                    <div class="col-md-5">
                            
                        </div>
                        
                        <div class="col-md-1">
                            <button type="submit" class="cr-a" style="padding: 6px 0px;">Search</button>
                        </div>
                        
                        
                          
                    </div> 
                    
                </form>
                <?php
                    if($flag==1)
                    {
                ?>
                <div class="row">
                <div class="col-md-4">
                    <label for="colFormLabelSm">Client Code:  <?php echo $detail_client->client_code;?></label>
                </div>
                <div class="col-md-4">
                    <label for="colFormLabelSm">Client Name:  <?php echo $detail_client->client_name;?></label>
                </div>
                <div class="col-md-4">
                    <label for="colFormLabelSm">Client Address:  <?php echo $detail_client->address;?></label>
                </div>
                         
                </div>  
                <?php
                    }
                ?>

                    <div class="wrapper-box">
                        <table id="client-table" class="table table-striped table-bordered" style="width:100%">  
                            <thead>
									<tr>
                                        <th>Sno</th>
										<th>Branch Name.</th>
                                        <th>Branch Code.</th>
										<th>Branch Addresh</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Sole Id</th>
										
                                
                                    </tr>
                                </thead>
                                <tbody id="client_attendance_list">
								    <?php 
                                        if(!empty($client_list))
                                        {
                                    foreach($client_list as $k => $client_list_row) { ?>

                                        <tr>
                                            <td><?=($k+1)?></td>
                                           
                                            <td><?=$client_list_row->branch_name; ?></td>
											<td><?=$client_list_row->branch_code; ?></td>
                                            <td><?=$client_list_row->branch_address; ?></td>
                                            <td><?=$client_list_row->email; ?></td>
                                            <td><?=$client_list_row->contact_no; ?></td>
                                            <td><?=$client_list_row->sole_id; ?></td>
                                            
                                        </tr>


                                    <?php 
                                    }
                                    } ?>
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
    $(document).ready(function() 
    {
        $('#client-table').DataTable();
    } );
    function pdfDownload()
    {
        var hid_manth = $("#hid_manth").val();
        if(hid_manth!='')
        {
            var current_url=window.location.href;
            res=current_url+"/pf_pdf?month="+hid_manth;
            window.open(res);
            
        } 
    }

	function populatebranch(client_id)
    {
        if(client_id !='')
        {
            var result='';
            $.ajax({
                type: 'POST',   
                url: '<?php echo base_url('client_list/branch_list'); ?>',
                data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
                dataType: 'json',
                encode: true,
            })
            //ajax response
            .done(function(data)
            {
                $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
                if(data.status)
                {            
                    result +='<option value="">Select Branch State</option>';

                    $.each(data.branch_list,function(key,value){
                        //value(value.city_name);
                        result +='<option value="'+value.state_id+'">'+value.state_name+'</option>';
                    });
                }
                else
                {
                    result +='<option value="">No Branch State Selected</option>';
                }
                $("#branch_state_id").html(result);
            
            })
            
            .fail(function(data){
                // show the any errors
                console.log(data);
            });
        }
    }

   



</script>
