<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class CartModel extends CI_Model {

    	public function AddCart($data)
	{
		return $this->db->insert('keranjang', $data);
	}
	public function getCartIdUser($id_user)
	{
		$this->db->select('sum(qty) as total');
		$this->db->from('keranjang');
		$sql =	$this->db->where('id_user', $id_user);
		return  $sql->get()->result();	
    }
    public function getCartByIdUserAndProduk($id_user,$id_produk)
    {
        $this->db->select('qty');
        $this->db->from('keranjang');
        $this->db->where('id_produk', $id_produk);
        $sql =	$this->db->where('id_user', $id_user);
        
      
        return  $sql->get()->result();	
        
    }
    	public function updateCart($in, $id)
	{
		$this->db->where('id_keranjang', $id);
		return $this->db->update('keranjang', $in);
	}
		public function getAllCartByUser($id_user)
	{
		$this->db->select('*,keranjang.qty as qty');
		$this->db->from('keranjang');
		$this->db->join('produk', 'produk.id_produk = keranjang.id_produk');
		
		$sql =	$this->db->where('id_user', $id_user);
		return  $sql->get()->result();	
	}
		public function data_AllCartByUser($post)

	{
		$id_user = 
		$_SESSION['id_user'];
		
		// var_dump($id_user);die;
		
		$columns = array(
			'nama_produk',
		);
		// untuk search
		$columnsSearch = array(
			'nama_produk',
		);
		$from = 'keranjang k';
		// custom SQL

		$sql = "SELECT k.*,k.qty as qty,p.harga,p.foto,p.link_foto,p.nama_produk FROM {$from}  join produk p on p.id_produk = k.id_produk where k.id_user = '$id_user'
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
		public function HapusCart($id_keranjang)
	{
		$this->db->where('id_keranjang', $id_keranjang);

		$this->db->delete('keranjang');
		$query = $this->db->get('keranjang s');

		return $query->result();


		# code...
	}
	    public function getCartByIdUserAndIdKeranj($id_user,$id_keranjang)
    {
        $this->db->select('qty');
        $this->db->from('keranjang');
        $this->db->where('id_keranjang', $id_keranjang);
        $sql =	$this->db->where('id_user', $id_user);
        
      
        return  $sql->get()->result();	
        
	}
	    public function AddTransaksi($data)
	{
		 $this->db->insert('transaksi', $data);
		 return $this->db->insert_id();
	}
		    public function AddAlamat($data)
	{
		 $this->db->insert('alamat', $data);
		 return $this->db->insert_id();
	}
		public function getCartByIdUser($id_user)
	{
		$this->db->select('*');
		$this->db->from('keranjang');
		$sql =	$this->db->where('id_user', $id_user);
		return  $sql->get()->result();	
	}
		    public function AddDetailTransaksi($data)
	{
		 $this->db->insert('detail_transaksi', $data);
		 return $this->db->insert_id();
	}
	public function getTransaksidUser($id_user)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$sql =	$this->db->where('id_user', $id_user);
		$sql =	$this->db->where('status', 0);
		return	  $sql->get()->result();
		// var_dump($this->db->last_query());
	}
	public function getAllTransaksi()
	{
		$this->db->select('*');
		$sql =	$this->db->from('transaksi');
		return  $sql->get()->result();	
		
		
	}
	public function getAllTransaksiByIdUser($id_user)
	{
		$this->db->select('*');
		$this->db->where('id_user', $id_user);

		$sql =	$this->db->from('transaksi');
		return  $sql->get()->result();
	}
	public function getAllTransaksiPag($limit, $start,$id_user)
	{

		$this->db->select('*');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('transaksi', $limit, $start);
		return
			$query->result();

		var_dump($this->db->last_query());die;
		# code...
	}
	public function getLelangBundlingTutupSukses($id_user, $status, $search = '', $sort = 'default', $filter = 'default')
	{
		$this->db->select('*')
		->from('transaksi t')
		->where('t.id_user', $id_user)
		->where('t.status', 0);
		$where = "(t.status=$status OR t.status=2)";
		if ($status == 1)
		$this->db->where($where);
		else {
			$this->db->where('t.status', $status);
		}
		if ($search != '') {
			$array_search = array(
				't.kode_transaksi' => $search,
			);
			$this->db->group_start()
			->or_like($array_search)
			->group_end();
		}
		if ($sort != 'default') {
			$this->db->order_by($sort);
		}
		if ($filter != 'default') {
			$this->db->where('l.id_tipe_produk', $filter);
		}
		$query = $this->db->get()->result();
		// var_dump($this->db->last_query());
		// die();
		return $query;
	}
	public function getBundlingGagal($id_user, $search = '', $sort = 'default', $filter = 'default', $page = 1)
	{
		$perHal = 6;
		$start = ($page - 1) * $perHal;
		$length =  $start + $perHal;
		$total  = $this->getBundlingGagalCount($id_user, $search, $sort, $filter);
		$pages = ceil($total / $perHal);
		// var_dump($this->db->last_query());die();
		$this->db
			->select('tb.*')
			->from('transaksi tb')
			->where('tb.id_user', $id_user);
		if ($search != '') {
			$array_search = array(
				'tb.kode_transaksi' => $search,
				// 'p.link' => $search, 
			);
			$this->db->group_start()
				->or_like($array_search)
				->group_end();
		}
		if ($sort != 'default') {
			$this->db->order_by($sort);
		}
		if ($filter != 'default') {
			// $this->db->where('tb.id_tipe_produk', $filter);
		}
		$where = "(tb.status='2')";
		$query = $this->db->where($where)
			// ->or_where('t.status', 4)
			->group_by('tb.id_transaksi');

		$this->db->limit($perHal, $start);
		// var_dump($this->db->last_query());die;
		$query = $this->db->get()->result();
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
		// return $query;
	}
	public function getBundlingGagalCount($id_user, $search = '', $sort = 'default', $filter = 'default')
	{
		$this->db
		->select('tb.*')
		->from('transaksi tb')
			->where('tb.id_user', $id_user);
		if ($search != '') {
			$array_search = array(
				'tb.kode_transaksi' => $search,
			);
			$this->db->group_start()
			->or_like($array_search)
			->group_end();
		}
		if ($sort != 'default') {
			$this->db->order_by($sort);
		}
		if ($filter != 'default') {
			// $this->db->where('tb.ku', $filter);
		}
		$where =
		"(tb.status='1')";
		// $where = "(tb.status!='1' AND tb.pemenang='0'  OR `tb`.`status` = 4)";
		$query = $this->db->where($where)			// ->or_where('t.status', 4)
			->group_by('tb.id_transaksi');
		$query = $this->db->get()->result();
		return count($query);
	}
	public function getBundlingTutup($id_user, $status, $search = '', $sort = 'default', $filter = 'default', $page = 1)
	{
		// var_dump($status,$search);
		$perHal = 6;
		$start = ($page - 1) * $perHal;
		$length =  $start + $perHal;
		$total  = $this->getBundlingTutupCount($id_user, $status, $search = '', $sort = 'default', $filter = 'default');
		// var_dump($total);die;
		$pages = ceil($total / $perHal);
		$this->db->select('tb.*')
			->from('transaksi tb')
			->where('id_user', $id_user)
			->where('tb.status', 1);
		$where = "(tb.status=$status OR tb.status=2)";
		if ($status == 1)
			$this->db->where($where);
		else {
			$this->db->where('tb.status', $status);
		}
		if ($search != '') {
			$array_search = array(
				'b.kode_transaksi' => $search,
			);
			$this->db->group_start()
				->or_like($array_search)
				->group_end();
		}
		if ($sort != 'default') {
			$this->db->order_by($sort);
		}
		if ($filter != 'default') {
			$this->db->where('b.id_tipe_produk', $filter);
		}
		$this->db->limit(
			$perHal,
			$start
		);
		$query = $this->db->get()->result();

		$pagination = array(
			'total_halaman' => $pages,
			'halaman' => $page,
			'total_data' => $total, // jumlah total
			'jumlah' => count($query)

		);
		// var_dump($this->db->last_query());die();

		$output = array(
			'data' => $query,
			'page' => $pagination,
		);

		return $output;
	}
	public function getBundlingTutupCount($id_user, $status, $search = '', $sort = 'default', $filter = 'default')
	{
		$this->db->select('tb.*')
		->from('transaksi tb')
		->where('id_user', $id_user)
		->where('tb.status', 1);
		if ($search != '') {
			$array_search = array(
				'b.kode_transaksi' => $search,
			);
			$this->db->group_start()
			->or_like($array_search)
			->group_end();
		}
		if ($sort != 'default') {
			$this->db->order_by($sort);
		}
		if ($filter != 'default') {
			// $this->db->where('b.id_tipe_produk', $filter);
		}
		$query = $this->db->get()->result();
		return count($query);
	}














}

