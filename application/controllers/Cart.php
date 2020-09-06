<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Cart extends CI_Controller {

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
                
}
public function setBid()
{
		$id_produk = $this->input->post('id_produk', TRUE);
		$harga = $this->input->post('harga', TRUE);
		$qty = $this->input->post('qty', TRUE);
		 $now = date('Y-m-d H:i:s');		 
        $id_user = $this->session->userdata('id_user');
		$tgl = $now;
		// var_dump($id_user);die;


		$data2 = array(
			'id_produk' => $id_produk,
			'id_user' => $id_user,
			// 'harga' => $harga,
			'qty' => $qty,
			'created_at' => $tgl,
		);
		if($tambahKeranjang = $this->UserModel->AddCart($data2)){
			$msg ="Item Berhasil di Tambah Ke Keranjang";
			$status = true;
		}else{
			$msg ="Item Gagal di Tambah Ke Keranjang";
			$status = false;


		}
		    $data = array(
                'status' => $status,
                'msg' => $msg,
            );
            echo json_encode($data);

}
        
}
        
    /* End of file  Cart.php */
        
                            