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
                    Home</a> <a href="#" class="tip-bottom">Mw Type</a> <a href="#" class="current">Edit Mw Type</a> </div>
            <h1>Edit Mw Type</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div align="center">
                <div class="sp-6-sm">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Edit Mw Type</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <?php foreach($mwType as $ed_mw){ ?>
                                <?php echo form_open( base_url( 'mw_type/UpdateMwType' ), array( 'id' => 'departmentform', 'class' => 'form-horizontal' ) ); ?>
                                <input type="hidden" name="mw_id" value="<?php echo $ed_mw['mw_type_id']; ?>">
                                <div class="control-group">
                                    <label class="control-label"> Mw Type Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="mw_type_name" placeholder="Mw Type name" value="<?php echo $ed_mw['mw_type_name']; ?>"/>
                                        <?php echo form_error('mw_type_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Mw Type Short Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="mwtype_short_name" placeholder="Mw Type Short name" value="<?php echo $ed_mw['mw_type_short_name']; ?>"/>
                                        <?php echo form_error('mwtype_short_name', '<span class="help-inline">', '</span>'); ?>
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
   