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
	
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_objects');
		return $query->result();
	}
	
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_objects');
	}
	
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_objects',$data);
	}
}
