<?php
class Advance_entry_model extends CI_Model {
	protected $adTable = 'employee_loan';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function employee() {
		
		/*$query = $this->db->query("SELECT em.employee_id,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname		 
		  FROM employee_mst em
		  WHERE em.job_type ='G' AND em.approval_status = 'A'
		  ORDER BY em.first_name");*/
		  $query = $this->db->query("SELECT em.employee_id,em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname		 
		  FROM employee_mst em
		  ORDER BY em.first_name");
		//echo $query;die;
		return $query->result();
	}
	public function addloan($employee_id,$paid_date,$deduction_date,$remarks,$type,$amount,$installment,$emi){
		//print_r($emi); exit;
		$user_id = $this->session->user_id;
		$check_advance = $this->db->query("SELECT employee_id FROM employee_loan WHERE paid_date = '".$paid_date."' AND type = '".$type."' AND employee_id= '".$employee_id."' " );
		//echo $aa = "SELECT employee_id FROM employee_loan WHERE paid_date = '".$paid_date."' AND type = '".$type."' AND employee_id= '".$employee_id."' " ; die;
				//echo $check_advance->num_rows(); die;
			$rows = $check_advance->num_rows();
			if($rows > 0)
					{
						
						return false;
					}
					else
					{
						
			$query = $this->db->query("INSERT INTO employee_loan (employee_id,paid_date,deduction_date,remarks,type,amount,installment,emi,balance,created_by) VALUES ('".$employee_id."','".$paid_date."','".$deduction_date."','".$remarks."','".$type."','".$amount."','".$installment."','".$emi."','".$amount."','".$user_id."')");
			
					}
		return true;
		
	}
	
	public function emp_list($employee_id)
	{
		//print_r($employee_id);exit;
		$query = $this->db->query("SELECT employee_loan_id,employee_id,paid_date,
	CASE
    WHEN type = 'a' THEN 'Advance'
    WHEN type = 'o' THEN 'Others'
    WHEN type = 'l' THEN 'Loan'
    ELSE 'Tax/TDS' 
	END as type
    ,amount,installment,emi,isnull(deducted_amount,0) as deducted_amount,isnull(balance,0) balance
    FROM employee_loan WHERE employee_id = ".$employee_id." ");
		
		return $query->result();
	}
	
	public function list($employee_id)
	{
		//print_r($employee_id);exit;
		$query = $this->db->query("SELECT el.employee_loan_id,el.employee_id,el.paid_date,
	CASE
    WHEN type = 'a' THEN 'Advance'
    WHEN type = 'o' THEN 'Others'
    WHEN type = 'l' THEN 'Loan'
    ELSE 'Tax/TDS' 
	END as type
    ,el.amount,el.installment,el.emi,isnull(el.deducted_amount,0) as deducted_amount,
	isnull(el.balance,0) balance,el.active_status,
	em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname
    FROM employee_loan el
	INNER JOIN employee_mst em ON em.employee_id = el.employee_id ORDER BY em.first_name,el.paid_date");
		
		return $query->result();
	}
	
	public function status($id,$status){
        $set = ($status == '1') ? 0 : 1 ;
        $where = [ 'employee_loan_id' => $id ];

        $query = "update " . $this->adTable . " set active_status=" . $set . " where employee_loan_id=" . $id;
        $res = $this->db->query($query);
        if(!$res) {
            return false;
        } else {
            return true;
        }
    }
	
	public function edit_list($id)
	{
		//print_r($employee_id);exit;
		$query = $this->db->query("SELECT el.employee_loan_id,el.employee_id,el.paid_date,el.deduction_date,
	CASE
    WHEN type = 'a' THEN 'Advance'
    WHEN type = 'o' THEN 'Others'
    WHEN type = 'l' THEN 'Loan'
    ELSE 'Tax/TDS' 
	END as type,el.remarks
    ,el.amount,el.installment,el.emi,isnull(el.deducted_amount,0) as deducted_amount,
	isnull(el.balance,0) balance,el.active_status,
	em.first_name +' '+ em.last_name +' - '+ em.employee_code as empname
    FROM employee_loan el
	INNER JOIN employee_mst em ON em.employee_id = el.employee_id 
	WHERE el.employee_loan_id = '".$id."'");
		
		return $query->row();
	}
	
	public function editadvance($id,$remarks,$amount,$installment,$emi){
			/*echo $aa= "UPDATE employee_loan SET amount = '".$amount."',installment = '".$installment."', emi = '".$emi."' WHERE employee_loan_id = '".$id."' "; die; */
			
			$query = $this->db->query("UPDATE employee_loan SET remarks = '".$remarks."', amount = '".$amount."',installment = '".$installment."', emi = '".$emi."' WHERE employee_loan_id = '".$id."' ");
	}
}