<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->model('user/user_model');
		//$users = $this->user_model->get_all_user();
		//echo "<pre>"; print_r($users); echo "</pre>";
		//$this->load->view('welcome_message');
		
		$this->template->write('title', 'Dashboard', TRUE);
        /**
         * if you have any js to add for this page
         */
        $this->template->add_js('assets/js/jquery.min.js');
        $this->template->add_js('assets/js/jquery.ui.custom.js');
        $this->template->add_js('assets/js/bootstrap.min.js');
        $this->template->add_js('assets/js/bootstrap-colorpicker.js');
        $this->template->add_js('assets/js/bootstrap-datepicker.js');
        $this->template->add_js('assets/js/jquery.uniform.js');
        $this->template->add_js('assets/js/select2.min.js');
        $this->template->add_js('assets/js/maruti.js');
        /**
         * if you have any css to add for this page
         */
        $this->template->add_css('assets/css/colorpicker.css');
        $this->template->add_css('assets/css/datepicker.css');
        $this->template->add_css('assets/css/uniform.css');
        $this->template->add_css('assets/css/select2.css');
        $this->template->write_view('content', 'home', '', TRUE);
        $this->template->render();
	}
	public function hello(){
		//echo "Hello";
		//$this->load->view('welcome_message');
		$this->template->write_view('content', 'welcome_message', '', TRUE);
		$this->template->render();
	}
	
	public function test_proc(){
		$this->load->model('test_model');
		echo "<pre>"; print_r($this->test_model->call_test_proc()); echo "</pre>"; exit();
	}
}
