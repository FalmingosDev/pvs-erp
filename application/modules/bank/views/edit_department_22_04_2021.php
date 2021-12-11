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
                    Home</a> <a href="#" class="tip-bottom">Department</a> <a href="#" class="current">Edit Department</a> </div>
            <h1>Edit Department</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div align="center">
                <div class="sp-6-sm">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Edit Department</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <!-- <form role="form" action="<?php //echo base_url('department/insertDepartment') ?>" method="post" class="form-horizontal"> -->
                                <?php foreach($department as $ed_dept){ ?>
                                <?php echo form_open( base_url( 'department/UpdateDepartment' ), array( 'id' => 'departmentform', 'class' => 'form-horizontal' ) ); ?>
                                <input type="hidden" name="dept_id" value="<?php echo $ed_dept['dept_id']; ?>">
                                <div class="control-group">
                                    <label class="control-label">Department Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="department_name" placeholder="Department name" value="<?php echo $ed_dept['dept_name']; ?>"/>
                                        <?php echo form_error('department_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Department Short Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="department_short_name" placeholder="Department Short name" value="<?php echo $ed_dept['dept_short_name']; ?>"/>
                                        <?php echo form_error('department_short_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Update</button>
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
   