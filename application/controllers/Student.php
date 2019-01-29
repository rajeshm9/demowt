<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
			//redirect('/Student/Login');
		}
		$this->load->model('Wallet_model');
		$this->data['schoolName'] = $this->session->schoolName;
		$this->data['userType'] = $this->session->userType;
		$this->data['id'] = $this->session->id;
		$this->data['schoolId'] = $this->session->schoolId;
		$this->data['displayname'] = $this->session->lname.", ".$this->session->fname;
		$this->load->model('Wallet_model');
		
    }

	public function index()
	{	
		show_404();
	}
	public function User()
	{
		$this->data['title'] = 'List Users';
		$this->data['page'] = 'user';
		//$student = $this->Wallet_model->getUserInfo($this->data['id'],$this->data['schoolId']);
		
		if (null !== $this->input->post('update'))
		{
			$db['id'] = $this->data['id'];
			$db['phone'] = $this->input->post('phone');
			$db['email'] = $this->input->post('email');
			$db['jacket'] = $this->input->post('jacket');

			$this->Wallet_model->updateUser($db);	
			redirect('/Student/User');
		}
		
		$student = $this->Wallet_model->getUser($this->data['id'], $this->data['schoolId']);
		if (count($student) > 0 )
		{
			$this->data['result'] = $student;
			$this->load->view('student', $this->data);
		}

		
		
	}
	public function payment()
	{
		$this->data['title'] = 'Payment History';
		$this->data['page'] = 'money';
		$this->data['result'] = $this->Wallet_model->getTxnHistory($this->data['id']);
		$this->load->view('payment', $this->data);
	}
	public function Login()
	{
		$data['title'] = 'List Student';
		$data['page'] = 'studentlogin';
		$data['actionurl'] = 'Login';
		$data['heading'] ='Student Login';
	
		if ($this->input->post('user') != null )
		{
			$user = $this->input->post('user');
			$pass = $this->input->post('password');
			$db = $this->Wallet_model->validateStudentLogin($user, $pass);
			if (count($db)> 0 )
			{
				$db = $db[0];
				
				$sess['logged'] = true;
				$sess['id'] = $db->id;
				$sess['studentno'] = $db->studentno;
				$sess['fname'] = $db->fname;
				$sess['lname'] = $db->lname;
				$sess['userType'] = 'U';
				$sess['schoolId'] = $db->schoolId;
				$this->session->set_userdata($sess);	
				redirect('/Student/user');
								
			}
			$data['error'] ='Invalid User or Password';
			
		}
		$this->load->view('login', $data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/Student/Login');
	}

	public function guest()
	{
		$this->data['title'] = 'List Guest';
		$this->data['page'] = 'guest';
		$this->data['result'] = $this->Wallet_model->getEvent($this->data['id']);
		$this->load->view('listguest', $this->data);
	}
	public function addguest()
	{
		$this->data['title'] = 'List Guest';
		$this->data['page'] = 'guest';
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('event', 'Event Name', 'required');
		$this->form_validation->set_rules('guest', 'Guest Name', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('guest', $this->data);
		}
		else
		{
			$db['event'] = $this->input->post('event');
			$db['guest'] = $this->input->post('guest');
			$db['studentId'] = $this->input->post('studentId');
			$db['schoolId'] = $this->data['schoolId'];
			
			$this->Wallet_model->addEvent($db);	
			redirect('/Student/guest');
			//$this->data['result'] = $this->Wallet_model->listAdminUser();
			//$this->load->view('listadminuser', $this->data);
		}

	}
}
