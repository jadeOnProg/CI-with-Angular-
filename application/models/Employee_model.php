<?php

class Employee_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get('tbl_employees');
		return $query->result();
	}
	
	public function get_employee($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_employees');
		return $query->result();
	}
	
	public function delete_employee($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_employees');
	}
	
	public function update_employee($id, $data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_employees',$data);
	}
}