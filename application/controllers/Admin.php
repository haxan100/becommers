<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()

	{
		parent::__construct();
		$this->load->model('ProdukModel');

		$this->load->helper('url');
	}

	public function index()
	{
		// $this->load->view('templates/index');
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
				$status ="aktiv";
			}else{
				$status ="Non aktiv";
			}
			$fields = array($no++);
			$fields[] = $row->nama_produk . '<br>';
			$fields[] = $row->id_kategori . '<br>';
			$fields[] = $row->harga . '<br>';
			$fields[] = $row->qty . '<br>';
			$fields[] = $status . '<br>';
			$fields[] = $row->deskripsi . '<br>';
			$fields[] = '<img src="upload/images/' . $row->id_foto . '" id="image" alt="image"><br>';
			$fields[] = '
			<button class="btn btn-round btn-info btn_edit"  data-toggle="modal" data-target=".bs-example-modal-lg" 
			data-id_produk="' . $row->id_produk . '" 
			data-id_kategori="' . $row->id_kategori . '" 
			data-nama_produk="' . $row->nama_produk . '" 
			data-harga="' . $row->harga . '" 
			data-qty="' . $row->qty . '" 
			data-status_produk="' . $row->status_produk . '" 
			data-foto="' . $row->id_foto . '" 		
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



}
