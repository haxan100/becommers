<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

	public function __construct()

	{
	parent::__construct();
	$this->load->model('ProdukModel');
		$this->load->model('UserModel');

	$this->load->library('form_validation');

	$this->load->helper('url');
}

public function index()
{	
		if(empty($_POST)){			
			$Do = false;	
		}else{
			$Do = true;	
			$sort = $_POST['sort'];
		}		
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
		if($Do){

			$data['produk'] = $this->ProdukModel->getAllProdukPag($config['per_page'],$from, $sort);
		}else{

			$data['produk'] = $this->ProdukModel->getAllProdukPag($config['per_page'],$from );
		}
		// var_dump(count($data['produk']));die;
		$this->load->view('User/Templates/index',$data);
                
}
	public function produk($id_kategori)
{	
	
		$total = $this->ProdukModel->getAllProdukAndKat($id_kategori);

		$config['base_url'] = base_url().'/User/produk/'.$id_kategori;
		$config['total_rows'] = count($total);
		$config['per_page'] = 6;
		$from = $this->uri->segment(4);

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

		$data['produk'] = $this->ProdukModel->getAllProdukKategoriPag($config['per_page'],$from,$id_kategori );
		// var_dump(count($data['produk']));die;
		$this->load->view('User/Templates/index',$data);
                
}
	public function about()
{	
		$this->load->view('User/Templates/Header');
		 $this->load->view('User/Templates/Head');
		 $this->load->view('User/Templates/HeaderNav');
		  $this->load->view('User/Templates/About');
		 //  $this->load->view('User/Templates/Kontent');
		 $this->load->view('User/Templates/Footer');

		// var_dump(count($data['produk']));die;
		// $this->load->view('User/Templates/indexContent',$data);
                
}
public function hubungi()
{
			$this->load->view('User/Templates/Header');
		 $this->load->view('User/Templates/Head');
		 $this->load->view('User/Templates/HeaderNav');
		  $this->load->view('User/Templates/Hubungi');
		 //  $this->load->view('User/Templates/Kontent');
		 $this->load->view('User/Templates/Footer');
	
}






	public function getProduk()
	{
		// var_dump($_POST);die;
		// $search = $this->input->post('search', true);
		$sort = $this->input->post('sort', true);
		// $filter = $this->input->post('filter', true);
		// $page = intval($this->input->post('page', true));
		// $page = 2;
		// var_dump($page);die;
		$hasil = "";
		switch ($sort) {
			case '0':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.harga_awal ASC");
				break;
			case '1':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.qty ASC");
				break;
			case '2':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.nama_produk ASC");
				break;
			case '3':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk( "p.nama_produk DESC");
				break;
			case '4':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.harga ASC");
				break;
			case '5':
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk("p.harga DESC");
				break;
			default:
				$hasil = $this->ProdukModel->getProdukByIdTipeProduk($sort);
				break;
		}
		// var_dump($hasil); die();
		$status = false;
		if (count($hasil) > 0) {
			$status = true;
			$data = $hasil;
			// var_dump($data);die;
		}
		echo json_encode(array(
			'status' => $status,
			'data' => $data
		));
	}

        
}
        
        
                            