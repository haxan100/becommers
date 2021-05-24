<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/third_party/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Import extends CI_Controller {
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
	public function text()
	{
		// var_dump($_FILES);die;
		if (!empty($_FILES['fileURL']['name'])) {
			// get file extension
			$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
			$berhasil = 0;
			if ($extension == 'csv') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} elseif ($extension == 'xlsx') {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
			}
			// file path
			$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
			// var_dump($spreadsheet);die;
			$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			$arrayCount = count($allDataInSheet);
			$hasilRow = $arrayCount - 1;
			
				$numrow = 1;
				foreach ($allDataInSheet as $row) {
					if ($numrow > 1) {
						// var_dump()

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
					$u = substr($newIdProduk, 5);
					$n = str_replace(" ", "_", "imp");
					$uN = substr($n, 5);
					$link = "p" . $u . "_" . $uN;


						// var_dump($newIdProduk,$uN,$link);die;
						$data = array(
							'id_produk' => $newIdProduk,
							'id_kategori' => 1,
							'status_produk' => 1,
							'harga' => $row['D'],
							'nama_produk' => $row['A'],
							'link' => $link,
							'qty' => $row['B'],
							'deskripsi' => $row['F'],
							'link_foto' => $row['J']	  	  	  	  
						);
					// var_dump($data);
					// die;	
					// $this->ProdukModel->tambah_spek_hp($data);
					$this->ProdukModel->tambah($data, "produk");

						$this->session->set_flashdata('flash_data', "$hasilRow  Produk berhasil di import.");
						$sukses = true;						//   var_dump($data);die;
					$data['listKategori'] = $this->ProdukModel->getAllKategori();
					$data['content'] = 'produk/data_produk';
					$this->load->view('templates/index', $data);
					}
					$numrow++;
				
			}
		}

		redirect("admin/index");
	}

}
