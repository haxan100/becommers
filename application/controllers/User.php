<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

	public function __construct()

	{
	parent::__construct();
	$this->load->model('ProdukModel');

	$this->load->library('form_validation');

	$this->load->helper('url');
}

public function index()
{

	$data['produk'] = $this->ProdukModel->getAllProduk();
	$this->load->view('User/Templates/index',$data);
	
                
}
        
}
        
        
                            