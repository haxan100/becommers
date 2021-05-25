<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class UserModel extends CI_Model {


public function select_max()
{ 
			$this->db->select_max('id_user');
			return $this->db->get('user');
		
}
public function simpan_register($data)
{

		return $this->db->insert("user", $data);
}
	public function data_AllUser($post)
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
		$from = 'user u';
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
	public function edit_user($in, $id)
	{
		$this->db->where('id_user', $id);
		return $this->db->update('user', $in);
	}
	public function cekPasswordOld($id_user)
	{
		$this->db->select_max('password');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		
		
		return $this->db->get()->result()[0];
	}
	public function getUserById($id_user)
	{
		$this->db->select('*');
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('user');
		return $query->result();
		# code...
	}
	public function HapusUser($id_user)
	{
		$this->db->where('id_user', $id_user);

		$this->db->delete('user');
		$query = $this->db->get('user s');

		return $query->result();


		# code...
	}
		public function getUserByEmailPass($email,$password)
	{
		// var_dump($password);
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		return $query->result();
	}
	public function getUserByX($x,$data)
	{
		$this->db->from('user');
		$this->db->where($x, $data);
		$query = $this->db->get();
		return count($query->result());
		
	}


                        
                            
                        
}
                        
/* End of file UserModel.php */
    
                        