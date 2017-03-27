<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Api extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        $this->load->model('employee_model');
    }
	
	// get all employees if no parameter supplied
	public function employees_get()
	{
		if(! $this->get('id'))
		{
			// get all record
			$employees = $this->employee_model->get_all();
		} else {
			// get a record based on ID
			$employees = $this->employee_model->get_employee($this->get('id'));
		}
		
		if($employees)
		{
			$this->response($employees, 200); // 200 being the HTTP response code
		} else {
			$this->response([], 404);
		}
	}
	
	public function employees_post()
	{
		if(! $this->post('employeeName'))
		{
			$this->response(array('error' => 'Missing post data: employeeName'), 400);
		}
		else{
			$data = array(
				'emp_name' => $this->post('employeeName')
			);
		}
		$this->db->insert('tbl_employees',$data);
		if($this->db->insert_id() > 0)
		{
			$message = array('id' => $this->db->insert_id(), 'employeeName' => $this->post('employeeName'));
			$this->response($message, 200); // 200 being the HTTP response code
		}
	}
	
	public function employees_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->employee_model->delete_employee($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200); // 200 being the HTTP response code
		}
	}
	
	public function employees_put()
	{
		//perform validation
		if(! $this->put('employeeName'))
		{
			$this->response(array('error' => 'Employee Name is required'), 400);
		}
		
		$data = array(
			'emp_name'	=> $this->put('employeeName')
		);
		
		
		$this->employee_model->update_task($this->put('id'), $data);
		$message = array('success' => $this->put('employeeName').' Updated!');
		$this->response($message, 200);
	}

}