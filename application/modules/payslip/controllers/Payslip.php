<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Payslip extends MY_Controller {

  public function __construct() {
    parent::__construct();
    if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
      redirect('login');
    }
	
    $this->load->model('Payslip_model','pm');
	
    $this->load->library('form_validation');
  	$this->load->helper(array('form', 'url'));
  	$this->form_validation->CI =& $this;
  }
  
  public function index(){
    $data = [];

    if(check_uri_permission('Payslip', 'V') == 0){
	     $this->session->set_flashdata('error_msg', 'You have no permission on this page');
	     redirect(base_url());
	     }


    //$data['list'] = $this->cm->client_list();
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

	$data['months'] = $this->pm->fetch_month('');
	//$data['list'] = $this->pm->paylist('');
	
	
	$this->template->write_view('content', 'list', $data, TRUE);
	$this->template->render();
  }
  
   public function client()
	{
		$month_id  = $this->input->post('month_id');
		
		$data['client'] = $this->pm->client($month_id);
		//print_r ($data); exit;
		echo json_encode(array('client' => $data['client'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	
	
	public function search()
	{
		$month_id  = $this->input->post('month_id');
		$client_id  = $this->input->post('client_id');
		$employee_id  = $this->input->post('employee_id');
		$payslip_temp_id  = $this->input->post('payslip_temp_id');
		$branch_id  = '';
		
		//print_r ($client_id); exit;
		
		$data['list'] = $this->pm->list_proc($month_id,$client_id,$employee_id,$payslip_temp_id,$branch_id );
		//echo $data; die;
		
		
		echo json_encode(array('list' => $data['list'], 'newHash' => $this->security->get_csrf_hash(),'status' => 1));
	}
	
	public function payslip_view($payment_date,$employee_id,$client_id,$payslip_temp_id,$branch_id)
	{
		//print_r ($client_id); exit;
		 $data['payslip_lst'] = $this->pm->payslip_view($payment_date,$employee_id,$client_id,$payslip_temp_id,
		 $branch_id);
		 //print_r ($data); exit;
		$this->load->view('payslip', $data); 
	}

}

?>
