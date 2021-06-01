<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends MY_Controller {

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
	
		if(empty($_SESSION['id_user'])){
			$data['jml']=0;
		}else{
			$id_user = $_SESSION['id_user'];
		$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			// var_dump($jml);
			$data['jml']=$jml;
		}	
	// var_dump($_SESSION);
	$cari= $this->input->post('Search');
		if(!empty($cari)){
			$total = $this->ProdukModel->getAllProdWSeacrh($cari);
			$ada=true;
			}else{
			$total = $this->ProdukModel->getAllProduk();
			$ada=false;
			}

		$config['base_url'] = base_url() . '/User/index';
		$config['total_rows'] = count($total);
		$config['per_page'] = 6;

		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config["uri_segment"] = 3;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if($ada){
			$data['produk'] = $this->ProdukModel->getAllProdukPagCari($config['per_page'],$data['page'], $cari );
		}else{
			$data['produk'] = $this->ProdukModel->getAllProdukPag($config['per_page'],$data['page'] );
		}
		// var_dump(count($data['produk']));die;
		$this->load->view('User/Templates/Index',$data);
                
}
	public function produk($id_kategori="")
{	
		// var_dump($_POST);die;
		// var_dump($cari);die;
		if(empty($_SESSION['id_user'])){
			$data['jml']=0;
		}else{
			$id_user = $_SESSION['id_user'];
		$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			// var_dump($jml);
			$data['jml']=$jml;
		}
		

		if(empty($id_kategori)){
			
		$total = $this->ProdukModel->getAllProduk();
		$config['base_url'] = base_url().'/User/produk/';
		$kosong=true;


		} else{

			$total = $this->ProdukModel->getAllProdukAndKat($id_kategori);
			$config['base_url'] = base_url().'/User/produk/'.$id_kategori;
			$kosong=false;

		}
	

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
		if($kosong){
			
			$data['produk'] = $this->ProdukModel->getAllProdukPag($config['per_page'],$from );

		}else{

			$data['produk'] = $this->ProdukModel->getAllProdukKategoriPag($config['per_page'],$from,$id_kategori );
		}

		// var_dump(count($data['produk']));die;
		$this->load->view('User/Templates/Index',$data);
                
}
	public function about()
{	
	
		if(empty($_SESSION['id_user'])){
			$data['jml']=0;
		}else{
			$id_user = $_SESSION['id_user'];
			$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			// var_dump($jml);
			$data['jml']=$jml;
		}
		$this->load->view('User/Templates/Header');
		 $this->load->view('User/Templates/Head');
		 $this->load->view('User/Templates/HeaderNav' ,$data);
		  $this->load->view('User/Templates/About');
		 //  $this->load->view('User/Templates/Kontent');
		 $this->load->view('User/Templates/Footer');

		// var_dump(count($data['produk']));die;
		// $this->load->view('User/Templates/IndexContent',$data);
                
}
public function hubungi()
{
			if(empty($_SESSION['id_user'])){
			$data['jml']=0;
		}else{
			$id_user = $_SESSION['id_user'];
		$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			// var_dump($jml);
			$data['jml']=$jml;
		}

		$this->load->view('User/Templates/Header');
		 $this->load->view('User/Templates/Head');
		 $this->load->view('User/Templates/HeaderNav',$data);
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
public function transaksi()
	{
			if(empty($_SESSION['id_user'])){
				$data['jml']=0;
			}else{
				$id_user = $_SESSION['id_user'];
			$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
				// var_dump($jml);
				$data['jml']=$jml;
			}
				// var_dump($_POST);
				
				$this->load->view('User/Templates/Header');
				$this->load->view('User/Templates/Head');
				$this->load->view('User/Templates/HeaderNav',$data);
					var_dump($_POST);

				//   $this->load->view('User/Templates/About');
				//  $this->load->view('User/Templates/Kontent');
				$this->load->view('User/Templates/Footer');
				//  die;
				// var_dump($cari);die;
				# code...
	}

public function keranjang()
	{
			if(empty($_SESSION['id_user'])){
				$data['jml']=0;

				$data['products'] = "";
				$this->load->view('User/Templates/Header');
				$this->load->view('User/Templates/Head');
				$this->load->view('User/Templates/HeaderNav',$data);
			
				$this->load->view('User/Keranjang',$data);
				$this->load->view('User/Templates/Footer');

			}else{ // jika user  login
				$id_user = $_SESSION['id_user'];
				$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
				$data['jml']=$jml;
				// $data['products'] = $this->CartModel->getAllCartByUser($id_user);
				$data['products'] = $this->CartModel->getAllCartByUser($id_user);
				$this->load->view('User/Templates/Header');
				$this->load->view('User/Templates/Head');
				$this->load->view('User/Templates/HeaderNav',$data);
			
				$this->load->view('User/Keranjang',$data);
				$this->load->view('User/Templates/Footer');
				
			}

	}
public function cekout()
	{
		if (empty($_SESSION['id_user'])) {
			$data['jml'] = 0;
			$data['products'] = "";
			$this->load->view('User/Templates/Header');
			$this->load->view('User/Templates/Head');
			$this->load->view('User/Templates/HeaderNav', $data);

			$this->load->view('User/Cekout', $data);
			$this->load->view('User/Templates/Footer');
		} else { // jika user  login
			$id_user = $_SESSION['id_user'];
			$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			$data['jml'] = $jml;
			$data['products'] = $this->CartModel->getAllCartByUser($id_user);
			$this->load->view('User/Templates/Header');
			$this->load->view('User/Templates/Head');
			$this->load->view('User/Templates/HeaderNav', $data);

			$this->load->view('User/Cekout', $data);
			$this->load->view('User/Templates/Footer');
		}
	}

function _api_ongkir_post($origin, $des, $qty, $cour)
	{
		// var_dump($origin, $des, $qty, $cour);die;
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $des . "&weight=" . $qty . "&courier=" . $cour,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				/* masukan api key disini*/
				"key: ff80308ead767d07e44206de8736fa48"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			return $response;
		}
	}
