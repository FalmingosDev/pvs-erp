
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
                <a href="#" class="current">Department</a> </div>
                <div class="headtag-div">
                    <div class="head-1">
                        <h1>Department List</h1>
                    </div>
                    <div class="head-2">
                        <span>
                            <a href="<?php echo base_url('department/addDepartment'); ?>" class="btn btn-block bg-gradient-primary btn-sm2" style="align:center; width:100%; float:right;">Add Department</a> 
                        </span>
                    </div>
                </div>
            <!-- <h1>Department List</h1> -->
             <!-- <span>
                <a href="" class="btn btn-block bg-gradient-primary btn-sm" style="align:center; width:10%; float:right;">Add Department</a>
            </span> -->
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="icon-th"></i></span>
                            <h5>Department List</h5>
                           
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Department Name</th>
                                        <th>Department Short Name</th>
                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                       $a = 1;
                                       foreach($departments as $deptlist) {  
                                    ?>
                                    <tr class="gradeX">
                                        <td style="text-align: center;"><?php echo $a; ?></td>
                                        <td style="text-align: center;"><?php echo $deptlist['dept_name']; ?></td>
                                        <td style="text-align: center;"><?php echo $deptlist['dept_short_name']; ?></td>
                                       <!--  <td style="text-align: center;"> <i class="icon-edit"> <?php //echo $deptlist['dept_id']; ?> </i>Edit</td> -->
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('department/editdepartment/'.$deptlist['dept_id']); ?>">Edit</a></td>
                                        <?php
                                            if($deptlist['active_status']==0){
                                            ?>
                                                <td style="text-align: center;"><a href="<?php echo base_url('department/status/'.$deptlist['dept_id'].'/'.$deptlist['active_status']); ?>" class="btn btn-success">Active</a></td> 
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <td style="text-align: center;"><a href="<?php echo base_url('department/status/'.$deptlist['dept_id'].'/'.$deptlist['active_status']); ?>" class="btn btn-danger">Deactive</a></td> 
                                            <?php
                                            }
                                            ?>
                                    </tr>

                                    <?php
                                    $a++;
                                        }
                                   // }





                                    ?>
                                    <!-- <tr class="gradeX">
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0</td>
                                        <td>Win 95+</td>
                                    </tr> -->
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    