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
	$data = $this->ProdukModel->data_Allproduk(2);
// var_dump($data['data']->result());die;
$data = $data['data']->result();
		echo json_encode(array(
			'status' => true,
			'data' => $data
		));
}
        
}
        
    /* End of file  Produk.php */
        
                            