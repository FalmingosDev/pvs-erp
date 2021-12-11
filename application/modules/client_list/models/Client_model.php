<?php
class Client_model extends CI_Model {
	
	protected $table_name = 'client_mst';
	protected $client_contact = 'client_contact_mst';

	
	public function __construct() 
	{
		parent::__construct();
	}

	public function get_all_client()
	{
		/* and approval_status_1='A' and approval_status_2='A'*/
		$query = $this->db->query("select client_id,client_name from client_mst where active_status=1;");
		return $query->result();
	}

	public function getBranch($client_id) 
	{
		$query = $this->db->query("select DISTINCT st.state_id,st.state_name from  branch_mst bm
		LEFT JOIN client_mst cm ON bm.client_id = cm.client_id 
		LEFT JOIN state_mst st ON bm.state_id = st.state_id 
		where bm.client_id='". $client_id ."' ORDER BY st.state_name");
		return $query->result_array(); 
	}
	
	public function client_list($client_id,$branch_state_id) 
	{
		$qry = "select bm.branch_name,CONCAT(bm.address_1, ',  ', st.state_name) AS branch_address,bm.branch_code,bm.email,bm.sole_id,bm.contact_no
		from  branch_mst bm
		LEFT JOIN client_mst cm ON bm.client_id = cm.client_id 
		LEFT JOIN state_mst st ON bm.state_id = st.state_id 
		where bm.client_id= isnull(".$client_id.",bm.client_id) and bm.state_id= isnull(".$branch_state_id.",bm.state_id) ORDER BY bm.branch_name";
		$query = $this->db->query($qry);
		//exit(json_encode($this->db->last_query()));
		return $query->result();
	}

	public function client_row($client_id) 
	{
		$qry = "select cm.client_name,CONCAT(cm.address_1,' ',cm.address_2,' ',cm.address_3,',', st.state_name) AS address,cm.client_code
		from  branch_mst bm
		LEFT JOIN client_mst cm ON bm.client_id = cm.client_id 
		LEFT JOIN state_mst st ON bm.state_id = st.state_id 
		where bm.client_id= isnull(".$client_id.",bm.client_id) ";
		$query = $this->db->query($qry);
		//exit(json_encode($this->db->last_query()));
		return $query->row();
	}
}

