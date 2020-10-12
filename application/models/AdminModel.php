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
                        
                            
                        
}
                        
/* End of file AdminModel.php */
    
                        