<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('crud_model');
	}




	public function index()
	{
		$this->load->view('welcome_message');
	}






	public function insert()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('ap', 'ap', 'required');
			$this->form_validation->set_rules('am', 'am', 'required');
			$this->form_validation->set_rules('edad', 'edad', 'required');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {

				$ajax_data =  $this->input->post();
				if ($this->crud_model->insert_entry($ajax_data)) {

					$data = array('responce' => 'success', 'message' => 'Usuaio Agregado con Éxito');
				} else {
					$data = array('responce' => 'error', 'message' => 'No se Agrego el Usuario');
				}
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function fetch()
	{
		if ($this->input->is_ajax_request()) {
			if ($posts = $this->crud_model->get_entries()) {
				$data = array('responce' => 'success', 'posts' => $posts);
			} else {
				$data = array('responce' => 'error', 'message' => 'Failed to fetch data');
			}
			echo  json_encode($data);
		} else {

			echo "No direct script access allowed";
		}
	}

	public function delete()
	{

		if ($this->input->is_ajax_request()) {
			$del_id = $this->input->post('del_id');
if($this->crud_model->delete_entry($del_id)){
$data = array ('responce' => 'success');
} else{
	$data = array ('responce' => 'error');

}
			
			echo json_encode($data);
		} else {

			echo "No direct script access allowed";
		}
	}

	public function edit()
	{

		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			$data = array('edit_id' => $edit_id);
			echo json_encode($data);
		} else {

			echo "No direct script access allowed";
		}
	}
}
