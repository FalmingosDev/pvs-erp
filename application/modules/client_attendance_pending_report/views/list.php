
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
                            <h1 style="text-align: left;">Client Attendance Pending Report</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <button  onclick="pdfDownload()" id="pdf_download" class="ad-btn-a-tag">PDF DOWNLOAD</button>  
                            </div>
                        </div>
                    </div>
                    <?php echo form_open( base_url( 'client_attendance_pending_report' ), array( 'id' => 'search', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year :    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'month','onchange'=>'choose_manth()');
                                            $selected = (set_value('month')) ? set_value('month') : '';
                                            echo form_dropdown('month', $month, $selected, $attributes);
                                        ?>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="col-md-1">
                            <button type="submit" id= "submit_search" name="submit_search" class="cr-a" style="padding: 6px 0px;">Search</button>
                        </div>  
                    </div> 
                    <input type="hidden" id="hid_manth" value=''>
                </form>
                    <div class="wrapper-box">
                        <table id="client-table" class="table table-striped table-bordered" style="width:100%">  
                            <thead>
									<tr>
                                        <th>Sno</th>
                                        <th>Unit Name/ Location /Branch Name</th>
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
                                            <td></td>
                                            <td>
                                               
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
        else
        {
            $('#pdf_download').attr('disabled','disabled');
        }
    }

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

   



</script>
