<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Transaksi extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('ProdukModel');
	$this->load->model('UserModel');
	$this->load->model('TransaksiModel');

	$this->load->model('AdminModel', 'admin');
	$this->load->library('form_validation');

	$this->load->helper('url');
}

public function index(){
		
					
}
public function hapusTransaksi()
{
	// var_dump($_POST);die;
	$id_transaksi = $this->input->post('id_transaksi', TRUE);
	$data = $this->TransaksiModel->getTransaksiById($id_transaksi);
	$idProd = $this->TransaksiModel->getIdProdukFromDetailTransaksiById($id_transaksi);

	$status = false;
	$message = 'Gagal menghapus Transaksi!';
	if (count($data) == 0) {
		$message .= '<br>Tidak terdapat Transaksi yang dimaksud.';
	} else {
		foreach ($idProd as $key ) {
				$qtyOld = $this->ProdukModel->getProdukByID($key->id_produk)[0]->qty;
				$qtyNew = $qtyOld + $key->qty;

				$upd  = array(
					'qty' => $qtyNew,
				);
				$this->ProdukModel->updateQTYbyID($upd, $key->id_produk);				
			}
			// die;

			$this->TransaksiModel->HapusTransaksi($key->id_transaksi);
			$this->TransaksiModel->HapusDetailTransaksi($key->id_transaksi);
		$status = true;
		$message = 'Berhasil menghapus Transaksi: <b>' . $data[0]->kode_transaksi . '</b>';
	}
	echo json_encode(array(
		'status' => $status,
		'message' => $message,
	));
}
        
}
        
    /* End of file  Transaksi.php */
        
                            