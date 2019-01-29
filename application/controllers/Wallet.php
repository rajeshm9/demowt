<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

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
		$this->data['schoolId'] = $this->session->schoolId;
		$this->data['userType'] = $this->session->userType;
		
    }

	public function index()
	{	
		$this->data['title'] = 'List Users';
		$this->data['page'] = 'user';
		$this->data['result'] = $this->Wallet_model->getUser(0, $this->data['schoolId']);
		$this->load->view('listuser', $this->data);
		
	}
	public function User()
	{
		$this->data['title'] = 'List Users';
		$this->data['page'] = 'user';
		$this->data['result'] = $this->Wallet_model->getUser(0, $this->data['schoolId']);
		$this->load->view('listuser', $this->data);
	}
	public function NewUser()
	{
		$this->data['title'] = 'Create New User';
		$this->data['page'] = 'user';
		$this->load->library('form_validation');

		//$this->form_validation->set_rules('studentno', 'Student Number', 'required|is_uniq[studentInfo.studentno]',array('required'      => 'You have not provided %s.','is_unique'     => 'This %s already exists.'));
		$this->form_validation->set_rules('studentno', 'Student Number', 'required');
		$this->form_validation->set_rules('fname', 'Student First Name', 'required');
		$this->form_validation->set_rules('lname', 'Student Last Name', 'required');
		//$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required');
		

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('newuser', $this->data);
		}
		else
		{
			$db['studentno'] = $this->input->post('studentno');
			$db['fname'] = $this->input->post('fname');
			$db['lname'] = $this->input->post('lname');
			$db['grade'] = $this->input->post('grade');
			$db['phone'] = $this->input->post('phone');
			$db['email'] = $this->input->post('email');
			$db['registerIP'] = $this->input->ip_address();	
			$db['status'] = 'A';
			$db['schoolName'] =  $this->data['schoolName'] ;
			$db['schoolId'] =  $this->data['schoolId'] ;

			$this->Wallet_model->addUser($db);	
			redirect('/Wallet/User');
		}
	}
	public function edit($id = 0 )
	{
		$this->data['title'] = 'Edit User';
		$this->data['page'] = 'user';
		

		if ($id > 0 )
		{
		
			$student = $this->Wallet_model->getUserInfo($id, $this->data['schoolId']);
			if (count($student) > 0 )
			{
				$this->data['result'] = $student[0];
				$this->load->view('edit', $this->data);
			}
			else	
				show_404();
		}
		else
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('studentno', 'Student Number', 'required');
			$this->form_validation->set_rules('fname', 'Student First Name', 'required');
			$this->form_validation->set_rules('lname', 'Student Last Name', 'required');
			$this->form_validation->set_rules('grade', 'Student Grade', 'required');
			//$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			//$this->form_validation->set_rules('email', 'Email', 'required');
		
			$this->data['result'] = (object) $this->input->post();
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit', $this->data);
			}
			else
			{
				$db['id'] = $this->input->post('id');
				$db['studentno'] = $this->input->post('studentno');
				$db['fname'] = $this->input->post('fname');
				$db['lname'] = $this->input->post('lname');
				$db['grade'] = $this->input->post('grade');
				$db['phone'] = $this->input->post('phone');
				$db['email'] = $this->input->post('email');
				$db['registerIP'] = $this->input->ip_address();	
				$db['status'] = 'A';

				$this->Wallet_model->updateUser($db);	
				redirect('/Wallet/User');
			}
		}
	}
	public function delete($id)
	{
		$this->data['id']	 = $id;
		$this->Wallet_model->deleteUser($this->data);	
		$this->session->set_flashdata('msg','<div class="alert alert-success">User Deleted added successfully</div>');
		redirect('/Wallet/User');
	}
	public function payment($id)
	{
		$this->data['title'] = 'Payment History';
		$this->data['page'] = 'user';
		$this->data['result'] = $this->Wallet_model->getTxnHistory($id);
		$this->load->view('payment', $this->data);
	}
	public function addMoney($id = 0 )
	{
		$this->data['title'] = 'Add Payment';
		$this->data['page'] = 'user';
		if ($id > 0 )
		{
			$this->data['result'] = $this->Wallet_model->getUser($id,  $this->data['schoolId']);
			$this->load->view('addmoney', $this->data);
		}
		else
		{
			//print_r ($_POST);
			$db['studentId'] = $this->input->post('id');
			$db['amount'] = $this->input->post('amount');
			$db['transType'] = $this->input->post('transType');
			$db['txnDate'] = date('Y-m-d H:i:s');
			$this->Wallet_model->addTransaction($db);
			$this->session->set_flashdata('msg','<div class="alert alert-success">'.$db['amount']." Amount added successfully</div>");

			redirect('/Wallet/User');
		}
	}
	public function addUserMoney()
	{
		$this->data['title'] = 'Add Money';
		$this->data['page'] = 'money';
		$d = $this->Wallet_model->getUser(0, $this->data['schoolId']);
		
		$this->data['result'] = $d;
		$this->load->view('addusermoney', $this->data);	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/Login');
	}
}
