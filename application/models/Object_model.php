<?php

class Object_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get('tbl_objects');
		return $query->result();
	}
	
	public function get_object($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_objects');
		return $query->result();
	}
	
	public function delete_object($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_objects');
	}
	
	public function update_ojbect($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_objects',$data);
	}
}