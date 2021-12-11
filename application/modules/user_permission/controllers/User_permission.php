<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_permission extends MY_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->has_userdata('user_id') || !$this->session->user_id){
			redirect('login');
		}
		$this->load->model('user_permission_model','upm');
		
		$this->load->library('form_validation');
		
		$this->form_validation->CI =& $this;		
        $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		$data['role'] = $this->upm->get_all_role();
		
        $this->template->write('title', 'User Permission Master', TRUE);
        
        $this->template->add_js('assets/js/jquery.dataTables.min.js');
        $this->template->add_js('assets/js/dataTables.bootstrap4.min.js');
       
        $this->template->add_css('assets/css/dataTables.bootstrap4.min.css');
		
		$this->template->write_view('content', 'list', $data, TRUE);
        $this->template->render();
		
		
	}
	
	public function permission_list(){
		
		$role_id = $this->input->post('role_id');
		
		$data['permission_list'] = $this->upm->permission_list($role_id);
		
		//print_r($data['permission_list']); exit;
		echo json_encode(array('permission_list' => $data['permission_list'],'status' => 1));
	}
	
	
	public function all_list_submit(){
		$det_cnt = count($this->input->post('menu_id'));		
		$user_id = $this->session->user_id;
		
		$menu_id = $this->input->post('menu_id[]');
		$per_id = $this->input->post('permission_id');
		
		for($y=0;$y<$det_cnt;$y++){
			$add_value = $this->input->post('add_' . $y);
			$edit_value = $this->input->post('edit_' . $y);
			$delete_value = $this->input->post('delete_' . $y);
			$print_value = $this->input->post('print_' . $y);
			
			$role_id = $this->input->post('role_id');
			//print_r($per_id);exit;
			if($per_id[$y] =='' || $per_id[$y] == 0 ){
				$data['permission'] = $this->upm->all_list_add($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id[$y],$det_cnt);
			}
			
			else{
				//print_r($per_id[$y]);exit;
				$data['permission'] = $this->upm->all_list_update($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id[$y],$per_id[$y],$det_cnt);
			}
			
			
		}
		
		
		
		//print_r($data['permission_list']); exit;
		echo json_encode(array('permission' => $data['permission'],'status' => 1));
	}
	
	  
	public function single_submit(){
		$permission_id = $this->input->post('permission_id');
		$menu_id = $this->input->post('menu_id');
		$add_value = empty($this->input->post('add_value')) ? 0 : $this->input->post('add_value');
		$edit_value = empty($this->input->post('edit_value')) ? 0 : $this->input->post('edit_value');
		$delete_value = empty($this->input->post('delete_value')) ? 0 : $this->input->post('delete_value');
		$print_value = empty($this->input->post('print_value')) ? 0 : $this->input->post('print_value');
		$role_id = $this->input->post('role_id');
		$user_id = $this->session->user_id;
		
		//print_r($permission_id);exit;
		
		if($permission_id =='' || $permission_id == 0){
			$data['permission'] = $this->upm->single_add($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id);
		}	
		else{
			$data['permission'] = $this->upm->single_update($user_id,$role_id,$add_value,$edit_value,$delete_value,$print_value,$menu_id,$permission_id);
		}
		echo json_encode(array('permission' => $data['permission'],'status' => 1));
	}
	
	
}

	