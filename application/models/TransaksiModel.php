<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class TransaksiModel extends CI_Model {
                        
public function login(){
                        
                                
}

	public function data_AllTransaksi($post)
	{
		$columns = array(
			'nama_lengkap',
			'email',
		);
		// untuk search
		$columnsSearch = array(
			'nama_lengkap',
			'email',
		);
		$from = 'transaksi t';
		$join = ' user u';
		// custom SQL

		$sql = "SELECT *,t.status FROM {$from}  inner join {$join} on u.id_user=t.id_user
		";
		$where = "";
		$whereTemp = "";


		if (isset($post['status']) && $post['status'] != 'default') {
			if ($where != "") $where .= "AND";
			$where .= " (t.status='" . $post['status'] . "')";
		}
		if (isset($post['date']) && $post['date'] != '') {
			$date = explode(' / ', $post['date']);
			if (count($date) == 1) {
				$whereTemp .= "(t.created_at LIKE '%" . $post['date'] . "%')";
			} else {
				// $whereTemp .= "(created_at BETWEEN '".$date[0]."' AND '".$date[1]."')";
				$whereTemp .= "(date_format(t.created_at, \"%Y-%m-%d\") >='$date[0]' AND date_format(t.created_at, \"%Y-%m-%d\") <= '$date[1]')";
			}
		}


		if ($whereTemp != '' && $where != ''
		) $where .= " AND (" . $whereTemp . ")";

		else if ($whereTemp != ''
		) $where .= $whereTemp;

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
		public function getTransaksiById($id_transaksi)
	{
		$this->db->select('*');
		$this->db->where('id_transaksi', $id_transaksi);
		$query = $this->db->get('transaksi');
		return $query->result();
		# code...
	}
		public function edit_Transaksi($id_transaksi, $in)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->update('transaksi', $in);
	}
	    public function update_resi($in, $id_transaksi)
    {

        $this->db->where('id_transaksi', $id_transaksi);

        return $this->db->update('transaksi', $in);
        // return $data;
        // var_dump($in);
        // die();



	}
		public function data_AllDetailTransaksi($post)
	{
		$columns = array(
			'nama_lengkap',
			'email',
		);
		// untuk search
		$columnsSearch = array(
			'nama_lengkap',
			'email',
		);
		$from = 'detail_transaksi t';
		$join = ' produk p';
		// custom SQL

		$sql = "SELECT *FROM {$from}  inner join {$join} on p.id_produk=t.id_produk inner join user u on u.id_user=t.id_user
		where t.id_user='{$post['id_user']}' and id_transaksi={$post['id_transaksi']}
		";
		$where = "";
		$whereTemp = "";

		if ($whereTemp != '' && $where != ''
		) $where .= " AND (" . $whereTemp . ")";

		else if ($whereTemp != ''
		) $where .= $whereTemp;

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
		// var_dump($sql);
		$data  = $this->db->query($sql);

		return array(

			'totalData' => $totaldata,

			'data' => $data,

		);
	}
	public function getDetPerTrans($post, $id_transaksi)

	{

		$from = 'transaksi t';

		$columns = array(

			// 'u.nama_lengkap',
			'u.nama_lengkap',

		);
		$columnsSearch = array(

			'nama_lengkap',

		);
		$sql = "SELECT *  FROM {$from}

                join user u on t.id_user=u.id_user

                join alamat a on a.id_alamat=t.id_alamat

                WHERE id_transaksi='$id_transaksi'";
		$where = "";
		$whereTemp = "";

		if (isset($post['date']) && $post['date'] != '') {

			$date = explode(' / ', $post['date']);

			$selectDate = $_POST['selectDate'];

			if (count($date) == 1) {

				$whereTemp .= "(" . $selectDate . "  LIKE '%" . $post['date'] . "%')";
			} else {
				$whereTemp .= "(date_format($selectDate, \"%Y-%m-%d\") >='$date[0]' AND date_format($selectDate, \"%Y-%m-%d\") <= '$date[1]')";
			}
		}

		if ($whereTemp != '' && $where != '') $where .= " AND (" . $whereTemp . ")";
		else if ($whereTemp != '') $where .= $whereTemp;
		$status_search = isset($post['search']['value']) && $post['search']['value'] != '';

		if ($status_search) {

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
		if ($where != '') $sql .= " AND (" . $where . ")";
		else $sql .= $where;
		//SORT Kolom

		$sortColumn = isset($post['order'][0]['column']) ? $post['order'][0]['column'] : 1;

		$sortDir    = isset($post['order'][0]['dir']) ? $post['order'][0]['dir'] : 'asc';
		$sortColumn = $columns[$sortColumn - 1];
		$sql .= " ORDER BY {$sortColumn} {$sortDir}";
		$count = $this->db->query($sql);
		// hitung semua data
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
		public function getIdProdukFromDetailTransaksiById($id_transaksi)
	{
		$this->db->select('*');
		$this->db->where('id_transaksi', $id_transaksi);
		$query = $this->db->get('detail_transaksi');
		return $query->result();
		# code...
	}
	public function HapusTransaksi($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('transaksi');
		$query = $this->db->get('transaksi s');
		return $query->result();
		# code...
	}
	public function HapusDetailTransaksi($id_transaksi)
	{
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->delete('detail_transaksi');
		$query = $this->db->get('detail_transaksi s');
		return $query->result();
		# code...
	}
}
                        
/* End of file TransaksiModel.php */
    
                        