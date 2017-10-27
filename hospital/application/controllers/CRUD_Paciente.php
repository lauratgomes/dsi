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
		$this->load->model('Registro_model');
		$this->load->model('Tratamento_model');
	}
	

	// CRUD PACIENTES (C - ; R - OK; U - ; D - ;)
	public function create_pacientes() {
		$this->form_validation->set_rules('cpf', 'CPF', 'trim|required|max_length[14]|is_unique[pacientes.cpf]');
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
			$dados = array('nome'=>$this->input->post('nome'), 'telefone'=>$this->input->post('telefone'), 'rua'=>$this->input->post('rua'), 'complemento'=>$this->input->post('complemento'));
			$this->Paciente_model->update_pacientes($dados, $this->input->post('cpf_paciente'));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_pacientes',
		);
		$this->load->view('crud', $dados);
	}


	public function delete_pacientes() {
		$cpf_paciente = $this->input->post('cpf_paciente');

		if ($cpf_paciente > 0):
			$saida = array('cpf_paciente'=>$cpf_paciente, 'data_hora_saida'=>$this->input->post('data_hora_saida'), 'saida'=>$this->input->post('saida'));
			
			$retorno = $this->Registro_model->registra_saidas($saida);
			
			if ($retorno != -1) {
				if ($saida == 'morte') {
					$dados = $this->Registro_model->select_registros($id_registro);
					
					//$this->Paciente_model->gera_certidao_obito($dados);
				}

				$tratamento = $this->Tratamentos_model->select_tratamento_registro($id_registro);
				$this->Tratamentos_model->delete_tratamentos($id_tratamento);
				$this->Paciente_model->delete_pacientes(array('id' => $cpf_paciente));
			}
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_pacientes',
		);
		$this->load->view('crud', $dados);
	}


	public function pesquisa_pacientes() {
		$nome = $this->input->post('nome');

		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_pacientes',
			'pacientes' => $this->Paciente_model->search_pacientes($nome)->result(),
		);
		$this->load->view('crud', $dados);
	}
}