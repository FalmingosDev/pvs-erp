   <style type="text/css">
       .sp-6-sm{
        width: 65%;
       }
       .form-horizontal .form-actions {
            padding-left: inherit;
        }
        .btn-success{
            padding: 10px 29px;
        }
   </style>
   <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                    Home</a> <a href="#" class="tip-bottom">Designation</a> <a href="#" class="current">Add Designation</a> </div>
            <h1>Add Designation</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div align="center">
                <div class="sp-6-sm">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add Designation</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <!-- <form role="form" action="<?php //echo base_url('department/insertDepartment') ?>" method="post" class="form-horizontal"> -->
                                <?php echo form_open( base_url( 'designation/insertDesignation' ), array( 'id' => 'designationform', 'class' => 'form-horizontal' ) ); ?>
                                <div class="control-group">
                                    <label class="control-label">Designation Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="designation_name" placeholder="Designation name" />
                                        <?php echo form_error('designation_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Designation Short Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="desig_short_name" placeholder="Designation Short name" />
                                        <?php echo form_error('desig_short_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Rank :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="rank" placeholder="Rank" />
                                        <?php echo form_error('rank', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
   