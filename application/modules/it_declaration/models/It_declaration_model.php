<?php
class It_declaration_model extends CI_Model {	
	protected $it_declaration = 'employee_it_declaration';

	
	public function __construct() {
		parent::__construct();
	}

	public function get_all_financial_year() {
		$query = $this->db->query("Select financial_year_id,fy_name from financial_year_mst ORDER BY fy_name;");
		return $query->result();
	}


		public function get_all_it_deduction_rule() {
		$query = $this->db->query("Select it_deduction_id,section from it_deduction_rule_header;");
		return $query->result();
	}


	public function get_all_employee_id() {
		$query = $this->db->query("Select employee_id,concat(employee_code, ' - ', first_name, ' ', last_name) as employee_name  from employee_mst;");
		return $query->result();
	}


	public function get_all_it_deduction_detail123($it_deduction_id) {
		$condition = "";
		if(!empty($it_deduction_id)){
			$condition = " WHERE it_deduction_id = " . $it_deduction_id;
		}
		$query = $this->db->query("Select it_deduction_detail_id,sub_head_name  from it_deduction_rule_detail " . $condition. ";");
		return $query->result();
	}


	public function get_all_it_deduction_detail() {
		
		$query = $this->db->query("Select it_deduction_detail_id,sub_head_name  from it_deduction_rule_detail");
		return $query->result();
	}


		public function resourcelist() {
		 
		$query = $this->db->query("Select it_deduction_detail_id,sub_head_name  from it_deduction_rule_detail;");
		return $query->result();
	}

	public function get_all_employee_id_new() {
		 
		$query = $this->db->query("Select it_deduction_id,section from it_deduction_rule_header;");
		return $query->result();
	}


	public function get_all_deduction_detail() {
		 
		$query = $this->db->query("Select it_deduction_id,section from it_deduction_rule_header;");
		return $query->result();
	}	
	 public function it_declaration($id)
	  {
	    $query = $this->db->query("Select it_deduction_detail_id,it_deduction_detail_id,sub_head_name  from it_deduction_rule_detail where it_deduction_id = ".$id.";");
	    return $query->result();
	  }

	public function it_declaration_add($id)
	  {
	    $query = $this->db->query("Select it_deduction_detail_id,it_deduction_detail_id,sub_head_name  from it_deduction_rule_detail where it_deduction_id = ".$id.";");
	    return $query->result();
	  }

	public function get_all_it_declaration() {

		   $query = $this->db->query("SELECT ed.financial_year_id,ed.employee_it_declaration_id,itd.sub_head_name,ith.section,fn.fy_name,ed.employee_id,ed.employee_id,ed.financial_year_id,ed.it_deduction_detail_id,ed.reference,ed.amount,ed.active_status,ed.created_by,ed.created_ts,ed.updated_by,ed.updated_ts,e.employee_id,concat(e.employee_code, ' - ', e.first_name, ' ', e.last_name) as employee_name 
FROM employee_it_declaration ed 
inner join financial_year_mst fn ON ed.financial_year_id = fn.financial_year_id 
inner join employee_mst e ON ed.employee_id = e.employee_id 
inner join it_deduction_rule_header ith ON ed.it_deduction_id = ith.it_deduction_id 
inner join it_deduction_rule_detail itd ON ed.it_deduction_detail_id = itd.it_deduction_detail_id;");
  return $query->result();
  		
		}


	public function insertDeduction($financial_year_id,$employee_id,$it_deduction_id,$it_deduction_rule_dlt,$reference,$amount){


	
		$count = count($amount);

		for($i=0; $i<$count; $i++)
		  {	
		

				$query = "insert into " . $this->it_declaration . " (employee_id,financial_year_id,it_deduction_id,it_deduction_detail_id,reference,amount,active_status,created_by,created_ts,updated_by,updated_ts) values ('".$employee_id."','".$financial_year_id."','".$it_deduction_id[$i]."','".$it_deduction_rule_dlt[$i]."','".$reference[$i]."','".$amount[$i]."','001','1',GETDATE(),'1',GETDATE());";
				
				//echo $query;die; 

				$res = $this->db->query($query);
	    }
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}



	public function change_status($id,$status){
		$set = ($status == '1') ? 0 : 1 ;
		$where = [ 'employee_it_declaration_id' => $id ];
		$query = "update employee_it_declaration set active_status=" . $set . " where employee_it_declaration_id=" . $id;
		$res = $this->db->query($query);
		if(!$res) {
			return false;
		} else {
			return true;
		}
	}



	  function editdeclaration($id){
		$query = $this->db->query("select employee_it_declaration_id,employee_id,financial_year_id,it_deduction_id,it_deduction_detail_id,reference,amount,active_status from employee_it_declaration where  employee_it_declaration_id = ".$id);
		return $query->result();
	}

   public function get_declaration_data($id) {
    	    $query = $this->db->query("SELECT ed.financial_year_id,ed.employee_it_declaration_id,ed.it_deduction_id,ed.employee_id,ed.financial_year_id,ed.it_deduction_detail_id,ed.reference,ed.amount,ed.active_status,ed.created_by,ed.created_ts,ed.updated_by,ed.updated_ts  FROM employee_it_declaration ed 
    	    	where ed.employee_it_declaration_id = '".$id."';");
 		return $query->row();
	}



	
	public function editDeduction($financial_year_id,$employee_id,$it_deduction_id,$it_deduction_rule_dlt,$reference,$amount,$edit_id){
		
		$query = $this->db->query("UPDATE employee_it_declaration SET financial_year_id='".$financial_year_id."',employee_id='".$employee_id."',it_deduction_id='".$it_deduction_id."',it_deduction_detail_id='".$it_deduction_rule_dlt."',reference='".$reference."',amount='".$amount."',updated_ts=GETDATE() WHERE employee_it_declaration_id = ".$edit_id);
		
		return $this->db->affected_rows();
	}
	

}
