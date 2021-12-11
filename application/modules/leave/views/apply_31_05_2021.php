

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
                                        <h1>Apply for leave</h1>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php echo form_open( base_url('' ), array( 'id' => 'apply-form', 'class' => 'form-horizontal' ) ); ?>
                                 <form>
                                <div class="wrapper-box">
                                   <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee Code : </label>
                                                    <div class="col-sm-9">
                                                      <p>S000010</p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Name : </label>
                                                    <div class="col-sm-8">
                                                      <p>Arup Das</p>  
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Leave Type : </label>
                                                    <div class="col-sm-9">
                                                        <select type="text" class="form-control form-control-sm" id="" name="">
                                                            <option>EL</option>
                                                            <option>CL</option> 
                                                            <option>SL</option>
                                                        </select>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 pr-0 col-form-label col-form-label-sm">Leave From : </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control form-control-sm">  
                                                    </div>
                                                    <label for="colFormLabelSm" class="col-sm-2 p-0 col-form-label col-form-label-sm text-center">Leave To : </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" class="form-control form-control-sm">  
                                                    </div>
                                                    <label for="colFormLabelSm" class="col-sm-1 p-0 col-form-label col-form-label-sm text-center">Half Day : </label>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" class="form-control form-control-sm" style="width: 70%;">  
                                                    </div>
                                                  </div> 
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">No Of Leave  Days :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Address During Leave :</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm"></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="form-group row" style="margin-top: -42px;">
                                                    <label for="colFormLabelSm" class="col-sm-2 pr-0 col-form-label col-form-label-sm">Home Address :</label>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" class="form-control form-control-sm" style="width: 70%;">
                                                    </div>
                                                  </div>
                                            </div>  
                                            <div class="col-md-3" style="border: 1px solid #000;padding: 10px 10px;"> 
                                                <p><b>Leave Balance</b></p>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">EL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">SL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Reason For Leave : </label>
                                                        <div class="col-sm-10"> 
                                                          <textarea class="form-control form-control-sm"></textarea>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Approver Name : </label>
                                                    <div class="col-sm-9">
                                                      <select type="text" class="form-control form-control-sm" id="" name="">
                                                        <option>Name 1</option>
                                                        <option>Name 2</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="row mt-top mb-3">  
                                            <div class="col-md-4">&nbsp;</div>
                                              <div class="col-md-4">
                                                <button type="submit" class="ref-btn">Submit</button>
                                              </div>
                                              <div class="col-md-4">&nbsp;</div>
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