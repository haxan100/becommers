<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProdukModel extends CI_Model

{
	public function data_Allproduk($post)

	{
		$columns = array(
			'nama_produk',
		);
		// untuk search
		$columnsSearch = array(
			'nama_produk',
		);
		$from = 'produk p';
		// custom SQL

		$sql = "SELECT* FROM {$from}  join kategori k on k.id_kategori = p.id_kategori
		";
		$where = "";
		// if (isset($post['id_kelas']) && $post['id_kelas'] != 'default') {
		// 	if ($where != "") $where .= "AND";

		// 	$where .= " (s.id_kelas='" . $post['id_kelas'] . "')";
		// }

		$whereTemp = "";
		
		if ($whereTemp != '' && $where != '') $where .= " AND (" . $whereTemp . ")";

		else if ($whereTemp != '') $where .= $whereTemp;
		
		if (isset($post['search']['value']) && $post['search']['value'] != '') {
			$search = $post['search']['value'];
			$whereTemp = "";

			for ($i = 0; $i < count($columnsSearch); $i++) {

				$whereTemp .= $columnsSearch[$i] . ' LIKE "%' . $search . '%"';
				
				if ($i < count($columnsSearch) - 1) {

					$whereTemp .= ' OR ';
				}
			}
			if ($where != '') $where .= " AND (" . $whereTemp . ")";
			else $where .= $whereTemp;
		}

		if ($where != '') $sql .= ' WHERE (' . $where . ')';
		$sortColumn = isset($post['order'][0]['column']) ? $post['order'][0]['column'] : 1;

		$sortDir    = isset($post['order'][0]['dir']) ? $post['order'][0]['dir'] : 'asc';
		$sortColumn = $columns[$sortColumn - 1];
		$sql .= " ORDER BY {$sortColumn} {$sortDir}";

		$count = $this->db->query($sql);
		$totaldata = $count->num_rows();
		$start  = isset($post['start']) ? $post['start'] : 0;
		$length = isset($post['length']) ? $post['length'] : 10;
		$sql .= " LIMIT {$start}, {$length}";
		$data  = $this->db->query($sql);
		return array(

			'totalData' => $totaldata,

			'data' => $data,

		);
	}

	public function data_AllKategori($post)

	{
		$columns = array(
			'nama_kategori',
		);
		// untuk search
		$columnsSearch = array(
			'nama_kategori',
		);
		$from = 'kategori p';
		// custom SQL

		$sql = "SELECT* FROM {$from}  
		";
		$where = "";
		$whereTemp = "";

		if ($whereTemp != '' && $where != '') $where .= " AND (" . $whereTemp . ")";

		else if ($whereTemp != '') $where .= $whereTemp;

		if (isset($post['search']['value']) && $post['search']['value'] != '') {
			$search = $post['search']['value'];
			$whereTemp = "";

			for ($i = 0; $i < count($columnsSearch); $i++) {

				$whereTemp .= $columnsSearch[$i] . ' LIKE "%' . $search . '%"';

				if ($i < count($columnsSearch) - 1) {

					$whereTemp .= ' OR ';
				}
			}
			if ($where != '') $where .= " AND (" . $whereTemp . ")";
			else $where .= $whereTemp;
		}

		if ($where != '') $sql .= ' WHERE (' . $where . ')';
		$sortColumn = isset($post['order'][0]['column']) ? $post['order'][0]['column'] : 1;

		$sortDir    = isset($post['order'][0]['dir']) ? $post['order'][0]['dir'] : 'asc';
		$sortColumn = $columns[$sortColumn - 1];
		$sql .= " ORDER BY {$sortColumn} {$sortDir}";

		$count = $this->db->query($sql);
		$totaldata = $count->num_rows();
		$start  = isset($post['start']) ? $post['start'] : 0;
		$length = isset($post['length']) ? $post['length'] : 10;
		$sql .= " LIMIT {$start}, {$length}";
		$data  = $this->db->query($sql);
		return array(

			'totalData' => $totaldata,

			'data' => $data,

		);
	}
	public function tambah_kategori($in)
	{

		return $this->db->insert('kategori', $in);
	}
	public function edit_kategori($in, $id)
	{
		$this->db->where('id_kategori', $id);
		return $this->db->update('kategori', $in);
	}
	public function getKategoriByid_kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get('kategori');
		return $query->result();
		# code...
	}
	public function getAllKategori()
	{
		$this->db->select('*');
		$query = $this->db->get('kategori');
		return $query->result();
		# code...
	}
	public function Hapuskategori($id_kategori)
	{
		$this->db->where('id_kategori', $id_kategori);

		$this->db->delete('kategori');
		$query = $this->db->get('kategori s');

		return $query->result();


		# code...
	}
	public function select_max()
	{
		$this->db->select_max('id_produk');
		return $this->db->get('produk');
	}
	public function tambah($in,$table)
	{

		return $this->db->insert($table, $in);
	}
	public function edit_produk($in, $id)
	{
		$this->db->where('id_produk', $id);
		return $this->db->update('produk', $in);
	}
	public function update_foto($in, $id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		return $this->db->update('produk', $in);

	}
	public function getProdukByid_produk($id_produk)
	{
		$this->db->select('*');
		$this->db->where('id_produk', $id_produk);
		$query = $this->db->get('produk');
		return $query->result();
		# code...
	}
	public function HapusProduk($id_produk)
	{
		$this->db->where('id_produk', $id_produk);

		$this->db->delete('produk');
		$query = $this->db->get('produk s');

		return $query->result();


		# code...
	}
	public function getAllProduk()
	{
		$this->db->select('*');
		$query = $this->db->get('produk');
		return $query->result();
		# code...
	}
	public function getAllProdukPag($limit,$start)
	{
		$this->db->select('*');
		$query = $this->db->get('produk',$limit,$start);
		return $query->result();
		# code...
	}



}
