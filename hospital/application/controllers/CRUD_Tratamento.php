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
	}
	
	// CRUD TRATAMENTOS (C - ; R - ; U - ; D - ;)
	public function create_tratamentos() {
		$this->form_validation->set_rules('cpf_paciente','CPF_PACIENTE','required|is_unique[tratamento.cpf_paciente]');
		$this->form_validation->set_rules('cpf_medico','CPF_MEDICO', 'required');
		$this->form_validation->set_rules('cid','CID','required');
		$this->form_validation->set_rules('remedio', 'REMEDIO', 'required');


		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('cpf_paciente', 'cpf_medico', 'cid', 'remedio'), $this->input->post());
			$this->Tratamento_model->insert_tratamentos($dados);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_tratamentos',
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
			$dados = elements(array('cpf_medico', 'cid', 'remedio'), $this->input->post());
			var_dump($dados);
			echo "<br />";
			echo $this->input->post('id_tratamento');
			//$this->Tratamento_model->update_tratamentos($dados, array('cpf_paciente' => $this->input->post('id_tratamento')));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_tratamentos',
		);
		$this->load->view('crud', $dados);
	}

	public function delete_tratamentos() {
		if ($this->input->post('id_tratamento') > 0):
			$this->Tratamento_model->delete_tratamentos(array('id' => $this->input->post('id_tratamento')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_tratamentos',
		);
		$this->load->view('crud', $dados);
	}
}