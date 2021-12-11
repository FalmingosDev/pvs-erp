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
                    Home</a> <a href="#" class="tip-bottom">Designation</a> <a href="#" class="current">Edit Designation</a> </div>
            <h1>Edit Designation</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div align="center">
                <div class="sp-6-sm">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Edit Designation</h5>
                        </div>
                        <div class="widget-content nopadding">
                                <?php foreach($designation as $ed_desig){ ?>
                                <?php echo form_open( base_url( 'designation/UpdateDesignation' ), array( 'id' => 'designationform', 'class' => 'form-horizontal' ) ); ?>
                                <input type="hidden" name="desig_id" value="<?php echo $ed_desig['desig_id']; ?>">
                                <div class="control-group">
                                    <label class="control-label">Designation Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="desig_name" placeholder="Designation name" value="<?php echo $ed_desig['desig_name']; ?>"/>
                                        <?php echo form_error('desig_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Designation Short Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="desig_short_name" placeholder="Designation Short name" value="<?php echo $ed_desig['desig_short_name']; ?>"/>
                                        <?php echo form_error('desig_short_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Rank :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="rank" placeholder="Rank" value="<?php echo $ed_desig['rank']; ?>"/>
                                        <?php echo form_error('rank', '<span class="help-inline">', '</span>'); ?>
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
   