
    <style type="text/css">
        .head-1 {
            width: 85%;
            float: left;
        }
        .head-2 {
            width: 13%;
            float: left;
        }
        .headtag-div{
            width: 100%;
        }
        .btn-sm2{
            padding: 10px 20px;
            width: 100%;
            background: #5bb75b;
            color: #fff;
            display: inline-block;
            margin-top: 17px;
        }
    </style>
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
                <a href="#" class="current">Rating</a> </div>
                <div class="headtag-div">
                    <div class="head-1">
                        <h1>Rating List</h1>
                    </div>
                    <div class="head-2">
                        <span>
                            <a href="<?php echo base_url('rating/addRating'); ?>" class="btn btn-block bg-gradient-primary btn-sm2" style="align:center; width:100%; float:right;">Add Rating</a> 
                        </span>
                    </div>
                </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="icon-th"></i></span>
                            <h5>Rating List</h5>
                           
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Rating Short Name</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                       $a = 1;
                                       foreach($rating_list as $rlist) {  
                                    ?>


                                    <tr class="gradeX">
                                        <td style="text-align: center;"><?php echo $a; ?></td>
                                        <td style="text-align: center;"><?php echo $rlist['rating_short_name']; ?></td>
                                        <td style="text-align: center;"><?php echo $rlist['rating_desc']; ?></td>
                                       <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('rating/editRating/'.$rlist['rating_id']); ?>">Edit</a></td>
                                        <?php
                                            if($rlist['active_status']==0){
                                            ?>
                                                <td style="text-align: center;"><a href="<?php echo base_url('rating/status/'.$rlist['rating_id'].'/'.$rlist['active_status']); ?>" class="btn btn-success">Active</a></td> 
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <td style="text-align: center;"><a href="<?php echo base_url('rating/status/'.$rlist['rating_id'].'/'.$rlist['active_status']); ?>" class="btn btn-danger">Deactive</a></td> 
                                            <?php
                                             }
                                            ?>
                                    </tr>

                                    <?php
                                       $a++;
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
    