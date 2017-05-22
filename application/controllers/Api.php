<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Api extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        $this->load->model('object_model');
    }
	
	// get all ojbects if no parameter supplied
	public function objects_get()
	{
		if(! $this->get('id'))
		{
			// get all record
			$employees = $this->object_model->get_all();
		} else {
			// get a record based on ID
			$employees = $this->object_model->get_employee($this->get('id'));
		}

		if($employees)
		{
			$this->response($employees, 200); // 200 being the HTTP response code
		} else {
			$this->response([], 404);
		}
	}
	
	public function objects_post()
	{

		if(! $this->post('objectName'))
		{
			$this->response(array('error' => 'Missing post data: objectName'), 400);
		}
		else{
			$data = array(
				'name' => $this->post('objectName')
			);
		}
		
		$this->db->insert('tbl_objects',$data);
		
		if($this->db->insert_id() > 0)
		{
			$message = array('id' => $this->db->insert_id(), 'objectName' => $this->post('objectName'));
			$this->response($message, 200); // 200 being the HTTP response code
		}
	}
	
	public function objects_delete($id=NULL)
	{
		if($id == NULL)
		{
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			$this->object_model->delete_object($id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200); // 200 being the HTTP response code
		}
	}
	
	public function objects_put()
	{

		// perform validation
		if(! $this->put('name'))
		{
			$this->response(array('error' => 'Object Name is required'), 400);
		}
		
		$data = array(
			'name'				=> $this->put('name'),
			'description' => $this->put('description')
		);
		
		$this->object_model->update_ojbect($this->put('id'), $data);
		$message = array('success' => $this->put('name').' Updated!');
		$this->response($message, 200);
	}

}