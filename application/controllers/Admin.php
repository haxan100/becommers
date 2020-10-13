<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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

	public function index()
	{
		// $this->load->view('templates/index');

		$data['listKategori'] = $this->ProdukModel->getAllKategori();
		$data['content'] = 'produk/data_produk';
		$this->load->view('templates/index', $data);
	}
		public function getAllProduk()
	{
		$dt = $this->ProdukModel->data_AllProduk($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		$status="";
		foreach ($dt['data']->result() as $row) {
			if($row->status_produk==1){
				$status ='<div class="badge badge-success">Aktif</div>';
			}else{
				$status = '<div class="badge badge-warning">Draft</div>';
			}
			$fields = array($no++);
			$fields[] = $row->nama_produk . '<br>';
			$fields[] = $row->nama_kategori . '<br>';
			$fields[] = $row->harga . '<br>';
			$fields[] = $row->qty . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = $row->deskripsi . '<br>';
			$fields[] = '<img src="../upload/images/produk/' . $row->foto . '" id="image" alt="image"><br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
			data-deskripsi="' . $row->deskripsi . '" 
			data-id_produk="' . $row->id_produk . '" 
			data-id_kategori="' . $row->id_kategori . '" 
			data-nama_produk="' . $row->nama_produk . '" 
			data-harga="' . $row->harga . '" 
			data-qty="' . $row->qty . '" 
			data-status_produk="' . $row->status_produk . '" 
			data-foto="' . $row->foto . '" 		
			></i> Ubah</button>
        <button class="btn btn-round btn-danger hapus" data-id_produk="' . $row->id_produk . '" data-nama_produk="' . $row->nama_produk . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function kategori()
	{
		
		$data['content'] = 'produk/data_kategori';
		$this->load->view('templates/index', $data);
	}
	public function getAllKategori()
	{
		$dt = $this->ProdukModel->data_AllKategori($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		$status = "";
		foreach ($dt['data']->result() as $row) {
			
			$fields = array($no++);
			$fields[] = $row->nama_kategori . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
			data-id_kategori="' . $row->id_kategori . '" 
			data-nama_kategori="' . $row->nama_kategori . '" 		
			></i> Ubah</button>
        <button class="btn btn-round btn-danger hapus" data-id_kategori="' . $row->id_kategori . '" data-nama_kategori="' . $row->nama_kategori . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function tambah_kategori_proses()
	{
		// var_dump($_POST);die;
		$nama_kategori = $this->input->post('nama', TRUE);

		$message = 'Gagal menambah data Kategori!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// var_dump($in);die();
		if (empty($nama_kategori)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}else{
				$in = array(
					'nama_kategori' => $nama_kategori,
				);
				$this->ProdukModel->tambah_kategori($in);

				$message = "Berhasil Menambah Kategori #1";
			
		} 
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function ubah_kategori_proses()
	{

		// var_dump($this->input->post());die;
		$nama = $this->input->post('nama', TRUE);
		$id_kategori = $this->input->post('id_kategori', TRUE);
		$message = 'Gagal mengedit data Kategori!<br>Silahkan lengkapi data yang diperlukan.';

		$errorInputs = array();
		$status = true;
		$in = array(
			'nama_kategori' => $nama,
		);
		
		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}

		if ($status) {

			if ($this->ProdukModel->edit_kategori($in, $id_kategori)) {

				$message = "Berhasil Mengubah Kategori #1";
			}
		} else {
			$message = "Gagal Mengubah Kategori #1";
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function hapusKategori()
	{
		$id_kategori = $this->input->post('id_kategori', TRUE);
		$data = $this->ProdukModel->getKategoriByid_kategori($id_kategori);
		$status = false;
		$message = 'Gagal menghapus Kategori!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Kategori yang dimaksud.';
		} else {
			$this->ProdukModel->Hapuskategori($id_kategori);
			$status = true;
			$message = 'Berhasil menghapus Kategori: <b>' . $data[0]->nama_kategori . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	public function tambah_produk_proses()
	{
		// var_dump($_POST);die;		
		$nama = $this->input->post('nama', TRUE);
		$kategori = $this->input->post('kategori', TRUE);
		$harga = $this->input->post('harga', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$st = $this->input->post('status', TRUE);
		$deskripsi = $this->input->post('deskripsi', TRUE);
		$message = 'Gagal menambah data Produk!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		// $st= intval($status);
		// var_dump($st,$status);die;

		$idProduk = $this->ProdukModel->select_max()->result()[0]->id_produk == 'NULL'
		? 1
			: substr($this->ProdukModel->select_max()->result()[0]->id_produk, 3, 9);
		if (!$idProduk) $idProduk = 0;

		$idProduk = intval(preg_replace('/\D/', '', $idProduk) + 1);
		$newIdProduk = 'P' . date('y');
		if ($idProduk < 100000000) $newIdProduk .= '0';
		if ($idProduk < 10000000) $newIdProduk .= '0';
		if ($idProduk < 1000000) $newIdProduk .= '0';
		if ($idProduk < 100000) $newIdProduk .= '0';
		if ($idProduk < 10000) $newIdProduk .= '0';
		if ($idProduk < 1000) $newIdProduk .= '0';
		if ($idProduk < 100) $newIdProduk .= '0';
		if ($idProduk < 10) $newIdProduk .= '0';
		$newIdProduk .= $idProduk;
		// $link =
		$u = substr($newIdProduk,5) ;
		$n = str_replace(" ","_",$nama);
		$uN = substr($n, 5);
		$link = "p".$u."_".$uN;
		// $NLink =substr($link, 5);
		// var_dump($link,$NLink);die;
		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}
		if (empty($kategori)) {
			$status = false;
			$errorInputs[] = array('#kategori', 'Silahkan pilih Kategori');
		}
		if (empty($harga)) {
			$status = false;
			$errorInputs[] = array('#harga', 'Silahkan isi harga');
		}
		if (empty($qty)) {
			$status = false;
			$errorInputs[] = array('#qty', 'Silahkan isi harga');
		}
		$cekFoto = empty($_FILES['foto']['name'][0]) || $_FILES['foto']['name'][0] == '';		
		if (!$cekFoto) {
			$_FILES['f']['name']     = $_FILES['foto']['name'];
			$_FILES['f']['type']     = $_FILES['foto']['type'];
			$_FILES['f']['tmp_name'] = $_FILES['foto']['tmp_name'];
			$_FILES['f']['error']     = $_FILES['foto']['error'];
			$_FILES['f']['size']     = $_FILES['foto']['size'];

			$config['upload_path']          = './upload/images/produk';
			$config['allowed_types']        = 'jpg|jpeg|png|gif';
			$config['max_size']             = 3 * 1024; // kByte
			$config['max_width']            = 10 * 1024;
			$config['max_height']           = 10 * 1024;
			$config['file_name'] = $newIdProduk . "-" . date("Y-m-d-H-i-s") . ".jpg";
			$this->load->library('image_lib');
			$this->load->library('upload', $config);
			$this->upload->initialize($config);


			$this->image_lib->resize();
			// var_dump(!$this->upload->do_upload('f'));die;
			// Upload file to server

			if (!$this->upload->do_upload('f')) {
				$errorUpload = $this->upload->display_errors() . '<br>';
			} else {
				// Uploaded file data
				$fileName = $this->upload->data()["file_name"];
				$foto = array(
					'foto' => $fileName,
				);
				$in = array(
					'id_produk'=> $newIdProduk,
					'foto' => $fileName,
					'nama_produk' => $nama,
					'harga' => $harga,
					'qty' => $qty,
					'status_produk' => $st,
					'id_kategori' => $kategori,
					'deskripsi' => $deskripsi,
					'link' => $link,
				);
				// var_dump($in);die;
				$this->ProdukModel->tambah($in,"produk");

				$message = "Berhasil Menambah Produk #1";
			}
		} else {
			$message = "Gagal menambah Produk #1";
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function ubah_produk_proses()
	{

		// var_dump($this->input->post());die;
		$id_produk = $this->input->post('id_produk', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$kategori = $this->input->post('kategori', TRUE);
		$harga = $this->input->post('harga', TRUE);
		$qty = $this->input->post('qty', TRUE);
		$status = $this->input->post('status', TRUE);
		$deskripsi = $this->input->post('deskripsi', TRUE);


		$message = 'Gagal mengedit data !<br>Silahkan lengkapi data yang diperlukan.';

		$errorInputs = array();
		$status = true;
		$in = array(
			// 'id_produk' => $id_produk,
			'nama_produk' => $nama,
			'id_kategori' => $kategori,
			'harga' => $harga,
			'qty' => $qty,
			'status_produk' => $status,
			'deskripsi' => $deskripsi,
		);

		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}		if (empty($kategori)) {
			$status = false;
			$errorInputs[] = array('#kategori', 'Silahkan Isi Kategori');
		}		if (empty($harga)) {
			$status = false;
			$errorInputs[] = array('#harga', 'Silahkan Isi Harga');
		}
		if (empty($qty)) {
			$status = false;
			$errorInputs[] = array('#qty', 'Silahkan Isi qty');
		}
		if (empty($deskripsi)) {
			$status = false;
			$errorInputs[] = array('#deskripsi', 'Silahkan Isi deskripsi');
		}

		if ($status) {

			if ($this->ProdukModel->edit_produk($in, $id_produk)) {

				$cekFoto = empty($_FILES['foto']['name'][0]) || $_FILES['foto']['name'][0] == '';
				if (!$cekFoto) {
					$filesCount = 0;
					$successUpload = 0;
					$errorUpload = '';
					$config['image_library'] = 'gd2';
					$_FILES['f']['name']     = $_FILES['foto']['name'];
					$_FILES['f']['type']     = $_FILES['foto']['type'];
					$_FILES['f']['tmp_name'] = $_FILES['foto']['tmp_name'];
					$_FILES['f']['error']     = $_FILES['foto']['error'];
					$_FILES['f']['size']     = $_FILES['foto']['size'];
					$config['upload_path']          = 'upload/images/produk/';
					$config['allowed_types']        = 'jpg|jpeg|png|gif';
					$config['max_size']             = 3 * 1024; // kByte
					$config['max_width']            = 10 * 1024;
					$config['max_height']           = 10 * 1024;
					$config['file_name'] = $id_produk . "-" . date("Y-m-d-H-i-s") . ".jpg";
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					// $data_kode = array('id_user' => $id_user);
					// $foto = $this->db->get_where('user', $data_kode);
					// if ($foto->num_rows() > 0) {
					// 	$pros = $foto->row();
					// 	// var_dump($pros);die;
					// 	$name = $pros->foto;
					// 	if (file_exists($lok = FCPATH . '/uploads/' . $name)) {
					// 		unlink($lok);
					// 	}
					// 	if (file_exists($lok = FCPATH . './assets/uploads/ktp/' . $name)) {
					// 		unlink($lok);
					// 	}
					// }
					if (!$this->upload->do_upload('f')) {
						$errorUpload = $this->upload->display_errors() . '<br>';
					} else {
						$fileName = $this->upload->data()["file_name"];
						$config['source_image'] = $config['upload_path'] . $config['file_name'];

						$this->load->library('image_lib');
						$this->load->library('upload', $config);

						$imageSizeBg = $this->image_lib->get_image_properties($config['source_image'], TRUE);
						$sizean = array();
						$widthWm = floor(0.2 * $imageSizeBg['width']);
						$heightWm = floor(0.2 * $imageSizeBg['height']);
						$config['wm_type'] = 'overlay';
						$config['wm_overlay_path'] = '/uploads/images/produk/images.png';
						$config['wm_opacity'] = 10;
						$config['maintain_ratio'] = TRUE;$config['wm_vrt_alignment'] = 'top';
						$config['wm_hor_alignment'] = 'center';

						$this->load->library('image_lib');
						$this->load->library('upload', $config);
						$this->image_lib->initialize($config);
						$errorUpload = $this->image_lib->display_errors();
						$fileName = $this->upload->data()["file_name"];						
						$successUpload++;
					}
					$inFoto = array(
						'foto' => $nameFoto = str_replace(' ', '_', $config['file_name']),
					);
					$this->ProdukModel->update_foto($inFoto, $id_produk);
				}

				$message = "Berhasil Mengubah Produk #1";
			}
		} else {
			$message = "Gagal Mengubah Produk #1";
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function hapusProduk()
	{
		$id_produk = $this->input->post('id_produk', TRUE);
		$data = $this->ProdukModel->getProdukByid_produk($id_produk);
		// var_dump($data);die;
		$status = false;
		$message = 'Gagal menghapus Produk!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Produk yang dimaksud.';
		} else {
			$this->ProdukModel->HapusProduk($id_produk);
			$status = true;
			$message = 'Berhasil menghapus Produk: <b>' . $data[0]->nama_produk . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	public function Master_User()
	{
		$data['content'] = 'Admin/data_user';
		$this->load->view('templates/index', $data);
	}
	public function getAllUser()
	{
		$dt = $this->UserModel->data_AllUser($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		$status = "";
		foreach ($dt['data']->result() as $row) {
			if ($row->status == 1) {
				$status = '<div class="badge badge-success">Aktif</div>';
			} else if($row->status == 0) {
				$status = '<div class="badge badge-warning">Belum Aktif</div>';
			}else {

				$status = '<div class="badge badge-danger">Banned</div>';

			}
			$fields = array($no++);
			$fields[] = $row->nama_lengkap . '<br>';
			$fields[] = $row->email . '<br>';
			$fields[] = $row->no_phone . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
			data-id_user="' . $row->id_user . '" 
			data-nama_lengkap="' . $row->nama_lengkap . '" 
			data-password="' . $row->password . '" 
			data-email="' . $row->email . '" 
			data-no_phone="' . $row->no_phone . '" 
			data-status="' . $row->status . '"	
			></i> Ubah</button>
        <button class="btn btn-round btn-danger hapus" data-id_user="' . $row->id_user . '" data-nama_lengkap="' . $row->nama_lengkap . '"
        >Hapus</button>              

        ';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function tambah_user_proses()
	{
		// var_dump($_POST);die;		
		$nama = $this->input->post('nama', TRUE);
		$email = $this->input->post('Email', TRUE);
		$password = $this->input->post('password', TRUE);
		$noTelp = $this->input->post('noTelp', TRUE);
		$st = $this->input->post('status', TRUE);
		$message = 'Gagal menambah data User!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		$idUser = $this->UserModel->select_max()->result()[0]->id_user == 'NULL'
		? 1
		: substr($this->UserModel->select_max()->result()[0]->id_user, 3, 9);
		if (!$idUser) $idUser = 0;

		$idUser = intval(preg_replace('/\D/', '', $idUser) + 1);
		$newIdUser = 'U' . date('y');
		if ($idUser < 100000000) $newIdUser .= '0';
		if ($idUser < 10000000) $newIdUser .= '0';
		if ($idUser < 1000000) $newIdUser .= '0';
		if ($idUser < 100000) $newIdUser .= '0';
		if ($idUser < 10000) $newIdUser .= '0';
		if ($idUser < 1000) $newIdUser .= '0';
		if ($idUser < 100) $newIdUser .= '0';
		if ($idUser < 10) $newIdUser .= '0';
		$newIdUser .= $idUser;
		
		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}
		if (empty($email)) {
			$status = false;
			$errorInputs[] = array('#email', 'Silahkan Isi');
		}
		if (empty($password)) {
			$status = false;
			$errorInputs[] = array('#password', 'Silahkan isi password');
		}
		if (empty($noTelp)) {
			$status = false;
			$errorInputs[] = array('#noTelp', 'Silahkan isi noTelp');
		}


				$in = array(
					'id_user' => $newIdUser,
					'nama_lengkap' => $nama,
					'email' => $email,
					'no_phone' => $noTelp,
					'status' => $st,
					'password' => md5($password),
				);
				// var_dump($in);die;
				if($this->ProdukModel->tambah($in, "user")){

					$message = "Berhasil Menambah User #1";
				}			
		 else {
			$message = "Gagal menambah User #1";
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function ubah_user_proses()
	{

		// var_dump($this->input->post());die;
		$nama = $this->input->post('nama', TRUE);
		$id_user = $this->input->post('id_user', TRUE);
		$Email = $this->input->post('Email', TRUE);
		$password = $this->input->post('password', TRUE);
		$noTelp = $this->input->post('noTelp', TRUE);
		$ST = $this->input->post('status', TRUE);

		$cekPasswordOld = $this->UserModel->cekPasswordOld($id_user)->password;
		$cekPWLama = $cekPasswordOld == $password;

		// var_dump($cekPasswordOld == $password);die;
		$message = 'Gagal mengedit data User!<br>Silahkan lengkapi data yang diperlukan.';

		$errorInputs = array();
		$status = true;
		if($cekPWLama){

			$in = array(  // jika password lama dengan edit user yng baru , maka password tidak terupdate
				'nama_lengkap' => $nama,
				'email' => $Email,
				'no_phone' => $noTelp,
				'status' => $ST,
			);
		}else{  //jika password lama di ubah , maka password  terupdate

			$in = array(
				'nama_lengkap' => $nama,
				'email' => $Email,
				'no_phone' => $noTelp,
				'status' => $ST,
				'password' => md5($password),
			);
		}


		if (empty($nama)) {
			$status = false;
			$errorInputs[] = array('#nama', 'Silahkan Isi Nama');
		}		if (empty($Email)) {
			$status = false;
			$errorInputs[] = array('#email', 'Silahkan Isi Email');
		}		if (empty($noTelp)) {
			$status = false;
			$errorInputs[] = array('#no$noTelp', 'Silahkan Isi No Telp');
		}
		if (empty($password)) {
			$status = false;
			$errorInputs[] = array('#password', 'Silahkan Isi Password');
		}

		if ($status) {

			if ($this->UserModel->edit_user($in, $id_user)) {

				$message = "Berhasil Mengubah User #1";
			}
		} else {
			$message = "Gagal Mengubah User #1";
		}

		echo json_encode(array(
			'status' => $status,
			'message' => $message,
			'errorInputs' => $errorInputs
		));
	}
	public function hapusUser()
	{
		$id_user = $this->input->post('id_user', TRUE);
		$data = $this->UserModel->getUserById($id_user);
		// var_dump($data);die;
		$status = false;
		$message = 'Gagal menghapus User!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat User yang dimaksud.';
		} else {
			$this->UserModel->HapusUser($id_user);
			$status = true;
			$message = 'Berhasil menghapus User: <b>' . $data[0]->nama_lengkap . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}
	public function Transaksi()
	{
		$data['content'] = 'Admin/data_transaksi';
		$this->load->view('templates/index', $data);
	}
		public function getAllTransaksi()
	{
		$dt = $this->TransaksiModel->data_AllTransaksi($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		$status = "";
		foreach ($dt['data']->result() as $row) {
			if ($row->status == 1) {
				$status = '<div class="badge badge-success">Sudah Bayar</div>';


				$tombol ='
				<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
				data-id_transaksi="' . $row->id_transaksi . '" 
				data-kode_transaksi="' . $row->kode_transaksi . '"  
				data-status="' . $row->status . '"	
				></i> Ubah</button>
				<br>

				<button class="btn btn-round btn-warning btnInputResi"  data-toggle="modal" data-target=".bs-example-modal-lg" 
					data-id_transaksi="' . $row->id_transaksi . '" 
					data-kode_transaksi="' . $row->kode_transaksi . '"  
					data-status="' . $row->status . '"	
					></i> Masukan Resi</button>


				<button class="btn btn-round btn-danger hapus" data-id_transaksi="' . $row->id_transaksi . '" data-kode_transaksi="' . $row->kode_transaksi . '"
				>Hapus</button>       ';
				if ($row->kurir !=0) {
				$tombol ='
					<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
					data-id_transaksi="' . $row->id_transaksi . '" 
					data-kode_transaksi="' . $row->kode_transaksi . '"  
					data-status="' . $row->status . '"	
					></i> Ubah</button>
					<br>

				<button class="btn btn-round btn-warning confirmBarang"  data-toggle="modal" data-target=".bs-example-modal-lg" 
					data-id_transaksi="' . $row->id_transaksi . '" 
					data-kode_transaksi="' . $row->kode_transaksi . '"  
					data-status="' . $row->status . '"	
					></i>Konfirm Sukses</button> ';
					
				}

			} else if($row->status == 0) {
				$status = '<div class="badge badge-warning">Belum Bayar</div>';
				
				$tombol ='
				<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
				data-id_transaksi="' . $row->id_transaksi . '" 
				data-kode_transaksi="' . $row->kode_transaksi . '"  
				data-status="' . $row->status . '"	
				></i> Ubah</button>
				<br>

					<button class="btn btn-round btn-warning btn_Konfirmasi"  data-toggle="modal" data-target=".bs-example-modal-lg" 
					data-id_transaksi="' . $row->id_transaksi . '" 
					data-kode_transaksi="' . $row->kode_transaksi . '"  
					data-status="' . $row->status . '"	
					></i> Konfirm Bayar</button>


				<button class="btn btn-round btn-danger hapus" data-id_transaksi="' . $row->id_transaksi . '" data-kode_transaksi="' . $row->kode_transaksi . '"
				>Hapus</button>       ';


			}else {
				$status = '<div class="badge badge-info">Transaksi Selesai</div>';
				
				$tombol ='
				<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
				data-id_transaksi="' . $row->id_transaksi . '" 
				data-kode_transaksi="' . $row->kode_transaksi . '"  
				data-id_alamat="' . $row->id_alamat . '"  
				data-status="' . $row->status . '"	
				></i> Lihat Detail</button>
				<br>  ';

			}
			if ($row->id_method == 1) {
				$bank = '<div class="badge badge-success">Transfer BCA</div>';
			} else if ($row->id_method == 0) {
				$bank = '<div class="badge badge-success">Transfer BRI </div>';
			} else {
				$bank = '<div class="badge badge-success">Transfer  Mandiri</div>';
			}
			$kodTrans = ' <a href="#" class="tomboldetail"  data-id_transaksi="' . $row->id_transaksi . '"data-id_user="' . $row->id_user . '">
		' . $row->kode_transaksi . '
		</a>';
			$fields = array($no++);
			$fields[] = $row->nama_lengkap . '<br>';
			$fields[] = $kodTrans. '<br>';
			$fields[] = $row->no_phone . '<br>';
			$fields[] = $row->qty . '<br>';
			$fields[] = $this->formatUang($row->bayar) . 				'<br>' . 										$this->formatUang($row->ongkir);
			$fields[] = $this->formatUang($row->jumlah) . 				'<br>';
			$fields[] = $status . '<br>';
			$fields[] = $bank . '<br>';
			$fields[] = $tombol;
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function formatUang($str, $withRp = 0)
	{
		return $withRp == 1
			? 'Rp. ' . number_format($str, 0, '.', ',')
			: number_format($str, 0, '.', ',');
	}
	public function editStatus()
	{

		$id_transaksi = $this->input->post('id_transaksi', TRUE);

		$data = $this->TransaksiModel->getTransaksiById($id_transaksi);
		// var_dump($data);die;
		$status = false;
		$message = 'Gagal Mangubah Transaksi!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Transaksi yang dimaksud.';
		} else {

			$in = array(
				'status' => 1,
			);

			$this->TransaksiModel->edit_Transaksi($id_transaksi,$in);
			$status = true;
			$message = 'Berhasil mengubah Transaksi: <b>' . $data[0]->kode_transaksi . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));

	}
	  public function Resi()
  {
	//   var_dump($_POST);die;
    $id_transaksi = $this->input->post('id_transaksi', TRUE);
    $resi = $this->input->post('nomor_resi', TRUE);
    $kurir = $this->input->post('kurir', TRUE);
    $message = 'Gagal menambahkan Resi!<br>Silahkan lengkapi data yang diperlukan.';
    $errorInputs = array();
    $statusnya = true;
    $in = array(
      'kurir' => $kurir,
      'resi' => $resi,
      // 'password' => 	$this->bizEncrypt($password),
    );
    if (empty($resi)) {
      $statusnyanya = false;
      $errorInputs[] = array('#resi', 'Silahkan Masukan Resi');
    }
    if ($statusnya) {
      if ($this->TransaksiModel->update_resi($in, $id_transaksi))
    $message = 'Berhasil  Mengubah Resi';

    } else {
      $message = 'Gagal ';
    }
    echo json_encode(array(
      'status' => $statusnya,
      'message' => $message,
      'errorInputs' => $errorInputs
    ));

  }
  	public function editStatusSelesai()
	{

		$id_transaksi = $this->input->post('id_transaksi', TRUE);

		$data = $this->TransaksiModel->getTransaksiById($id_transaksi);
		// var_dump($data);die;
		$status = false;
		$message = 'Gagal Mangubah Transaksi!';
		if (count($data) == 0) {
			$message .= '<br>Tidak terdapat Transaksi yang dimaksud.';
		} else {

			$in = array(
				'status' => 2,
			);

			$this->TransaksiModel->edit_Transaksi($id_transaksi,$in);
			$status = true;
			$message = ' Transaksi Berhasil Diselesaikan : <b>' . $data[0]->kode_transaksi . '</b>';
		}
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));

	}
		public function Transaksi_detail()
	{
		$data['content'] = 'Admin/detail_transaksi';
		$this->load->view('templates/index', $data);
	}
			public function getAllTransaksiDetail()
	{

		// var_dump($_POST);die;

		$dt = $this->TransaksiModel->data_AllDetailTransaksi($_POST);
		$bu = base_url();
		$datatable['draw']      = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		// var_dump($dt['data']->result());die();
		$no = $start + 1;
		$status = "";
		foreach ($dt['data']->result() as $row) {
		
			$fields = array($no++);
			$fields[] = $row->nama_lengkap . '<br>';
			$fields[] = $row->no_phone . '<br>';
			$fields[] = $row->nama_produk . '<br>';
			$fields[] = $row->qty . '<br>';
			$fields[] =  '<img class="" id="foto_wrapper" src="' . $bu . '/upload/images/produk/' . $row->foto . ' "/> ';
			// $fields[] = $row->foto . '<br>';
			$datatable['data'][] = $fields;
		}



		echo json_encode($datatable);

		exit();
	}
	public function getDetailPertrans()

	{
		// var_dump($_POST);die;
		$id_transaksi = $this->input->post('id_transaksi', TRUE);

		$dt = $this->TransaksiModel->getDetPerTrans($_POST, $id_transaksi);

		$datatable['draw']            = isset($_POST['draw']) ? $_POST['draw'] : 1;
		$datatable['recordsTotal']    = $dt['totalData'];
		$datatable['recordsFiltered'] = $dt['totalData'];
		$datatable['data']            = array();
		$start  = isset($_POST['start']) ? $_POST['start'] : 0;
		$no = $start + 1;
		foreach ($dt['data']->result() as $row) {
			// var_dump(($row));die();

			$fields = array($no++);
			$fields[] = $row->nama_lengkap;
			$fields[] = $row->no_phone . '<br>' . $row->email;
			$fields[] = $row->alamat;
			$fields[] = $row->provinsi;
			$fields[] = $row->kota;
			$fields[] = $row->kode_pos;
			$datatable['data'][] = $fields;
		}

		echo json_encode($datatable);

		exit();
	}
	public function admin()
	{
		$data['admin'] = $this->admin->getAllAdmin();
		$data['content'] = 'Admin/data_admin';
		$this->load->view('templates/index', $data);
	}
	public function ubahAktivAdmin($id)
	{
		$this->session->set_flashdata('ubah', 'Status Berhasil di ubah');
		// $this->CekSuper();
		$this->admin->ubahAdminAktiv($id,1);
		redirect('Admin/Admin');
	}
	public function ubahNonAktivAdmin($id)
	{
		$this->session->set_flashdata('ubah', 'Status Berhasil di ubah');
		// $this->CekSuper();
		$this->admin->ubahAdminAktiv($id,0);
		redirect('Admin/Admin');
	}

	public function ubahSuperAdmin($id)
	{
			$this->session->set_flashdata('ubah', 'Versi Admin Berhasil di ubah');
		// $this->CekSuper();
		$this->admin->ubahKeSuperAdmin($id,1);
		redirect('Admin/Admin');

	}
	public function ubahNonSuperAdmin($id)
	{
			$this->session->set_flashdata('ubah', 'Versi Admin Berhasil di ubah');
		// $this->CekSuper();
		$this->admin->ubahKeSuperAdmin($id,0);
		redirect('Admin/Admin');

	}
	public function detail($id)
	{
		// $this->CekSuper();
		// $data = $this->user->getcurrency();

		$data['admin'] = $this->admin->getAdminByID($id);
		$data['content'] = 'Admin/detail_admin';
		$this->load->view('templates/index', $data);
	}
	public function ubahpass()
	{
		// var_dump($_POST);die;
		$this->form_validation->set_rules('password', 'password', 'trim|prep_for_form');

		if ($this->form_validation->run() == TRUE) {
			$id = $this->input->post('id');
			$data = $this->input->post('password');
			$dataencrypt = md5($data);

			$data             = [
				'id_admin'            => html_escape($this->input->post('id', TRUE)),
				'password'      => $dataencrypt
			];

				$this->admin->ubahdatapassword($data);
				$this->session->set_flashdata('ubah', 'Password Telah Di ganti');
				redirect('Admin/detail/' . $id);
			
		} else {
			redirect('Admin/Admin');
		}
	}
	public function ubahfoto()
	{

		$config['upload_path']     = './upload/images/admin/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']         = '100000';
		$config['file_name']     = 'name';
		$config['encrypt_name']     = true;
		$this->load->library('upload', $config);
		$id = $id = html_escape($this->input->post('id', TRUE));
		$data = $this->admin->getAdminByID($id);

		if ($this->upload->do_upload('image')) {
			if ($data['image'] != 'noimage.jpg') {
				$gambar = $data['image'];
				unlink('upload/images/admin/' . $gambar);
			}

			$foto = html_escape($this->upload->data('file_name'));
			// var_dump($foto);die;
			$data = [
				'image'       => $foto,
				'id_admin'        => html_escape($this->input->post('id', TRUE))
			];

				$this->admin->ubahdatafoto($data);
				$this->session->set_flashdata('ubah', 'Foto Berhasil Di Ubah');
				redirect('Admin/detail/' . $id);
			
		} else {

			$data = $this->user->getcurrency();
			$data['user'] = $this->user->getusersbyid($id);
			$data['countorder'] = $this->user->countorder($id);

			$this->load->view('includes/header');
			$this->load->view('users/detailusers', $data);
			$this->load->view('includes/footer');
		}
	}
	public function ubahid()
	{
		// $this->CekSuper();
		// var_dump($_POST);die;

		$this->form_validation->set_rules('fullnama', 'fullnama', 'trim|prep_for_form');

		$this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|prep_for_form');

		$this->form_validation->set_rules('email', 'email', 'trim|prep_for_form');

		$id = html_escape($this->input->post('id', TRUE));

		if ($this->form_validation->run() == TRUE) {
			$data             = [
				'id_admin'                        => html_escape($this->input->post('id', TRUE)),
				'nama_admin'                     => html_escape($this->input->post('nama', TRUE)),
				'username'                     => html_escape($this->input->post('username', TRUE)),
				'id_role'                    => html_escape($this->input->post('admin_role', TRUE)),
				'status'                    => html_escape($this->input->post('status', TRUE)),
				'email'                        => html_escape($this->input->post('email', TRUE)),
				'no_telepon'                        => html_escape($this->input->post('no_telepon', TRUE))
			];
			
				$this->admin->ubahAdminByID($data);
				$this->session->set_flashdata('ubah', 'User Has Been Change');
				redirect('Admin/detail/' . $id);
			
		} else {
			$this->session->set_flashdata('ubah', 'Gagal Di Ubah!');
			redirect('Admin/detail/' . $id);
		}
	}
	public function hapusAdmin()
	{
		$id = $this->input->post('id');
		$status = false;
		$message = "Admin Gagal Di Hapus!";
		// var_dump($_POST);die;
		// $this->CekSuper();

			$data = $this->admin->getAdminByID($id);
			// var_dump($data['image']);die;
			$gambar = $data['image'];
			unlink('upload/images/admin/' . $gambar);

			if($this->admin->hapusAdminByID($id)){

				$this->session->set_flashdata('hapus', 'Admin Has Been Deleted');
				$status =true;
				$message ="Admin Berhasil Di Hapus!";
			}else{
			$status = false;
			$message = "Admin Gagal Di Hapus!";

			}

		// redirect('Admin/index');
		echo json_encode(array(
			'status' => $status,
			'message' => $message,
		));
	}

}
