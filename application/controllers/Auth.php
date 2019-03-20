<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		redirect('auth/login','refresh');
	}

	public function login(){
		$username = $this->session->userdata('username');
		$data['username']=$username;

		if(isset($data['username'])){
			redirect('dashboard','refresh');
        }else{
        	if(isset($_POST['submit']))
			{
				//proses login
				$user = $this->input->post('username');
				$pass = $this->input->post('password');
				$pass = md5($pass);
				
				$login = $this->admin_model->login($user,$pass);

				if($login == 1)
				{
					$this->session->set_userdata('username', $user);
					redirect('dashboard');
				}
				else
				{
					$this->load->view('login');
				}
			}
			else
			{
				$this->load->view('login');
			}
        }
	}
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */