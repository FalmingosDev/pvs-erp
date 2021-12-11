<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('clientTabs')) {
    function clientTabs() {
        $CI =& get_instance();
		$html = '';
		$segment_1 = $CI->uri->segment(1, 0);
		$segment_2 = $CI->uri->segment(2, 0);
		$segment_3 = $CI->uri->segment(3, 0);
		$segment_4 = $CI->uri->segment(4, 0);
		
		$links = array(
			//									Add Link												Edit Link
			'client' => '',				//	client/add											|	client/edit/{$client_id}
			'sales_billing' => '',		//	sales_billing/add_sales_billing/{$client_id}		|	client/edit/{$client_id}
			'branch' => '',				//	branch/add/{$client_id}								|	client/edit/{$client_id}
			'billing_costing' => '',	//	billing_costing/add/{$client_id}					|	client/edit/{$client_id}	
			'document_uplode' => ''		//	document_uplode/add_document_uplode/{$client_id}	|	client/edit/{$client_id}
		);
		$is_active = array(
				'client' => '', 'sales_billing' => '', 'branch' => '', 'billing_costing' => '', 'document_uplode' => ''
		);
		
		if($segment_1 == 'client' && $segment_2 == 'add'){
			$client_id = NULL;
		}
		else{
			$client_id = $segment_3;
		}
		
		if($client_id){
			$links = array(
				'client' => 'client/edit/' . $client_id,
				'sales_billing' => 'sales_billing/add_sales_billing/' . $client_id,
				'branch' => 'branch/add/' . $client_id,
				'billing_costing' => 'billing_costing/add/' . $client_id,
				'document_uplode' => 'document_uplode/add_document_uplode/' . $client_id
			);
		}
		
		$is_active[$segment_1] = ' active';
		
		$html = '<nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link' . $is_active['client'] . '" href="' . base_url($links['client']) . '">Client Master</a>
                      <a class="nav-item nav-link' . $is_active['sales_billing'] . '" href="' . base_url($links['sales_billing']) . '">Sales-Billing</a>
                      <a class="nav-item nav-link' . $is_active['branch'] . '" href="' . base_url($links['branch']) . '">Branch Details</a>
                      <a class="nav-item nav-link' . $is_active['billing_costing'] . '" href="' . base_url($links['billing_costing']) . '">Billing-Costing-Sheet</a>
                      <a class="nav-item nav-link' . $is_active['document_uplode'] . '" href="' . base_url($links['document_uplode']) . '">Document-Upload</a>
                    </div>
                  </nav>';
				  //$html.= '<br /> <p> segment_1 : ' . $segment_1 . ' | segment_2 : ' . $segment_2 . ' | segment_3 : ' . $segment_3 . ' | segment_4 : ' . $segment_4 . ' </p>';
		return $html;
    }   
}

if ( ! function_exists('employeeTabs')) {
    function employeeTabs() {
        $CI =& get_instance();
		$html = '';
		$segment_1 = $CI->uri->segment(1, 0);
		$segment_2 = $CI->uri->segment(2, 0);
		$segment_3 = $CI->uri->segment(3, 0);
		$segment_4 = $CI->uri->segment(4, 0);
		
		$links = array(
			//									Add Link												Edit Link
			'employee' => '',				//	employee/add								|	employee/edit/{$employee_id}
			'employee_details' => '',		//	employee_details/add/{$employee_id}			|	employee_details/edit/{$employee_id}
			'employee_documents' => ''		//	employee_documents/upload/{$employee_id}	|	employee_documents/upload/{$employee_id}
		);
		$is_active = array(
				'employee' => '', 'employee_details' => '', 'employee_documents' => ''
		);
		
		if($segment_1 == 'employee' && $segment_2 == 'add'){
			$employee_id = NULL;
		}
		else{
			$employee_id = $segment_3;
		}
		
		if($employee_id){
			$links = array(
				'employee' => 'employee/edit/' . $employee_id,
				'employee_details' => 'employee_details/add/' . $employee_id,
				'employee_documents' => 'employee_documents/upload/' . $employee_id
			);
		}
		
		$is_active[$segment_1] = ' active';
		
		$html = '<nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link' . $is_active['employee'] . '" href="' . base_url($links['employee']) . '">Employee Management</a>
                      <a class="nav-item nav-link' . $is_active['employee_details'] . '" href="' . base_url($links['employee_details']) . '">Details</a>
                      <a class="nav-item nav-link' . $is_active['employee_documents'] . '" href="' . base_url($links['employee_documents']) . '">Document Upload</a>
                    </div>
                  </nav>';
				  //$html.= '<br /> <p> segment_1 : ' . $segment_1 . ' | segment_2 : ' . $segment_2 . ' | segment_3 : ' . $segment_3 . ' | segment_4 : ' . $segment_4 . ' </p>';
		return $html;
    }   
}

if ( ! function_exists('salary_head_dropdown')){
    function salary_head_dropdown($name, $selected = NULL, $extra = ''){
        $extra = _attributes_to_string($extra);
        
        $dd_html = '<select name="' . $name . '"'.$extra.'>';
        //$selectoption = '<option>Select Salary Head</option>';
        $CI =& get_instance();
        $query = $CI->db->query("Select head_id,head_name,isnull(max_prcntg,0) max_prcntg,isnull(min_prcntg, 0) min_prcntg from salary_head_mst where active_status=1 and head_id != 1 ORDER BY head_name;");
        $rs_heads = $query->result_array();

        foreach($rs_heads as $value){
        	$selected_str = ($value['head_id'] == $selected) ? ' selected="selected"' : '';
        	$dd_html.= '<option value="' . $value['head_id'] . '" data-max="' . $value['max_prcntg'] . '" data-min="' . $value['min_prcntg'] . '"' . $selected_str . '>' . $value['head_name'] . '</option>';
        }
        $dd_html.= '</select>';
        return $dd_html;
    }   
}

if ( ! function_exists('user_menu')){
    function user_menu(){
        $CI =& get_instance();
        $query = $CI->db->query("EXEC user_menu_list_proc @p_user_id = '" . $CI->session->user_id . "', @p_base_url = '" . base_url() . "', @p_applicatiom_type = 'HR';");
        $rs = $query->row();
        return $rs->menu_item;
    }   
}

if ( ! function_exists('escape_str'))
{
    function escape_str($str = '')
    {
        return str_replace("'", "''", $str);
    }   
}

if ( ! function_exists('check_uri_permission'))
{
    function check_uri_permission($uri = '', $action = '')
    {
        $CI =& get_instance();
        $query = $CI->db->query("SELECT [dbo].[check_uri_permission_func] ('" . $CI->session->user_id . "', '" . $uri . "', '" . $action . "') AS has_permission;");
        $rs = $query->row();
		return $rs->has_permission;
        /*if($rs->has_permission != 1){
			$this->session->set_flashdata('error_msg', 'You have no permission on this page');
			redirect(base_url());
		}*/
    }   
}

if ( ! function_exists('test_method'))
{
    function test_method($var = '')
    {
        return $var;
    }   
}

function pr($print)
{
	echo "<pre>";
	print_r($print);
	echo "</pre>";
	die;
}
