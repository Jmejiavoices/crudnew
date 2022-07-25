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
			if ($this->crud_model->delete_entry($del_id)) {
				$data = array('responce' => 'success');
			} else {
				$data = array('responce' => 'error');
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

			if ($post =	$this->crud_model->edit_entry($edit_id)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'failed to fetch record');
			}

			echo json_encode($data);
		} else {

			echo "No direct script access allowed";
		}
	}

	public function update()
	{

		if ($this->input->is_ajax_request()) {


			$this->form_validation->set_rules('edit_name', 'name', 'required');
			$this->form_validation->set_rules('edit_ap', 'ap', 'required');
			$this->form_validation->set_rules('edit_am', 'am', 'required');
			$this->form_validation->set_rules('edit_edad', 'edad', 'required');
			$this->form_validation->set_rules('edit_email', 'email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {

				$data['id'] = $this->input->post('edit_record_id');
				$data['name'] = $this->input->post('edit_name');
				$data['ap'] = $this->input->post('edit_ap');
				$data['am'] = $this->input->post('edit_am');
				$data['edad'] = $this->input->post('edit_edad');
				$data['email'] = $this->input->post('edit_email');
				if ($this->crud_model->update_entry($data)) {

					$data = array('responce' => 'success', 'message' => 'Usuaio Actualizado con Éxito');
				} else {
					$data = array('responce' => 'error', 'message' => 'No se Actualizó el Usuario');
				}
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}





	public function  spreadssheet_import()
	{

		$upload_file = $_FILES['upload_file']['name'];
		$extension = pathinfo($upload_file, PATHINFO_EXTENSION);

		if ($extension == 'csv') {
		 $reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if ($extension == 'xls') {
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else {
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}


		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet->toArray();
		echo '<pre>';
		print_r($sheetdata);

	}
}
