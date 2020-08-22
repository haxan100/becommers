<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
		// $this->load->view('templates/index');
		$data['content'] = 'produk/data_produk';
		$this->load->view('templates/index', $data);
	}
}
