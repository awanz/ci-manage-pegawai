<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function login($user, $pass) // function untuk login cek user dan pass
	{
		$ceklogin = $this->db->get_where('users', array('username'=> $user, 'password'=>$pass));
		if($ceklogin->row_array() > 0){
			return 1; //jika user dan pass cocok
		}else{
			return 0; //jika user dan pass tidak cocok
		}
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */