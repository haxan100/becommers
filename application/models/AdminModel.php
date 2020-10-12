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
                        
                            
                        
}
                        
/* End of file AdminModel.php */
    
                        