<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medico_model extends CI_Model{

	// CRUD MEDICOS
	// INSERT
	public function insert_medicos($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('medicos', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('CRUD_Medico/retrieve_medicos');
		endif;
	}

	// SELECT
	public function select_medicos($cpf = NULL) {
		if ($cpf != NULL):
			$this->db->where('cpf', $cpf);
			$this->db->limit(1);
			return $this->db->get('medicos');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_medicos() {
		$this->db->order_by('cpf');
		return $this->db->get('medicos');
	}

	// UPDATE
	public function update_medicos($dados = NULL, $cpf = NULL) {
		if ($dados != NULL && $cpf != NULL):
			$this->db->update('medicos', $dados);
			$this->db->where('cpf', $cpf);
			redirect('CRUD_Medico/retrieve_medicos');
		endif;
	}

	// DELETE
	public function delete_medicos($cpf = NULL) {
		if ($cpf != NULL):
			$this->db->delete('medicos', $cpf);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('CRUD_Medico/retrieve_medicos');
		endif;
	}
}