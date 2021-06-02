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
	public function getAllProduk($cari="")
	{
		$this->db->select('*');
		$this->db->where('status_produk', 1);
		
		$query = $this->db->get('produk');
		// var_dump($this->db->last_query());die;
		return $query->result();
	}
	public function getAllProdWSeacrh($cari="")
	{
		// var_dump($cari);

		$this->db->select('*');
		$this->db->like('nama_produk', $cari, $cari); 
		$query = $this->db->get('produk');
		return $query->result();

	}
	public function getAllProdukPag($limit,$start, $sort = "")
	{
		$this->db->select('*');
		$this->db->where('status_produk', 1);		
		$query = $this->db->get('produk',$limit,$start);
		return 
		$query->result();
		
		// var_dump($this->db->last_query());
		# code...
	}
		public function getAllProdukPagCari($limit,$start, $cari)
	{
		
		$this->db->select('*');		
		$this->db->like('nama_produk', $cari, $cari);
		$this->db->where('status_produk', 1);
		$query = $this->db->get('produk',$limit,$start);
		return 
		$query->result();
		
		// var_dump($this->db->last_query());
		# code...
	}
	public function getProdukByIdTipeProduk($sort = 'default')
	{
		

		$this->db->select("*")

		->from('produk p')

		// ->where('p.id_tipe_produk', $id_tipe_produk)

			// ->where('p.id_tipe_bid', $id_tipe_bid)

			->where('p.status_produk', '1');

		// if ($filter != '0') {
		// 	// $this->db->where('', $filter);		// var_dump($filter);die();
		// 	echo "jjj";
		// }
		// if ($search != '') {

		// 	$array_search = array(

		// 		'p.judul' => $search,

		// 		'p.harga_awal' => $search,

		// 		$col_search => $search,

		// 	);

		// 	$this->db->group_start()

		// 		->or_like($array_search)

		// 		->group_end();
		// }



		// $this->db->join('grade g', 'p.id_grade=g.id_grade')

		// ->join($table_spek, 'p.id_spek=s.id_spek')

		// ->join('foto_produk f', 'p.id_produk=f.id_produk')

		$this->db->group_by('id_kategori');

		if ($sort != 'default') {

			$this->db->order_by($sort);

			// var_dump($sort);die();

		}

		// $this->db->limit($perHal, $start);

		$query = $this->db->get()->result();

		// var_dump($this->db->last_query());

		// die();

		// $pagination = array(

		// 	// 'total_halaman' => $pages,

		// 	'halaman' => $page,

		// 	// 'total_data' => $total, // jumlah total

		// 	'jumlah' => count($query)



		// );

		$output = array(
			'data' => $query,
			// 'page' => $pagination,
		);
		return $output;
	}
		public function getAllProdukAndKat($id_kategori)
	{
		// var_dump($sort);
		$this->db->select('*');
		// $this->db->from('produk p');
		// $this->db->join('kategori k', 'k.id_kategori = p.id_kategori');
		$this->db->where('id_kategori', $id_kategori);	
		
		$query = $this->db->get('produk');
		return $query->result();
		# code...
	}
		public function getAllProdukKategoriPag($limit,$start, $id_kategori)
	{
		$this->db->select('*');		
		$this->db->where('id_kategori', $id_kategori);
		
		$query = $this->db->get('produk',$limit,$start);
		return 
		$query->result();
	}
	public function getProdukByLink($link)
	{
		$this->db->select('*');
		$this->db->where('link', $link);
		$query = $this->db->get('produk');
		return $query->result();
		# code...
	}
	public function getProdukByID($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id);
		return $this->db->get()->result();		
	}
	public function updateQTYbyID($in, $id)
	{
		$this->db->where('id_produk', $id);
		return $this->db->update('produk', $in);
	}
	public function getProduk($page=1,$cari)
    { 
		// $page = intval($this->input->post('page', true));
        $perHal = 9;
        $start = ($page- 1) * $perHal;
        $length =  $start + $perHal;
        $total  = $this->getProdukCount($cari);
        $pages = ceil($total / $perHal);
        $this->db->select("*")
        ->from('produk p')
		->where('status_produk',1);
        if ($cari != '') {
            $array_search = array(
                'p.nama_produk' => $cari,
            );
            $this->db->group_start()
                ->or_like($array_search)
                ->group_end();
        }

        $this->db->limit($perHal, $start);
        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());die();
        $pagination = array(
            'total_halaman' => $pages,
            'halaman' => $page,
            'total_data' => $total, // jumlah total
            'jumlah' => count($query)

        );
        $output = array(
            'data' => $query,
            'page' => $pagination,

        );
        return $output;
    }
	public function getProdukCount($cari)
    {
        $table_spek = 'spek_handphone s';
        $col_search = 's.e';

        $this->db->select("*")
        ->from('produk p')
		->where('status_produk',1)
		;
        if ($cari != '') {
            $array_search = array(
                'p.nama_produk' => $cari,
            );
            $this->db->group_start()
                ->or_like($array_search)
                ->group_end();
        }

        $query = $this->db->get()->result();
        // var_dump($this->db->last_query());die();
        return count($query);
    }
	public function getKodeVocher($kode)
	{
		$this->db->where('kode_vocher', $kode);
		$this->db->from('vocher');
		$query = $this->db->get()->result();
        return $query;
	}
	public function getKodeVocherRow($kode)
	{
		$this->db->where('kode_vocher', $kode);
		$this->db->from('vocher');
		$query = $this->db->get()->row();
        return $query;
	}
	public function getAllProdukBeliByIdTransaksi($id_user,$id_transaksi)
	{
		$cari = $_POST['search']['value'];
		$this->db->select('dt.*,p.nama_produk,p.harga');
		
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->from('detail_transaksi dt');
		$this->db->join('produk p', 'p.id_produk = dt.id_produk');	
		if(!empty($cari)){
			$this->db->like('p.nama_produk', $cari);
			
		}	
		$query = $this->db->get()->result();
		// echo $this->db->last_query();	
		return array(
			'totalData' => count($query),
			'data' => $query,
		);	
		return $query;
	}



}
