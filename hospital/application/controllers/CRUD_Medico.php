<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Medico extends CI_Controller {

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
		$this->load->model('Medico_model');
	}
	
	// CRUD MÉDICOS (C - ; R - ; U - ; D - ;)
	public function create_medicos() {
		$this->form_validation->set_rules('cpf','CPF','trim|required|max_length[11]|is_unique[medicos.cpf]');
		$this->form_validation->set_rules('crm_coren','CRM_COREN','trim|required|max_length[10]');
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]');
		$this->form_validation->set_rules('nascimento','NASCIMENTO', 'required');
		$this->form_validation->set_rules('cep','CEP','trim|required|max_length[8]');
		$this->form_validation->set_rules('rua','RUA','trim|required|max_length[50]');
		$this->form_validation->set_rules('complemento','COMPLEMENTO','trim|required|max_length[20]');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('cpf', 'crm_coren', 'nome', 'nascimento', 'cep', 'rua', 'complemento'), $this->input->post());
			$this->Medico_model->insert_medicos($dados);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_medicos',
		);
		$this->load->view('crud', $dados);
	}

	public function retrieve_medicos() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_medicos',
			'medicos' => $this->Medico_model->selectAll_medicos()->result(),
		);
		$this->load->view('crud',$dados);
	}

	public function update_medicos() {
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]');
		$this->form_validation->set_rules('nascimento','NASCIMENTO', 'required');
		$this->form_validation->set_rules('cep','CEP','trim|required|max_length[8]');
		$this->form_validation->set_rules('rua','RUA','trim|required|max_length[50]');
		$this->form_validation->set_rules('complemento','COMPLEMENTO','trim|required|max_length[20]');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('nome','nascimento', 'cep', 'rua', 'complemento'), $this->input->post());
			$this->Medico_model->update_medicos($dados, $this->input->post('id_medico'));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_medicos',
		);
		$this->load->view('crud', $dados);
	}

	public function delete_medicos() {
		if ($this->input->post('id_medico') > 0):
			$this->Medico_model->delete_medicos(array('cpf' => $this->input->post('id_medico')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_medicos',
		);
		$this->load->view('crud', $dados);
	}


	public function pesquisa_medicos() {
		$nome = $this->input->post('nome');

		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_medicos',
			'medicos' => $this->Medico_model->search_medicos($nome)->result(),
		);
		$this->load->view('crud', $dados);
	}
}