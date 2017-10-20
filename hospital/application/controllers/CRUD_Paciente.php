<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Paciente extends CI_Controller {

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
		$this->load->model('Paciente_model');
	}
	
	// CRUD PACIENTES (C - ; R - OK; U - ; D - ;)
	public function create_pacientes() {
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|max_length[14]|is_unique[paciente.cpf]');
		$this->form_validation->set_rules('rg','RG','trim|required|max_length[10]');
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]');
		$this->form_validation->set_rules('telefone','TELEFONE','trim|required|max_length[14]');
		$this->form_validation->set_rules('rua','RUA','trim|required|max_length[50]');
		$this->form_validation->set_rules('complemento', 'COMPLEMENTO', 'trim|required|max_length[20]');


		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('cpf', 'rg', 'nome', 'telefone', 'rua', 'complemento'), $this->input->post());
			$this->Paciente_model->insert_pacientes($dados);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_pacientes',
		);
		$this->load->view('crud', $dados);
	}

	public function retrieve_pacientes() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_pacientes',
			'pacientes' => $this->Paciente_model->selectAll_pacientes()->result(),
		);
		$this->load->view('crud', $dados);
	}

	public function update_pacientes() {
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]');
		$this->form_validation->set_rules('telefone','TELEFONE','trim|required|max_length[14]');
		$this->form_validation->set_rules('rua','RUA','trim|required|max_length[50]');
		$this->form_validation->set_rules('complemento', 'COMPLEMENTO', 'trim|required|max_length[20]');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('nome', 'telefone', 'rua', 'complemento'), $this->input->post());
			$this->Paciente_model->update_pacientes($dados, array('cpf' => $this->input->post('id_paciente')));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_pacientes',
		);
		$this->load->view('crud', $dados);
	}

	public function delete_pacientes() {
		$id_paciente = $this->input->post('id_paciente');
		if ($id_paciente > 0):
			$saida = $this->imput->post('saida');
			$this->Paciente_model->registra_saidas($this->select_pacientes($id_paciente), $saida);
			//$this->Paciente_model->delete_pacientes(array('id' => $this->input->post('id_paciente')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_pacientes',
		);
		$this->load->view('crud', $dados);
	}
}