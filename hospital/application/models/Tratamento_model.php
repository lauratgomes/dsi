<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tratamento_model extends CI_Model{

	// CRUD_Tratamento TRATAMENTOS
	// INSERT
	public function insert_tratamentos($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('tratamentos', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('CRUD_Tratamento/retrieve_tratamentos');
		endif;
	}

	// SELECT
	public function select_tratamentos($cpf = NULL) {
		if ($cpf != NULL):
			$this->db->where('cpf_paciente', $cpf);
			$this->db->limit(1);
			return $this->db->get('tratamentos');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_tratamentos() {
		$this->db->order_by('cpf_paciente');
		return $this->db->get('tratamentos');
	}

	// UPDATE
	public function update_tratamentos($dados = NULL, $cpf = NULL) {
		if ($dados != NULL && $cpf != NULL):
			//var_dump($cpf);
			$this->db->where('cpf_paciente', $cpf);
			$this->db->update('tratamentos', $dados);
			redirect('CRUD_Tratamento/retrieve_tratamentos');
		endif;
	}

	// DELETE
	public function delete_tratamentos($cpf = NULL) {
		if ($cpf != NULL):
			$this->db->delete('tratamentos', $cpf);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('CRUD_Tratamento/retrieve_tratamentos');
		endif;
	}
}