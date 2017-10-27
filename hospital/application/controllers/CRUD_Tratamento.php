<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Tratamento extends CI_Controller {

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
		$this->load->model('Tratamento_model');
		$this->load->model('Registro_model');
		$this->load->model('Paciente_model');
		$this->load->model('Quarto_model');
	}
	
	// CRUD TRATAMENTOS (C - ; R - OK; U - ; D - ;)
	public function create_tratamentos() {
		$this->form_validation->set_rules('cpf_paciente','CPF_PACIENTE','required');
		$this->form_validation->set_rules('cpf_medico','CPF_MEDICO', 'required');
		$this->form_validation->set_rules('cid','CID','required');
		$this->form_validation->set_rules('remedio', 'REMEDIO', 'required');
		$this->form_validation->set_rules('data_hora_entrada', 'DATA_HORA_ENTRADA', 'required');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('cpf_paciente', 'cpf_medico', 'cid', 'data_hora_entrada', 'quarto'), $this->input->post());
			$id_registro = $this->Registro_model->insert_registros($dados);
			if ($id_registro != NULL) {
				$registro = array('id_registro'=>$id_registro,'remedio'=>$this->input->post('remedio'));
				
				$vetor = elements(array('id_registro', 'remedio'), $registro);
				$this->Tratamento_model->insert_tratamentos($vetor);
			}
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_tratamentos',
			'quartos' => $this->Quarto_model->selectAll_quartos()->result(),
		);
		$this->load->view('crud', $dados);
	}


	public function retrieve_tratamentos() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_tratamentos',
			'tratamentos' => $this->Tratamento_model->selectAll_tratamentos()->result(),
		);
		$this->load->view('crud',$dados);
	}


	public function update_tratamentos() {
		$this->form_validation->set_rules('cpf_medico','CPF_MEDICO', 'required');
		$this->form_validation->set_rules('cid','CID','required');
		$this->form_validation->set_rules('remedio', 'REMEDIO', 'required');

		if ($this->form_validation->run() == TRUE):
			$remedio =  elements(array('remedio'), $this->input->post());
			$id_registro = $this->Tratamento_model->update_tratamentos($remedio, $this->input->post('id_tratamento'));
		
			$dados = elements(array('cpf_medico', 'cid', 'quarto'), $this->input->post());
			$this->Registro_model->update_registros($dados, $id_registro);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_tratamentos',
			'quartos' => $this->Quarto_model->selectAll_quartos()->result(),
		);
		$this->load->view('crud', $dados);
	}


	public function delete_tratamentos() {
		$id_tratamento = $this->input->post('id_tratamento');
		$dados = elements(array('data_hora_saida', 'saida'), $this->input->post());

		if ($id_tratamento > 0):
			$this->Tratamento_model->delete_tratamentos(array('id' => $id_tratamento));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_tratamentos',
		);
		$this->load->view('crud', $dados);
	}
}