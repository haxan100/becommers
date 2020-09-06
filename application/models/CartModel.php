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
		$this->db->where('id_produk', $id);
		return $this->db->update('keranjang', $in);
	}














}

