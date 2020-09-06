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
		$columns = array(
			'nama_produk',
		);
		// untuk search
		$columnsSearch = array(
			'nama_produk',
		);
		$from = 'keranjang k';
		// custom SQL

		$sql = "SELECT k.*,k.qty as qty,p.harga,p.foto,p.nama_produk FROM {$from}  join produk p on p.id_produk = k.id_produk
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














}

