<?PHP 
//print_r($list); exit;
?>
<section class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php echo form_open( base_url( 'delete_staff_salary/delete' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) );  ?>
                
                <div class="row">
                    <div class="col-md-7">
                        <h1 style="text-align: center;">Delete Staff Salary Payment</h1>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">Month & Year : </label>
                                <div class="col-sm-8">
                                    <?php 
                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'month_year','onChange' => 'populatebranch()');
                                        $selected = (set_value('month_year')) ? set_value('month_year') : '';
                                        echo form_dropdown('month_year', $month_year, $selected, $attributes);
                                    ?>
                                </div>
                            </div>    
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch:  </label>
                                    <div class="col-sm-9">

                                    <select class="form-control form-control-sm" id="branch_id" name="branch_id">
                                    </select>
                                       
                                    </div>

                                </div>    
                            </div>
                            <div class="col-md-1">                                             
                                <button type = "button" class="cr-a" onclick="staff_search()">Search</button>
                            </div>
                       
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="tid-table" class="table table-striped table-bordered" type="hidden" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Month & Year</th>
                                        <th>Branch</th>
                                        <th>Delete Salary</th>
                                    </tr>
                                </thead>
                                <tbody id = "pay_list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
 $(document).ready(function() {
        //$('#tid-table').DataTable();
        $('#tid-table').DataTable();
} );




function populatebranch(){
    if (($("#month_year").val() != null)){
        let month_year = $("#month_year").val();
        // alert (month_year);
        // let branch_id = $("#branch_id").val();     
        var result1 = '';  
       
        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('delete_staff_salary/branch_list'); ?>',
            data: {month_year: month_year,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){

            $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                result1 +='<option value="">Select Branch</option>';

                $.each(data.branch_list,function(key,value){
                    result1 +='<option value="'+value.company_branch_id+'">'+value.branch_name+'</option>';
                });
            }
            else{
                result1 +='<option value="">No Branch selected</option>';
            }
            $("#branch_id").html(result1);
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }
    else
    {
        return false;
    }
}





function staff_search(){

//event.preventDefault();
var month_year = $('#month_year').val();
var branch_id = $('#branch_id').val();
// alert(branch_id);

//alert(1);

$.ajax({
 type:'POST',
 url: '<?php echo base_url('delete_staff_salary/search'); ?>',
 data: {<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(), month_year:month_year, branch_id:branch_id},
 dataType:'json',
 encode:true,

 success: function(data) {
    var html = '';
    // var i;
    var c = 0;
    var payment_month = '';
    var branch_id = '';
    if(data.status){
        
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        $.each(data.list,function(key,value){c++;
            //payment_month = value.payment_month;
            //payment_month = '2021-06-01';
            //branch_id = value.branch_id;
            //  alert(value.month);
            payment_month=value.month;
            html += '<tr>';
            html += '<td>'+value.month_year+'</td>';
            html += '<td>'+value.branch_name+'</td>';
            html += '<td><i class="fa fa-trash" onclick="confirmation(\''+payment_month+ '\','+ value.branch_id +');"></i></td>';                    
            html += '</tr>';
        })
    }
    else{
        html += '<tr>';
        html += '<td colspan="8">No data available in table</td>';
        html += '</tr>';
    }
    $("#tid-table").dataTable().fnDestroy();
    $("#pay_list").html(html);
    $("#tid-table").DataTable();
    //alert(branch_id);
}
})


}

function confirmation(payment_month,branch_id){
    console.log(payment_month.toString());
        // alert(payment_month);
        var del=confirm("Are you sure you want to delete this record?\n"+ payment_month +'/'+ branch_id);
        
        $.ajax({
			type: 'POST',   
			url: '<?php echo base_url('delete_staff_salary/delete'); ?>',
			data: {payment_month:payment_month,branch_id:branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			// alert(data.status);
			if(data.status){  
                alert("Deleted Successfully");

                window.location.reload();
            }


    return del;
    })
    
    }
</script>



