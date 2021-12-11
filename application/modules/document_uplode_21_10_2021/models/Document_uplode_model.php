<?php
class Document_uplode_model extends CI_Model {
	protected $roleTable = 'role_mst';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function DocUpList($id) {
		
		$query = $this->db->query("select client_id,document_id,document_type,client_id,period,uplode_file,branch_id from client_documents_mst WHERE branch_id is null AND client_id = ".$id);
		return $query->result();
	}	
	
	function ClientName($id){
		
		$query = $this->db->query("Select client_id,client_code,client_name,location_type from client_mst WHERE client_id = ".$id);
		return $query->row();
	}
	
	
	public function get_up_doc($id) {
		
		$query = $this->db->query("select client_id,document_id,document_type,client_id,period,uplode_file,branch_id from client_documents_mst WHERE branch_id is null AND client_id = ".$id);
		return $query->result();
	}
	public function loc_up_doc($id) {
		
		$query = $this->db->query("select cm.client_id,cm.document_id,cm.document_type,cm.client_id,cm.period ,cm.uplode_file,cm.branch_id,bm.branch_name 
  from client_documents_mst cm
  LEFT JOIN branch_mst bm ON bm.branch_id = cm.branch_id
  WHERE cm.branch_id is not null AND cm.client_id = ".$id);
		return $query->result();
	}
	
	public function BankList($id) {
		
		$query = $this->db->query(" SELECT branch_id,branch_name FROM branch_mst WHERE client_id = ".$id);
		return $query->result();
	}
	
	
	public function adddoc($clientid,$client_name,$billstartdate,$uploaded_files)
	{
		$tot_name = count($client_name);
		$detail_data = '';
		
		$user_id = $this->session->user_id;
		//$doc_date = date("Y-m-d", strtotime($billstartdate));
		
		  

		for($i=0; $i<$tot_name; $i++)
		{
			$detail_data .= escape_str($client_name[$i]).'|~|'.$billstartdate[$i].'|~|'.$uploaded_files[$i].'#';
		}
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "#");

		 //print_r($detail_data);die; 
 

		/*$aa="EXEC doc_uplode  @p_client_id='".$clientid."',@p_detail_data = '". $detail_data."', @p_user_id = '".$user_id."'";
		echo  $aa; die; */

		$query = $this->db->query("EXEC doc_uplode  @p_client_id='".$clientid."',@p_detail_data = '". $detail_data."', @p_user_id = '".$user_id."'");

		
		return $query->result();
	}
	
	
	public function Locadddoc($client_id,$doc_name,$branch_id,$billstartdate,$uploaded_files)
	{
		$tot_name = count($doc_name);
		$detail_data = '';
		
		$user_id = $this->session->user_id;
		//$doc_date = date("Y-m-d", strtotime($billstartdate));
		
		  

		for($i=0; $i<$tot_name; $i++)
		{
			$detail_data .= escape_str($doc_name[$i]).'|~|'.$branch_id[$i].'|~|'.$billstartdate[$i].'|~|'.$uploaded_files[$i].'#';
		}
		//print_r($detail_data);die;
		 $detail_data = rtrim($detail_data, "#");


		$query = $this->db->query("EXEC loc_doc_uplode  @p_client_id='".$client_id."',@p_detail_data = '". $detail_data."', @p_user_id = '".$user_id."'");

		
		return $query->result();
	}
	
}