function _api_ongkir($data)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			//CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
			//CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
			CURLOPT_URL => "http://api.rajaongkir.com/starter/" . $data,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				/* masukan api key disini*/
				"key:ff80308ead767d07e44206de8736fa48"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return  $err;
		} else {
			return $response;
		}
	}
public function provinsi()
	{

		$provinsi = $this->_api_ongkir('province');
		$data = json_decode($provinsi, true);
		echo json_encode($data['rajaongkir']['results']);
	}
public function kota($provinsi = "")
	{
		if (!empty($provinsi)) {
			if (is_numeric($provinsi)) {
				$kota = $this->_api_ongkir('city?province=' . $provinsi);
				$data = json_decode($kota, true);
				// var_dump($data);
				echo json_encode($data['rajaongkir']['results']);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
public function tarif()
	{

		$qty =10;
		$cour = $this->input->post('cour', TRUE);
		$des = $this->input->post('origin', TRUE);
		$berat = $qty * 1000;
		$tarif = $this->_api_ongkir_post(151, $des, $berat, $cour);
		$data = json_decode($tarif, true);
		// var_dump($data);
		echo json_encode($data['rajaongkir']['results']);
	}
public function pembayaran()
	{
		if (empty($_SESSION['id_user'])) {
		
		redirect('user','refresh');
		
		} else { // jika user  login
			$id_user = $_SESSION['id_user'];
			$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			$transaksi =
			$this->CartModel->getTransaksidUser($id_user)[0];
			// var_dump($transaksi);

			$data['jml'] = $jml;
			$data['uang'] = $this->formatUang($transaksi->jumlah);
			
			$data['transaksi'] =  $transaksi;
			$this->load->view('User/Templates/Header');
			$this->load->view('User/Templates/Head');
			$this->load->view('User/Templates/HeaderNav', $data);

			$this->load->view('User/Pembayaran', $data);
			$this->load->view('User/Templates/Footer');
		}
	}

public function formatUang($str, $withRp = 0)
	{
		return $withRp == 1
			? 'Rp. ' . number_format($str, 0, '.', ',')
			: number_format($str, 0, '.', ',');
	}
public function profile()
	{

		if (empty($_SESSION['id_user'])) {
			$data['jml'] = 0;
		} else {
			$id_user = $_SESSION['id_user'];
			// var_dump($id_user);
			$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			$data['user'] = $this->UserModel->getUserById($id_user)[0];
			// var_dump($jml);
			
			$data['jml'] = $jml;

		}
		$this->load->view('User/Templates/Header');
		$this->load->view('User/Templates/Head');
		$this->load->view('User/Templates/HeaderNav', $data);
		$this->load->view('User/Profile',$data);
		//  $this->load->view('User/Templates/Kontent');
		$this->load->view('User/Templates/Footer');

		// var_dump(count($data['produk']));die;
		// $this->load->view('User/Templates/IndexContent',$data);

	}
public function editProfile()
	{
		// var_dump($_POST);die;
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$no_phone = $this->input->post('no_phone');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if ($id_user=="") {
			$status= false;
			$msg ="Tidak Ada User";
		} else 		if ($nama == "") {
			$status = false;
			$msg = "Masukan Nama";
		} else 		if ($no_phone == "") {
			$status = false;
			$msg = "Masukan Nomor Telpon";
		} else 		if ($email == "") {
			$status = false;
			$msg = "Masukan Email";
		}else{
			// var_dump($password=="");die;
			if($password==""){
				$in = array(
					'no_phone' => $no_phone,
					'email' => $email,
					'nama_lengkap' => $nama,
				);
			}else{
				$password = md5($password);
				$in = array(
					'no_phone' => $no_phone,
					'email' => $email,
					'nama_lengkap' => $nama,
					'password' => $password,
				);
			}

			$edit = $this->UserModel->edit_user($in, $id_user);
			if ($edit) {
				$status = true;
				$msg = "User Berhasil Di Ubah";
				
			}else{
				$status = false;
				$msg = "User Gagal Di Ubah";
			}



		}
		$json = array(
			'status' => $status,
			'message' => $msg,
		);

		echo json_encode($json);
		exit();
		
	
	}
public function pesanan($id_tipe_produk = 1)
	{
		$data['jml']=0;
		$data['products'] = "";
		$this->load->view('User/Templates/Header');
		$this->load->view('User/Templates/Head');
		$this->load->view('User/Templates/HeaderNav',$data);
		$id_user = $_SESSION['id_user'];
		    // var_dump(json_encode($data_lelang));die();
		$obj['ci'] = $this;
		$obj['barang'] = $this->CartModel->getAllTransaksiByIdUser($id_user);
		// var_dump($obj['filter']);die();
		$obj['id_tipe_produk'] = $id_tipe_produk;
		$mobile_mode = $this->isMobile();
		$lokasi_view = $mobile_mode . 'user/pesanan';
		$this->load->view($lokasi_view, $obj);

		$this->load->view('User/Templates/Footer');
		// $this->load->view('user/my_bid', $obj);

	}
public function detailproduk()
	{
		$uri = $this->uri->segment(3);
		$produk['produk'] = $this->ProdukModel->getProdukByLink($uri)[0];
		// var_dump($produk);
		

	 	if(empty($_SESSION['id_user'])){
			$data['jml']=0;
		}else{
			$id_user = $_SESSION['id_user'];
		$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
			// var_dump($jml);
			$data['jml']=$jml;
		}

		$this->load->view('User/Templates/Header');
		 $this->load->view('User/Templates/Head');
		 $this->load->view('User/Templates/HeaderNav',$data);
		  $this->load->view('User/Templates/DetailProduk',$produk);
		 //  $this->load->view('User/Templates/Kontent');
		 $this->load->view('User/Templates/Footer');
	}
public function getMyBidBundlingListSukses()
	{
		$page = intval($this->input->post('page', true));
		$status = $this->input->post('status', true);
		$search = $this->input->post('search', true);
		$id_user = $this->session->userdata('id_user');
		$data = array();
		$sort = $this->input->post('sort', true);
		$sortForTerbayar = $this->input->post('sort', true);
		$filter = $this->input->post('filter', true);
		$id_user = $this->session->userdata('id_user');
		switch ($sort) {
			case 'h-1':
				$sort = "p.harga_awal ASC";
				$sortForTerbayar = "t.harga_total ASC";

				break;
			case 'h-0':
				$sort = "p.harga_awal DESC";
				$sortForTerbayar = "t.harga_total DESC";

				break;
			case 'p-1':
				$sort = "p.judul DESC";
				$sortForTerbayar = "t.kode_transaksi DESC";

				break;
			case 'p-0':
				$sort = "p.judul ASC";
				$sortForTerbayar = "t.kode_transaksi ASC";

				break;
			case 'w-1':
				$sort = "p.created_at ASC";
				$sortForTerbayar = "t.updated_at ASC";

				break;
			case 'w-0':
				$sort = "p.created_at DESC";
				$sortForTerbayar = "t.updated_at DESC";

				break;
			default:
				break;
		}
		if ($status == 0) {
			$data_lelang = $this->CartModel->getLelangBundlingTutupSukses($id_user, $status, $search, $sort, $filter);
			if (count($data_lelang) > 0) {
				$status = true;
				$i = 1;
				foreach ($data_lelang as $p) {
					// var_dump($p);die;

					$col = array();
					$col['idproduk'] = $p->id_transaksi;
					$col['id'] = $p->id_transaksi;
					$col['judul'] = $p->kode_transaksi;
					$col['resi'] = "zero";
					$col['grade'] = "Bundling";
					$col['bid'] = $p->jumlah;
					$col['foto'] = "zero";
					$col['qty'] = "zero";

					$col['id_transaksi'] = $p->id_transaksi;
					$col['kode_transaksi'] = $p->kode_transaksi;
					$col['kode'] = $p->kode_transaksi;
					// $col['kodtrans'] = $p->kodtrans;
					$col['link'] = "link";
		
					$col['sort_detail'] = "Bundling";
					// $col['sort_detail'] = $sort_detail;
					$col['metode'] = $p->id_method;
					$col['harga_total'] = $p->jumlah;
					$data[] = $col;
				}
			} else {
				$status = false;
			}
		}
		// var_dump($data);
		// die();
		echo json_encode(array(
			'status' => $status,
			'data' => $data,
		));
	}
public function getMyBidBundlingList()
	{
		$page = intval($this->input->post('page', true));
		$status = $this->input->post('status', true);
		$search = $this->input->post('search', true);
		$id_user = $this->session->userdata('id_user');
		$data = array();
		$sort = $this->input->post('sort', true);
		$filter = $this->input->post('filter', true);
		$id_user = $this->session->userdata('id_user');
		switch ($sort) {
			case 'h-1':
				$sort = "b.harga_awal ASC";
				break;
			case 'h-0':
				$sort = "b.harga_awal DESC";
				break;
			case 'p-1':
				$sort = "b.judul DESC";
				break;
			case 'p-0':
				$sort = "b.judul ASC";
				break;
			case 'w-1':

				$sort = "b.created_at ASC";
				break;

			case 'w-0':

				$sort = "b.created_at DESC";
				break;
			default:
				break;
		}
		// var_dump($status);die;
		if ($status == 4) {
			$data_lelang = $this->CartModel->getBundlingGagal($id_user, $search, $sort, $filter, $page);
			// var_dump($data_lelang);die;
			if (count($data_lelang) > 0) {
				$status = true;
				$i = 1;
				foreach ($data_lelang['data'] as $p) {
					// var_dump($p);die;
					$page = $data_lelang['page'];
					$harga = "Zero";
					$col = array();
					$col['judul'] = $p->kode_transaksi;
					$col['grade'] = "Bundling";
					$col['harga_awal'] = $p->bayar; // harga awal produk
					$col['harga_bid'] = $p->jumlah; // harga tertinggi bid produk dari user
					$maaf = "maaf anda telah gagal";
					if (!empty($p->jumlah)) {
						$col['harga_terbaik'] = $p->jumlah;
						$col['cek_cancle'] = 1;
					} else {
						$col['harga_terbaik'] = $p->jumlah;
						$col['cek_cancle'] = 0;
					}
					$col['sort_detail'] = "";
					$col['metode'] = $p->id_method;

					$data[] = $col;
				}
			} else {
				$status = false;
			}
		} else if ($status == 1) {
			$data_lelang = $this->CartModel->getBundlingTutup($id_user, $status, $search, $sort, $filter, $page);
			// var_dump($data_lelang);die;
			if (count($data_lelang) > 0) {
				$status = true;
				$i = 1;
				$page = $data_lelang['page'];
				foreach ($data_lelang['data'] as $p) {
					$col = array();
					$col['id'] = $p->id_transaksi;
					$col['judul'] = $p->kode_transaksi;
					$col['id_transaksi_bundling'] = $p->id_transaksi;
					$col['grade'] = "Bundling";
					$col['bid'] = $p->bayar;
					$col['kode_transaksi'] = $p->kode_transaksi;
					$col['link'] = "link";
					$col['updated_at'] = $p->updated_at;
					$col['metode'] = $p->id_method;
					$col['jumlah_produk'] = "zero";
					$col['harga_total'] = $p->jumlah;
					$data[] = $col;
				}
			} else {

				$status = false;
			}
		}

		// var_dump($data);die();

		echo json_encode(array(

			'status' => $status,

			'data' => $data,
			'page' => $page,

		));
	}
	public function test($id_kategori = "")
	{
		// var_dump(count($data['produk']));die;
		$this->load->view('User/Templates/Index');
	}
	public function getCartById()
	{
		$id_user = $this->input->post('id_user');		
		$jml = $this->CartModel->getCartIdUser($id_user)[0]->total;
		// var_dump($jml);die;
		$data['jml'] = $jml;


		echo json_encode(array(
			'status' => 1,
			'data' => $jml
		));

		# code...
	}



        
}
        
        
                            