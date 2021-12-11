<?php
class Salary_structure_model extends CI_Model {
	
	protected $table_name = 'employee_mst';
	//protected $client_contact = 'client_contact_mst';

	
	public function __construct() {
		parent::__construct();
	}

	public function EmpDetails($id){
		
		$query = $this->db->query("Select em.employee_id, em.employee_code, em.first_name, em.last_name, em.designation_id, dm.desig_name, ISNULL(em.el, '0') el,ISNULL(em.sl, '0') sl,ISNULL(em.cl, '0') cl, ISNULL(em.opening_el, '0') opening_el, ISNULL(em.opening_sl, '0') opening_sl, ISNULL(em.opening_cl, '0') opening_cl from employee_mst em 
			LEFT JOIN designation_mst dm ON dm.desig_id = em.designation_id WHERE em.employee_id = ".$id);
		return $query->row();
	}
	
	public function get_all_department()
	{
		$query = $this->db->query("Select dept_id,dept_name from department_mst where active_status=1 ORDER BY dept_name;");
		return $query->result();
	}

	public function get_all_desig()
	{
		$query = $this->db->query("Select desig_id,desig_name from designation_mst where active_status=1 ORDER BY desig_name ;");
		return $query->result();
	}

	public function insertSalary($dept_id, $employee_id, $eff_date, $gross_pay, $pf_wage, $ot_rate, $email, $monthly_ctc, $annual_ctc, $head_id, $type_id, $rate, $basis, $limit, $criteria, $periodicity, $salary_head_amnt, $designation_id, $applicable_for)
	{
		$tot_head = count($head_id);
		$detail_data = '';
		$increment_flag = 0;
		if(in_array('I', $applicable_for)){
			$increment_flag = 1;
		}
		$promotion_flag = 0;
		if(in_array('P', $applicable_for)){
			$promotion_flag = 1;
		}
		
		for($i=0; $i<$tot_head; $i++)
		{
			$detail_data .= $head_id[$i].'|~|'.$type_id[$i].'|~|'.$rate[$i].'|~|'.$basis[$i].'|~|'.$limit[$i].'|~|'.$criteria[$i].'|~|'.$periodicity[$i].'|~|'.$salary_head_amnt[$i].'|#|';
		}
		
		$detail_data = rtrim($detail_data, "|#|");
		//print_r($detail_data);die;

		$user_id = $this->session->user_id;
		$final_eff_date = date("Y-m-d", strtotime($eff_date));

		$query = $this->db->query("EXEC add_salarystructure_proc @p_dept_id = '".$dept_id."', @p_employee_id = '".$employee_id."', @p_designation_id = '".$designation_id."', @p_eff_date = '".$final_eff_date."', @p_gross_pay = '".$gross_pay."' ,@p_pf_wage = '".$pf_wage."' , @p_ot_rate = '".$ot_rate."',@p_email = '". $email ."',@p_monthly_ctc = '". $monthly_ctc ."', @p_annual_ctc = '". $annual_ctc ."', @p_user_id='". $user_id ."', @p_detail_data = '". $detail_data."', @p_increment_flag = '". intval($increment_flag)."', @p_promotion_flag = '". intval($promotion_flag)."'");

		
		return $query;
	}

		public function checkEmployee($eff_date,$employee_id){
			
			$condition = '';
			if(!empty($employee_id)){
				$condition = " AND employee_id = '" . $employee_id . "'";
			}
			$check_emp = $this->db->query("select salary_structure_id from staff_salary_structure_header where effective_date='". $eff_date . "'". $condition);
			//echo $this->db->last_query();die;
			$rows = $check_emp->num_rows();

			if($rows > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function editcheckEmployee($eff_date,$employee_id,$salary_structure_id){
			
			$condition = '';
			if(!empty($salary_structure_id)){
				$condition = " AND salary_structure_id != '" . $salary_structure_id . "'";
			}
			$check_emp = $this->db->query("select salary_structure_id from staff_salary_structure_header where effective_date='". $eff_date . "' AND employee_id = '" . $employee_id . "'". $condition);
			//echo $this->db->last_query();die;
			$rows = $check_emp->num_rows();

			if($rows > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function EmpSalary($employee_id)
		{
			$query = $this->db->query("SELECT sh.employee_id,sh.salary_structure_id,sh.effective_date,sh.gross_pay,dm.dept_name,dsm.desig_name,sh.monthly_ctc,sh.annual_ctc 
			from staff_salary_structure_header sh 
			left join department_mst dm on sh.department_id = dm.dept_id  
			left join employee_mst em on sh.employee_id=em.employee_id 
			left join designation_mst dsm on sh.designation_id=dsm.desig_id
			where sh.employee_id =". $employee_id);
			return $query->result();
		}

		public function editSalary($salary_structure_id){
			$qry = $this->db->query("SELECT sh.salary_structure_id,sh.employee_id,sh.department_id,sh.effective_date,sh.gross_pay,sh.pf_wage,sh.ot_rate,em.first_name,em.last_name,em.employee_code,dm.dept_name,dsm.desig_name,ISNULL(em.el, '0') el,ISNULL(em.sl, '0') sl,ISNULL(em.cl, '0') cl,ISNULL(em.opening_el, '0') opening_el,ISNULL(em.opening_sl, '0') opening_sl,ISNULL(em.opening_cl, '0') opening_cl,sh.email,sh.monthly_ctc,sh.annual_ctc, sh.incremenr_flag, sh.promotion_flag from staff_salary_structure_header sh inner join employee_mst em on sh.employee_id=em.employee_id inner join department_mst dm on sh.department_id=dm.dept_id inner join designation_mst dsm on em.designation_id=dsm.desig_id  where sh.active_status=1 and sh.salary_structure_id=".$salary_structure_id);

			//SELECT e.employee_id, ISNULL(e.employee_code, '') AS employee_code, CONCAT(e.first_name, ' ', e.last_name) AS employee_name, e.dob, e.doj, e.approval_status, ISNULL(ed.employee_detail_id, 0) employee_detail_id, ISNULL(q.qualification_name, '') qualification, ISNULL(ed.gun_license_expiry_date, '') gun_license_expiry_date, ISNULL(ed.driving_license_renewal_date, '') driving_license_renewal_date, ISNULL(ed.accidental_contact_name, '') accidental_contact_name, ISNULL(ed.accidental_contact_no, '') accidental_contact_no, dm.desig_name,max(sh.salary_structure_id) FROM employee_mst e LEFT JOIN employee_detail_mst ed ON e.employee_id = ed.employee_id LEFT JOIN staff_salary_structure_header sh ON sh.employee_id=e.employee_id LEFT JOIN qualification_mst q ON q.qualification_id = ed.qualification_id LEFT JOIN designation_mst dm ON dm.desig_id = e.designation_id WHERE e.job_type='G' AND 1 = 1 ORDER BY e.first_name, e.last_name;
			return $qry->row();
			
		}

		public function editSalDetail($salary_structure_id){
			$qry = $this->db->query("select sd.salary_structure_detail_id,sd.salary_head_id,sd.type,sd.rate,sd.basis,sd.limit,sd.criteria      ,sd.periodicity,shm.max_prcntg,shm.min_prcntg from staff_salary_structure_detail sd left join salary_head_mst shm on shm.head_id=sd.salary_head_id where sd.active_status=1 and sd.salary_structure_id=".$salary_structure_id);
			//echo $this->db->last_query();die;
			return $qry->result_array();
			
		}

		public function get_city($state_id) {
		$query = $this->db->query("Select city_id,city_name from city_mst where state_id='". $state_id ."' and active_status=1 ORDER BY city_name;");
		return $query->result();
	}

	public function UpdateSalaryStructure($salary_structure_id,$dept_id,$employee_id,$eff_date,$gross_pay,$pf_wage,$ot_rate,$email,$monthly_ctc,$annual_ctc,$detail_id,$head_id,$type_id,$rate,$basis,$limit,$criteria,$periodicity,$salary_head_amnt, $designation_id, $applicable_for)
	{
		$tot_head = count($head_id);
		$detail_data = '';
		
		for($i=0; $i<$tot_head; $i++)
		{
			$detail_data .= $detail_id[$i].'|~|'.$head_id[$i].'|~|'.$type_id[$i].'|~|'.$rate[$i].'|~|'.$basis[$i].'|~|'.$limit[$i].'|~|'.$criteria[$i].'|~|'.$periodicity[$i].'|~|'.$salary_head_amnt[$i].'|#|';
		}
		
		$detail_data = rtrim($detail_data, "|#|");
		//print_r($detail_data);die;
		$increment_flag = 0;
		if(in_array('I', $applicable_for)){
			$increment_flag = 1;
		}
		$promotion_flag = 0;
		if(in_array('P', $applicable_for)){
			$promotion_flag = 1;
		}

		//print_r($detail_data);die;

		$user_id = $this->session->user_id;
		$final_eff_date = date("Y-m-d", strtotime($eff_date));

		$query = $this->db->query("EXEC edit_salarystructure_proc @p_salary_structure_id = '". $salary_structure_id ."', @p_dept_id = '".$dept_id."', @p_employee_id = '".$employee_id."', @p_designation_id = '".$designation_id."', @p_eff_date = '".$final_eff_date."', @p_gross_pay = '".$gross_pay."' ,@p_pf_wage = '".$pf_wage."' , @p_ot_rate = '".$ot_rate."',@p_email = '". $email."',@p_monthly_ctc = '". $monthly_ctc ."', @p_annual_ctc = '". $annual_ctc ."',@p_user_id='". $user_id ."', @p_detail_data = '". $detail_data."', @p_increment_flag = '". intval($increment_flag)."', @p_promotion_flag = '". intval($promotion_flag)."'");

		//echo $this->db->last_query();die;

		return $query;
	}
	
	public function getClientName($id){
		$query = $this->db->query("Select client_id, client_code, client_name, location_type from client_mst WHERE client_id = ".$id);
		return $query->row();
	}

}

