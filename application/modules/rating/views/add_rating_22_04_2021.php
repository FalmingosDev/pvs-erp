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
                    Home</a> <a href="#" class="tip-bottom">Rating</a> <a href="#" class="current">Add Rating</a> </div>
            <h1>Add Rating</h1>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div align="center">
                <div class="sp-6-sm">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add Rating</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <?php echo form_open( base_url( 'rating/addRating' ), array( 'id' => 'mwtypeform', 'class' => 'form-horizontal' ) ); ?>
                                <div class="control-group">
                                    <label class="control-label">Rating Short name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="rating_shrt_name" placeholder="Rating Short name" />
                                        <?php echo form_error('rating_shrt_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="desc" placeholder="Description" />
                                        <!-- <textarea name="mw_type_short_name" placeholder="Description" cols="10" rows="5"></textarea> -->
                                        <?php echo form_error('desc', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
   