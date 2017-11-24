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
		$this->load->model('Paciente_model');
		$this->load->model('Quarto_model');
		$this->load->model('Medico_model');
	}
	
	// CRUD TRATAMENTOS (C - ; R - OK; U - ; D - ;)
	public function create_tratamentos() {
		$this->form_validation->set_rules('cpf_paciente','CPF_PACIENTE','required');
		$this->form_validation->set_rules('cpf_medico','CPF_MEDICO', 'required');
		$this->form_validation->set_rules('cid','CID','required');
		$this->form_validation->set_rules('remedio', 'REMEDIO', 'required');
		$this->form_validation->set_rules('data_hora_entrada', 'DATA_HORA_ENTRADA', 'required');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('cpf_paciente', 'cpf_medico', 'cid', 'remedio', 'quarto', 'data_hora_entrada'), $this->input->post());

			$this->Quarto_model->update_quartos_vagos($this->input->post('quarto'));
			$this->Tratamento_model->insert_tratamentos($dados);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_tratamentos',
			'pacientes' => $this->Paciente_model->selectAll_pacientes()->result(),
			'medicos' => $this->Medico_model->selectAll_medicos()->result(),
			'quartos' => $this->Quarto_model->selectAll_quartos_vagos()->result(),
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
		$this->form_validation->set_rules('quarto', 'QUARTO', 'required');

		if ($this->form_validation->run() == TRUE):
			$dados =  elements(array('cpf_medico', 'cid', 'remedio', 'quarto'), $this->input->post());

			$tratamento = $this->Tratamento_model->select_tratamentos($id_tratamento);

			$quarto_antigo = $tratamento[0]->quarto;
			$this->Quarto_model->update_libera_quarto($quarto_antigo);
			$this->Quarto_model->update_quartos_vagos($this->input->post('quarto'));

			$this->Tratamento_model->update_tratamentos($dados, $this->input->post('id_tratamento'));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_tratamentos',
			'medicos' => $this->Medico_model->selectAll_medicos()->result(),
			'quartos' => $this->Quarto_model->selectAll_quartos()->result(),
		);
		$this->load->view('crud', $dados);
	}


	public function delete_tratamentos() {
		$id_tratamento = $this->input->post('id_tratamento');
		$dados_saida = elements(array('data_hora_saida', 'saida'), $this->input->post());

		if ($id_tratamento > 0):
			$dados_tratamento = $this->Tratamento_model->select_tratamentos($id_tratamento)->result();

			$id_quarto = $dados_tratamento[0]->quarto;
			$this->Quarto_model->update_libera_quarto($id_quarto);

			if ($this->Tratamento_model->registra_saidas($dados_saida, $id_tratamento)) {
				if ($this->input->post('saida') == 'morte') {
					if ($this->Tratamento_model->delete_tratamentos($dados_tratamento[0]->cpf_paciente)) {
						$this->Paciente_model->delete_pacientes($dados_tratamento[0]->cpf_paciente);
					}
				} else {
					$this->Tratamento_model->selectAll_tratamentos();
				}
			}
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_tratamentos',
			'medicos' => $this->Medico_model->selectAll_medicos()->result(),
			'quartos' => $this->Quarto_model->selectAll_quartos()->result(),
		);
		$this->load->view('crud', $dados);
	}
}