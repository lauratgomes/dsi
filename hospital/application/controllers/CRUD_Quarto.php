<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Quarto extends CI_Controller {

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
		$this->load->model('Quarto_model');
	}
	
	// CRUD QUARTOS (C - OK; R - OK; U - OK; D - OK;)
	public function create_quartos() {
		$this->form_validation->set_rules('limite','LIMITE','required');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('limite'), $this->input->post());
			$this->Quarto_model->insert_quartos($dados);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_quartos',
		);
		$this->load->view('crud', $dados);
	}

	public function retrieve_quartos() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_quartos',
			'quartos' => $this->Quarto_model->selectAll_quartos()->result(),
		);
		$this->load->view('crud', $dados);
	}

	public function update_quartos() {
		$this->form_validation->set_rules('limite','LIMITE', 'required');

		if ($this->form_validation->run() == TRUE):
			$dados = $this->input->post('limite');
			$this->Quarto_model->update_quartos($dados, $this->input->post('id_quarto'));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_quartos',
		);
		$this->load->view('crud', $dados);
	}

	public function delete_quartos() {
		if ($this->input->post('id_quarto') > 0):
			$this->Quarto_model->delete_quartos(array('id' => $this->input->post('id_quarto')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_quartos',
		);
		$this->load->view('crud', $dados);
	}
}