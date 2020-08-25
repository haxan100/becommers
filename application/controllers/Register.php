<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Register extends CI_Controller {
	public function __construct()

	{
		parent::__construct();
		$this->load->model('UserModel');

		$this->load->library('form_validation');

		$this->load->helper('url');
	}

public function index()
{
                
}
	public function registerUser()
	{

		$idUser = $this->UserModel->select_max()->result()[0]->id_user == 'NULL'
		? 1
			: substr($this->UserModel->select_max()->result()[0]->id_user, 3, 9);
		if (!$idUser) $idUser = 0;

		$idUser = intval(preg_replace('/\D/', '', $idUser) + 1);
		$newIdUser = 'U' . date('y');
		if ($idUser < 100000000) $newIdUser .= '0';
		if ($idUser < 10000000) $newIdUser .= '0';
		if ($idUser < 1000000) $newIdUser .= '0';
		if ($idUser < 100000) $newIdUser .= '0';
		if ($idUser < 10000) $newIdUser .= '0';
		if ($idUser < 1000) $newIdUser .= '0';
		if ($idUser < 100) $newIdUser .= '0';
		if ($idUser < 10) $newIdUser .= '0';
		$newIdUser .= $idUser;
		// var_dump($newIdUser);die;

		$data = array(
			'id_user' => $newIdUser,
			'nama_lengkap' => $this->input->post('Name'),
			'email'       => $this->input->post('Email'),
			'no_phone'       => $this->input->post('no_phone'),
			'status'       =>0,
			'password'       => md5($this->input->post('password')),
		);

		$register = $this->UserModel->simpan_register($data);

		//cek apakah data berhasil tersimpan
		if ($register) {

			// echo "success";
			$msg = "success";
			$error =  false;
		} else {
			$msg = "Eror";

			$error =  true;
		}
		$json = array(
			'error' => $error,
			'message' => $msg,
		);

		echo json_encode($json);
		exit();
		


	}
        
}
        
    /* End of file  Register.php */
        
                            