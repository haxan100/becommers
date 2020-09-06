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
		
		// var_dump($this->db->last_query());die;
		// return 

		# code...
	}














}

