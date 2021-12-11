<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_payment extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    
	
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  	$this->load->model('Area_payment_model','am');
  }
  
  public function index($client_id = '', $salary_month = ''){
    $data = [];
    $client_id = $this->uri->segment(3);
    $salary_month = $this->uri->segment(4);
    //$arrear_to_salary = $this->uri->segment(4);
    $data['list'] = $this->am->client_arrear_payment($client_id,$salary_month);
    //echo "<pre>"; print_r($data['list']); exit();
    $this->template->write('title', 'Pay Register Report', TRUE);
	/**
	 * if you have any css to add for this page
	 */

	$this->template->add_css('assets/css/dataTables.bootstrap4.min.css');


	/**
	 * if you have any js to add for this page
	 */
	$this->template->add_js('assets/js/jquery.dataTables.min.js');
	$this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
	$this->template->add_js('assets/js/bootstrap-select.js');

	
	
	$this->template->write_view('content', 'list', $data , TRUE);
	$this->template->render();
  }
  
   
	 
	 
	public function add()
	{
		if(!empty($this->input->post())){
			 
			 $this->form_validation->set_rules('client_id','Client Name','required');
			 $this->form_validation->set_rules('branch_id','Branch Name','required');
			 $this->form_validation->set_rules('designation_id','Designation Name','required');
			 $this->form_validation->set_rules('salary_month','Salary Month','required');
             
             
    		   if ($this->form_validation->run() == TRUE)
   	           {
    				$client_id = $this->input->post('client_id');
    				$branch_id = $this->input->post('branch_id');
    				$designation_id = $this->input->post('designation_id');
                    $arrear = $this->input->post('arrear');
                    $arrear_to_salary = $this->input->post('arrear_to_salary');
                    $arrear_from_salary = $this->input->post('arrear_from_salary');
    				$salary_month = $this->input->post('salary_month');
                    $new_gross = $this->input->post('new_gross');
                    $old_gross = $this->input->post('old_gross');
                    $new_basic = $this->input->post('new_basic');
                    $old_basic = $this->input->post('old_basic');
                    $new_ot = $this->input->post('new_ot');
                    $old_ot = $this->input->post('old_ot');
                    $areear_gross = $this->input->post('areear_gross');
                    $arr_bon = $this->input->post('arr_bon');
                    $areear_basic = $this->input->post('areear_basic');
    				$arr_gra = $this->input->post('arr_gra');
    
                
            		$qry = $this->am->insertAreaPayment($client_id,$branch_id,$designation_id,$arrear,$arrear_to_salary,$arrear_from_salary,$salary_month,$new_gross,$old_gross,$new_basic,$old_basic,$new_ot,$old_ot,$areear_gross,$arr_bon,$areear_basic,$arr_gra);

    //         //  //    $empd_id = $qry['empd_id'];
	                if($qry)
	                {
	                	//echo $qry->status;die;
	                	if($qry->status == '0'){
	                		$this->session->set_flashdata('msg', $qry->msg);
	                    	redirect(base_url().'area_payment/add');
	                	}
	                	else
	                	{
	                		$this->session->set_flashdata('msg', $qry->msg);
	                    	redirect(base_url().'area_payment/index/'.$client_id. '/' . $salary_month );
	                	}
	                    
	                }
                
        }
	 }
		$data = [];
    	
    	$client_obj = $this->am->get_all_client();
        $client_list = array('' => 'Select Client');
        foreach($client_obj as $client){
            $client_list[$client->client_id] = $client->client_name;
        }
        $data['client'] = $client_list;

        $branch_obj = $this->am->getBranch();
        $branch_list = array('' => 'Select Branch');
        foreach($branch_obj as $branch){
            $branch_list[$branch->branch_id] = $branch->branch_name;
        }
        $data['branch'] = $branch_list;

    $this->template->write('title', 'Pay Register Report', TRUE);
	/**
	 * if you have any css to add for this page
	 */

	$this->template->add_css('assets/css/dataTables.bootstrap4.min.css');


	/**
	 * if you have any js to add for this page
	 */
	$this->template->add_js('assets/js/jquery.dataTables.min.js');
	$this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
	$this->template->add_js('assets/js/bootstrap-select.js');

	
	
	$this->template->write_view('content', 'add', $data , TRUE);
	$this->template->render();
	}

	public function designation_list(){
		$client_id = $this->input->post('client_id');
		$branch_id = $this->input->post('branch_id');
		$data['designation_list'] = $this->am->getDesignation($client_id,$branch_id);
		//print_r($data['designation_list']);die;
		echo json_encode(array('designation_list' => $data['designation_list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
		//echo json_encode(array('newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}

	public function client_details(){
        $client_id = $this->uri->segment(3);
        $branch_id = $this->uri->segment(4);
        $designation_id = $this->uri->segment(5);
        $client= $this->am->getClient($client_id);
        $branch= $this->am->getLocation($branch_id);
        $designation = $this->am->getDesignationDet($designation_id);
        $arrear_no = $this->am->getArrear();
        //print_r($arrear_no->serial_no);die;
        
		echo json_encode(array('client_name' => $client->client_name, 'branch_name' => $branch->branch_name, 'desig_name' => $designation->desig_name,'serial_no' => $arrear_no->serial_no, 'status' => 1));
    }


	public function pf_pdf($client_id,$paymentMonth)
	{
		$paymentMonth = strtotime($paymentMonth);
		$month=date("m",$paymentMonth);
		$year=date("Y",$paymentMonth);
		if(!empty($client_id) && !empty($paymentMonth))
		{
		  $data['area_payment'] =$this->am->area_payment_list($client_id,$month,$year);
		  $data['year']=$year;
		  $data['month']=date("M",$paymentMonth);
          //pr($data);
          $mpdf = new \Mpdf\Mpdf();
          $date = date('d-m-Y');
          $time = date('H-i-s');
          $pdf_name=$date.'_'.$time.'.pdf';
          $html = $this->load->view('pf_pdf',$data,true);
          $mpdf->WriteHTML($html);
          $mpdf->Output(); // opens in browser
          //$mpdf->Output($pdf_name,'D'); // it downloads the file into the user system, with give name
		}
		else
		{
			redirect('area_payment/index');
		}
          
        
       
	}
  
}

?>
