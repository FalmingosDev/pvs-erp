<?PHP 
//print_r($list); exit;
?>
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
                            <h1 style="text-align: left;">Client Attendance Received Report</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <button  onclick="pdfDownload()" id="pdf_download" class="ad-btn-a-tag">PDF DOWNLOAD</button>  
                            </div>
                        </div>
                    </div>
                    <?php echo form_open( base_url( 'client_attendance_report' ), array( 'id' => 'search', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year :    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'month' ,'onchange'=>'choose_manth()');
                                            $selected = (set_value('month')) ? set_value('month') : '';
                                            echo form_dropdown('month', $month, $selected, $attributes);
                                        ?>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Client Name :    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'client_id','onchange'=>'choose_client()');
                                            $selected = (set_value('client_id')) ? set_value('client_id') : '';
                                            echo form_dropdown('client_id', $client, $selected, $attributes);
                                        ?>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" id= "submit_search" name="submit_search" class="cr-a" style="padding: 6px 0px;">Search</button>
                        </div>  
                    </div> 
                    <input type="hidden" id="hid_manth" value=''>
                    <input type="hidden" id="hid_client" value=''>
                </form>
                    <div class="wrapper-box">
                        <table id="client-table" class="table table-striped table-bordered" style="width:100%">  
                            <thead>
									<tr>
                                        <th>Sno</th>
                                        <th>Unit Name/ Location</th>
                                        <th>Attendance Feeded/Received</th>
                                        <th>Salary Paid</th>
                                        <th>Cash</th>
                                        <th>Bank</th>
                                
                                    </tr>
                                </thead>
                                <tbody id="client_attendance_list">
								    <?php 
                                        if(!empty($client_attendance))
                                        {
                                    foreach($client_attendance as $k => $client_attendance_row) { ?>

                                        <tr>
                                            <td><?=($k+1)?></td>
                                            <td><?=$client_attendance_row->client_name; ?></td>
                                            <td><?= date("d-m-Y H-i-s", strtotime($client_attendance_row->created_ts))?></td>
                                            <td>
                                                <?php
                                                if($client_attendance_row->salary_processed_flag==0)
                                                {
                                                    echo "N";
                                                }
                                                else
                                                {
                                                    echo "Y";
                                                }
                                                ?>
                                            </td>
                                            <td></td>
                                            <td></td>
                                          
                                            
                                            
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
        choose_manth();
        choose_client();
        check_pdf();
        $('#client-table').DataTable();
    } );

    function choose_manth()
    {
        var month = $("#month").val(); 
        if(month!='')
        {
            $("#hid_manth").val(month);
            $("#pdf_download").removeAttr('disabled');
        }
      
    }

    function choose_client()
    {
        var client = $("#client_id").val(); 
        if(client!='')
        {
            $("#hid_client").val(client);
            $("#pdf_download").removeAttr('disabled');
        }
       
    }
    function check_pdf()
    {
        var month = $("#month").val();
        var client = $("#client_id").val();
        if(client!='' || month!='')
        {
            $("#pdf_download").removeAttr('disabled');
        }
        else
        {
            $('#pdf_download').attr('disabled','disabled');
        }
    }

    function pdfDownload()
    {
        var hid_manth = $("#hid_manth").val();
        var hid_client = $("#hid_client").val();
        if(hid_manth!='' || hid_client!='')
        {
            var current_url=window.location.href;
            res=current_url+"/pf_pdf?month="+hid_manth+"&&client_id="+hid_client;
            window.open(res);
            
        } 
    }


</script>
