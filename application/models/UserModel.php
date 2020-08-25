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

                        
                            
                        
}
                        
/* End of file UserModel.php */
    
                        