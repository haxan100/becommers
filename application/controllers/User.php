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
		$total = $this->ProdukModel->getAllProduk();


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

		$data['produk'] = $this->ProdukModel->getAllProdukPag($config['per_page'],$from);
		// var_dump(count($data['produk']));die;
		$this->load->view('User/Templates/index',$data);
	
                
}
        
}
        
        
                            