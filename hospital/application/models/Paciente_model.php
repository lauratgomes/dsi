<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_model extends CI_Model{

	// CRUD PACIENTES
	// INSERT
	public function insert_pacientes($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('pacientes', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('CRUD_Paciente/retrieve_pacientes');
		endif;
	}

	// SELECT
	public function select_pacientes($cpf = NULL) {
		if ($cpf != NULL):
			$this->db->where('cpf', $cpf);
			$this->db->limit(1);
			return $this->db->get('pacientes');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_pacientes() {
		$this->db->order_by('cpf');
		return $this->db->get('pacientes');
	}

	// UPDATE
	public function update_pacientes($dados = NULL, $cpf = NULL) {
		if ($dados != NULL && $cpf != NULL):
			$this->db->update('pacientes', $dados);
			$this->db->where('cpf', $cpf);
			redirect('CRUD_Paciente/retrieve_pacientes');
		endif;
	}

	// DELETE
	public function delete_pacientes($cpf = NULL) {
		if ($cpf != NULL):
			$this->db->delete('pacientes', $cpf);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('CRUD_Paciente/retrieve_pacientes');
		endif;
	}


	public function registra_saidas($dados = NULL, $saida = NULL) {
		if ($dados != NULL && $saida != NULL) {
			var_dump($dados);
			//$this->db->insert('registros', $dados)
		}
	}
}