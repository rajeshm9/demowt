<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function __construct()
    {
		parent::__construct();
		if (!$this->session->logged)
		{
			redirect('/Login');
		}
		$this->load->model('Wallet_model');
		$this->data['schoolName'] = $this->session->schoolName;
		$this->data['userType'] = $this->session->userType;
		
    }

	public function index()
	{	
		$this->data['title'] = 'List Users';
		$this->data['page'] = 'user';
		$this->data['result'] = $this->Wallet_model->listAdminUser();
		$this->load->view('listadminuser', $this->data);
		
	}
	public function NewUser()
	{
		$this->data['title'] = 'Create New Admin User';
		$this->data['page'] = 'user';
		foreach ($this->Wallet_model->listSchool() as $v)
		{
			$tmp[$v->id]  = $v->schoolName;
			
		}
		$this->data['schoolList'] = $tmp;
		$this->load->library('form_validation');

		//$this->form_validation->set_rules('studentno', 'Student Number', 'required|is_uniq[studentInfo.studentno]',array('required'      => 'You have not provided %s.','is_unique'     => 'This %s already exists.'));
		$this->form_validation->set_rules('userName', 'User Name', 'required|is_unique[adminUser.userName]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passwordconf', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('schoolName', 'School Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('addadmin', $this->data);
		}
		else
		{
			$db['userName'] = $this->input->post('userName');
			$db['password'] = do_hash($this->input->post('password'), 'md5');
			$db['schoolId'] = $this->input->post('schoolName');
			$db['status'] = 'A';
			$db['userType'] = 'S';
			$this->Wallet_model->addAdminUser($db);	
			redirect('/Admin/');
			//$this->data['result'] = $this->Wallet_model->listAdminUser();
			//$this->load->view('listadminuser', $this->data);
		}
	}
	
	public function delete($id)
	{
		if ($this->data['userType'] == 'G')
		{
			$this->data['id']	 = $id;
			$this->Wallet_model->deleteAdminUser($this->data);	
			$this->session->set_flashdata('msg','<div class="alert alert-success">User Deleted added successfully</div>');
			redirect('/Admin/');
		}
		else
			show_404();
	}

	public function school()
	{
		$this->data['title'] = 'List Users';
		$this->data['page'] = 'school';
		$this->data['result'] = $this->Wallet_model->listSchool();
		$this->load->view('listschool', $this->data);
	}

	public function NewSchool()
	{
		$this->data['title'] = 'Create School';
		$this->data['page'] = 'school';
		
		$this->load->library('form_validation');

		//$this->form_validation->set_rules('studentno', 'Student Number', 'required|is_uniq[studentInfo.studentno]',array('required'      => 'You have not provided %s.','is_unique'     => 'This %s already exists.'));
		
		$this->form_validation->set_rules('schoolName', 'School Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('addschool', $this->data);
		}
		else
		{
			$db['schoolName'] = $this->input->post('schoolName');
			$db['status'] = 'A';

			$this->Wallet_model->addSchool($db);	
			redirect('/Admin/school');
			//$this->data['result'] = $this->Wallet_model->listAdminUser();
			//$this->load->view('listadminuser', $this->data);
		}
	}
}
