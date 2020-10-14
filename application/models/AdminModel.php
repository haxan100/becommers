<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class AdminModel extends CI_Model {
                        
public function login(){
                        
                                
}
	public function getAllAdmin()
	{
		return $this->db->get('admin')->result_array();
	}
	public function ubahAdminAktiv($id,$ubah)
	{
		$this->db->set('status', $ubah);
		$this->db->where('id_admin', $id);
		$this->db->update('admin');
	}
	public function ubahKeSuperAdmin($id,$ubah)
	{
		$this->db->set('id_role', $ubah);
		$this->db->where('id_admin', $id);
		$this->db->update('admin');
	}
	public function getAdminByID($id)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $id);


		return  $this->db->get()->row_array();
	}
	public function ubahdatapassword($data)
	{
		// var_dump($data);die;
		$this->db->set('password', $data['password']);

		$this->db->where('id_admin', intval($data['id_admin']));
		$query = $this->db->update('admin', $data);

		return  $query;
	}
	public function ubahdatafoto($data)
	{
		// var_dump($data);die;
		$this->db->set('image', $data['image']);

		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('admin', $data);
	}
	public function ubahAdminByID($data)
	{
		// var_dump($data);die;
		$this->db->set('nama_admin', $data['nama_admin']);
		$this->db->set('username', $data['username']);
		$this->db->set('id_role', $data['id_role']);
		$this->db->set('email', $data['email']);
		$this->db->set('no_telepon', $data['no_telepon']);
		$this->db->set('status', $data['status']);


		$this->db->where('id_admin', $data['id_admin']);
		$this->db->update('admin', $data);
	}
	public function hapusAdminByID($id)
	{
		$this->db->where('id_admin', $id);
		$this->db->delete('admin');
	}
	public function tambah($in, $table)
	{

		return $this->db->insert($table, $in);
	}
		function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

                        
                            
                        
}
                        
/* End of file AdminModel.php */
    
                        