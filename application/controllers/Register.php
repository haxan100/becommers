<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Register extends CI_Controller {
	public function __construct()

	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('ProdukModel');

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
public function loginUser()
{
	$email =$this->input->post('LEmail');
	$password =md5($this->input->post('LPassword'));
	$cekUser  = $this->UserModel->getUserByEmailPass($email,$password);
	
	// var_dump($cekUser, $cekUser>0);
	if(count($cekUser)>0){

		$user= $cekUser[0];
		// var_dump($cekUser);
		$cekStatus = $user->status;
		if($cekStatus==0){			
			$error =true;
			$msg="User Belum Aktif, Mohon Tunggu Sesaat";
		}else if($cekStatus==2){
			
			$error =true;
			$msg="User Telah Di Banned!";

		}else{
			$error =false;
			$msg="Berhasil Login";

			$newdata = array(
			'username'  =>$user->nama_lengkap,
			'email'     => $user->email,
			'id_user'     => $user->id_user,
			'no_phone'     => $user->no_phone,
			
			'login_user' => TRUE
						);
				$this->session->set_userdata($newdata);

		}

	}else{
		$error =true;
		$msg="Email Dan Password salah ";

	}


		$json = array(
			'error' => $error,
			'message' => $msg,
		);

		echo json_encode($json);
		exit();

}
public function logout()
{
// var_dump($_SESSION);
	$cari= $this->input->post('Search');
		if(!empty($cari)){
			$total = $this->ProdukModel->getAllProdWSeacrh($cari);
			$ada=true;

			}else{

			$total = $this->ProdukModel->getAllProduk();
			$ada=false;

			}

	
		$config['base_url'] = base_url().'/User/index';
		$config['total_rows'] = count($total);
		$config['per_page'] = 6;
		$from = $this->uri->segment(3);

		$config['display_pages'] = TRUE;
		$config['use_page_numbers'] = TRUE;

		//Encapsulate whole pagination 
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		//First link of pagination
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>>';
		$config['first_tag_close'] = '</li>';

		//Customizing the “Digit” Link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		//For PREVIOUS PAGE Setup
		$config['prev_link'] = 'prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		//For NEXT PAGE Setup
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		//For LAST PAGE Setup
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		//For CURRENT page on which you are
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);

		$data['page'] = $this->pagination->create_links();
		if($ada){
			$data['produk'] = $this->ProdukModel->getAllProdukPagCari($config['per_page'],$from, $cari );
		}else{
			$data['produk'] = $this->ProdukModel->getAllProdukPag($config['per_page'],$from );
		}
		// var_dump(count($data['produk']));die;
		$this->session->sess_destroy();
		$this->load->view('User/Templates/index',$data);

		return redirect('user'); 
                

	# code...
}


        
}
                            