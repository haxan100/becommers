<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Semua_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class SemuaModel extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

	public function ubah($nama_tabel,$nama_id,$id,$data)
	{
		$this->db->where($nama_id, $id);
		return $this->db->update($nama_tabel, $data);
		//  echo $this->db->last_query(); die;
		
		# code...
	}
	public function getDataByID($tabel, $nama_field,$id)
	{
		$this->db->select('*');
		$this->db->where($nama_field, $id);
		$query = $this->db->get($tabel);
		return $query->result();
		# code...
	}
	public function HapusDataByID($tabel, $nama_field,$id)
	{
		$this->db->where($nama_field, $id);
		$this->db->delete($tabel);
		$query = $this->db->get($tabel);
		return $query->result();	
	}

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Semua_model.php */
/* Location: ./application/models/Semua_model.php */
