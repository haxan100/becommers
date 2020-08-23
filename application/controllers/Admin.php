<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()

	{
		parent::__construct();
		$this->load->model('ProdukModel');

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
			$fields[] = '<img src="upload/images/' . $row->foto . '" id="image" alt="image"><br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
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
		$status = $this->input->post('status', TRUE);
		$deskripsi = $this->input->post('deskripsi', TRUE);
		$message = 'Gagal menambah data Produk!<br>Silahkan lengkapi data yang diperlukan.';
		$errorInputs = array();
		$status = true;
		$st= intval($status);
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
					'status_produk' => $status,
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



}
