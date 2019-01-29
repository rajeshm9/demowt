<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->model('Wallet_model');
		
    }

	public function index()
	{	
		$data['title'] = 'List Users';
		$data['page'] = 'user';
		$data['actionurl'] = 'Login';
		$data['heading'] ='Admin Login';
		if ($this->input->post('user') != null )
		{
			$user = $this->input->post('user');
			$pass = do_hash($this->input->post('password'), 'md5');
			$db = $this->Wallet_model->validateLogin($user, $pass);
			if (count($db)> 0 )
			{
				$db = $db[0];
				
				$sess['logged'] = true;
				$sess['id'] = $db->id;
				$sess['userName'] = $db->userName;
				$sess['userType'] = $db->userType;

				if ($db->userType == 'S')
				{
					$sess['schoolId'] = $db->schoolId;
					$sess['schoolName'] = $db->schoolName;
					$this->session->set_userdata($sess);

					redirect('/Wallet/user');
				}
				else
				{
					$sess['schoolId'] = $db->schoolId;
					$sess['schoolName'] = $db->schoolName;
					$this->session->set_userdata($sess);	
					redirect('/Admin/');
				}
				
			}
			$data['error'] ='Invalid User or Password';
			
		}
		
		$this->load->view('login', $data);
		
	}
	
}
