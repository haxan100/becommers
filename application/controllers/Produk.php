<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
		$this->load->model('UserModel');
		$this->load->model('CartModel');


		$this->load->library('form_validation');
		$this->load->helper('url');
	}
public function index()
{
                
}
public function produk()
{
	
	$page = intval($this->input->post('page', true));
	$cari = $this->input->post('cari', true);
	$data = $this->ProdukModel->getProduk($page,$cari);
		echo json_encode(array(
			'status' => true,
			'data' => $data['data'],
			'page' => $data['page']
		));
}
        
}
        
    /* End of file  Produk.php */
        
                            