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


                        
                            
                        
}
                        
/* End of file TransaksiModel.php */
    
                        