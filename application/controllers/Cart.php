<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Cart extends CI_Controller {

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
public function setBid()
{
		$id_produk = $this->input->post('id_produk', TRUE);
		$harga = $this->input->post('harga', TRUE);
		$qty = $this->input->post('qty', TRUE);
		 $now = date('Y-m-d H:i:s');		 
        $id_user = $this->session->userdata('id_user');
		$tgl = $now;
		$keranjangOld= $this->CartModel->getCartByIdUserAndProduk($id_user,$id_produk);
		// var_dump(count($keranjangOld)>=1);die;
		

		if(count($keranjangOld)>=1){  // jika di keranjang ada produk , maka di updte qty nya
		$qtyOld = $keranjangOld[0]->qty;
		$qtyNew = $qtyOld +$qty;
				$upd  = array(
					'qty' =>$qtyNew ,		
				);
				$this->CartModel->updateCart($upd,$id_produk);

				$msg ="Item Berhasil di Tambah Ke Keranjang";
				$status = true;

		}else{
			$data2 = array(
				'id_produk' => $id_produk,
				'id_user' => $id_user,
				// 'harga' => $harga,
				'qty' => $qty,
				'created_at' => $tgl,
			);
			if($tambahKeranjang = $this->CartModel->AddCart($data2)){
				$msg ="Item Berhasil di Tambah Ke Keranjang";
				$status = true;
			}else{
				$msg ="Item Gagal di Tambah Ke Keranjang";
				$status = false;
			}
		}
		    $data = array(
                'status' => $status,
                'msg' => $msg,
            );
            echo json_encode($data);

}
public function getAllCartByUser()
	{
		$dt = $this->CartModel->data_AllCartByUser($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;		
		$subtotal = 0;
		$status="";
		foreach ($dt['data']->result() as $row) {

			$total = $row->harga * $row->qty;	
			$subtotal += $total;					

			$fields = array($no++);
			$fields[] = '<img src="' . base_url() . 'upload/images/produk/' . $row->foto . '"/>';
			$fields[] = $row->nama_produk . '<br>';
			$fields[] = '<td><button class="btn btn-primary" 					type="button">-</button>

								<input class="formInput" type="text" value="' .$row->qty . '" />
								<button class="btn btn-primary" type="button">+</button></td><br>';


			$fields[] = $row->harga . '<br>';
			$fields[] = $total. '<br>';
			$fields[] = '
        <button class="btn btn-round btn-danger btnHapus" data-id_produk="' . $row->id_produk . '" data-nama_produk="' . $row->nama_produk . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
        
}
        
    /* End of file  Cart.php */
        
                            