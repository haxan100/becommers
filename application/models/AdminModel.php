<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class AdminModel extends CI_Model {
                        
public function login(){
                        
                                
}
	public function getAllAdmin()
	{
		return $this->db->get('admin')->result_array();
	}
                        
                            
                        
}
                        
/* End of file AdminModel.php */
    
                        