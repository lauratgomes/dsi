<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Medicamento extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->helper('file');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->library('upload');
		$this->load->model('Medicamento_model');
	}
	
	// CRUD MEDICAMENTOS (C - ; R - ; U - ; D - )
	public function create_medicamentos() {
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('nome'), $this->input->post());
			$this->Medicamento_model->insert_medicamentos($dados);
		}

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_medicamentos',
			);
		$this->load->view('crud',$dados);
	}

	public function retrieve_medicamentos() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_medicamentos',
			'medicamentos' => $this->Medicamento_model->selectAll_medicamentos()->result(),
			);
		$this->load->view('crud', $dados);
	}

	public function update_medicamentos() {
		$this->form_validation->set_rules('nome', 'NOME', 'trim|required|max_length[50]');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('nome'), $this->input->post());
			$this->Medicamento_model->update_medicamentos($dados, array('id' => $this->input->post('id_medicamento')));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_medicamentos',
			);
		$this->load->view('crud', $dados);
	}

	public function delete_medicamentos() {
		if ($this->input->post('id_medicamento') > 0):
			$this->Medicamento_model->delete_medicamentos(array('id' => $this->input->post('id_medicamento')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_medicamentos',
			);
		$this->load->view('crud', $dados);
	}

	public function pesquisa_medicamentos() {
		$nome = $this->input->post('nome');

		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_medicamentos',
			'medicamentos' => $this->Medicamento_model->search_medicamentos($nome)->result(),
		);
		$this->load->view('crud', $dados);
	}
}