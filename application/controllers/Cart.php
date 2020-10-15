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
	// var_dump($_POST);die;
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
			$subtotal += intVal($total);					

			$fields = array($no++);
			$fields[] = '<img src="' . base_url() . 'upload/images/produk/' . $row->foto . '"/>';
			$fields[] = $row->nama_produk . '<br>';
			$fields[] = '<td><button class="btn btn-primary btnMinus" data-id_keranjang="' . $row->id_keranjang . '"					type="button">-</button>

								<input class="formInput TexMasuk" type="text" data-id_keranjang="' . $row->id_keranjang . '" value="' .$row->qty . '" />


					<button class="btn btn-primary btnPlus" data-id_keranjang="' . $row->id_keranjang . '"	 type="button">+</button></td><br>';


			$fields[] = $this->formatUang(intVal($row->harga)) . '<br>';
			$fields[] = $this->formatUang(intVal($total));
			// var_dump(intVal($row->harga));

			$fields[] = '
        <button class="btn btn-round btn-danger btnHapus" data-id_keranjang="' . $row->id_keranjang . '"	 data-nama_produk="' . $row->nama_produk . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
}
public function updateQtyCart()
{
	
		$id_keranjang = $this->input->post('id_keranjang', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$now = date('Y-m-d H:i:s');		 
		$id_user = $this->session->userdata('id_user');
		$tgl = $now;
		$stat = $this->input->post('stat', TRUE);

		$keranjangOld= $this->CartModel->getCartByIdUserAndIdKeranj($id_user,$id_keranjang);
		$qtyOld = $keranjangOld[0]->qty;

		if($stat){ // jika true maka akan bertambah
				$qtyNew = $qtyOld +1;
		}else{  // jika false maka akan berkurang
			// var_dump($qtyOld);die;
			if($qtyOld==1){
				$msg = "Item Minimal 1";
				$status = false;

				$data = array(
					'status' => $status,
					'msg' => $msg,
				);
				echo json_encode($data);
				die;
			}else{

				$qtyNew = $qtyOld -1;
			}
		}			

		$upd  = array(
			'qty' =>$qtyNew ,		
		);

		$this->CartModel->updateCart($upd,$id_keranjang);

		$msg ="Item Berhasil di Tambah Ke Keranjang";
		$status = true;
		
			    $data = array(
                'status' => $status,
                'msg' => $msg,
            );
            echo json_encode($data);
}
public function hapusQtyCart()
{
	// var_dump($_POST);die;
	
		$id_keranjang = $this->input->post('id_keranjang', TRUE);
		$status = $this->CartModel->HapusCart($id_keranjang);
		if($status){
			$msg ="Item Berhasil Dihapus Dari Keranjang";
			$status = true;
		}else {
				$msg ="Item Gagal Dihapus Dari Keranjang";
				$status = false;
		}
		
			    $data = array(
                'status' => $status,
                'msg' => $msg,
            );
            echo json_encode($data);
}
	public function updateCartByQTY()
	{

		$id_keranjang = $this->input->post('id_keranjang', TRUE);
		$qty = $this->input->post('qty', TRUE);
		if ($qty <= 0) {
			$qty = 1;
		}
		$now = date('Y-m-d H:i:s');
		$id_user = $this->session->userdata('id_user');
		$tgl = $now;
		$stat = $this->input->post('stat', TRUE);
		$upd  = array(
			'qty' => $qty,
		);

		if($this->CartModel->updateCart($upd, $id_keranjang)){

			$msg = "Item Berhasil di Di Ubah";
			$status = true;
		}


		$data = array(
			'status' => $status,
			'msg' => $msg,
		);
		echo json_encode($data);
	}
	public function formatUang($str, $withRp = 0)
	{
		return $withRp == 1
			? 'Rp. ' . number_format($str, 0, '.', ',')
			: number_format($str, 0, '.', ',');
	}
	function generateRandomString($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	 $tgl = date('Y');
	 
	// var_dump($tgl);die;

	
    return "TR_".$tgl.$randomString;
}
	public function setPayment()
	{ 
	 	$now = date('Y-m-d H:i:s');
		$ran = $this->generateRandomString();
		// var_dump($ran);die;
        $id_user = $this->input->post('id_user', true);
        $alamat = $this->input->post('alamat', true);
        $provinsi = $this->input->post('provinsi', true);
        $kota = $this->input->post('kota', true);
        $kurir = $this->input->post('kurir', true);
        $kode_pos = $this->input->post('kode_pos', true);
        $bank = $this->input->post('bank', true);
        $ongkir = $this->input->post('ongkir', true);
		$total = $this->input->post('total', true);
		
		$tgl = $now;
		// var_dump($kode_pos);die;
		// var_dump(empty($alamat) or empty($provinsi) or empty($kota) or empty($kurir) or empty($kode_pos) or empty($bank));die;

		$dataAlamat = array(
			'alamat' => $alamat,
			'provinsi' => $provinsi,
			'kota' => $kota,
			'kode_pos' => $kode_pos,
			'created_at' => $tgl,	
		);



		if(empty($alamat) or empty($provinsi) or empty($kota) or empty($kurir) or empty($kode_pos) or empty($bank) ){
				$status = false;
               $msg = "Harap Di Isi Semua";
		}else{
				$id_alamat = $this->CartModel->AddAlamat($dataAlamat);
				
				$dataTransaksi = array(
				'id_user' => $id_user,
				'id_alamat' => $id_alamat,
				'id_method' => $bank,
				'bayar' => $total,
				'ongkir' => $ongkir,
				'jumlah' => $ongkir + $total,	
				'kode_transaksi' => $ran,	
			);

	
			$id_transaksi = $this->CartModel->AddTransaksi($dataTransaksi);
		$cartUser=$this->CartModel->getCartByIdUser($id_user);
			// var_dump($cartUser);
			foreach ($cartUser as $key ) {
		
				$dataDetailTransaksi = array(
					'id_transaksi' => $id_transaksi,
					'id_user' =>  $key->id_user,
					'id_produk' =>  $key->id_produk,
					'qty' =>  $key->qty,
				);
			// echo $key->id_produk;
			$this->CartModel->AddDetailTransaksi($dataDetailTransaksi);

			$this->CartModel->HapusCart($key->id_keranjang);

			}




			$status = true;
            $msg = "Harap tunggu, anda akan dialihkan ke halaman pembayaran";
			
		}


		    $data = array(
                'status' => $status,
                'msg' => $msg,
			);
			
            echo json_encode($data);
            die();


	}




        
}
        
                            