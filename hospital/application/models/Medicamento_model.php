<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamento_model extends CI_Model{

	// CRUD MEDICAMENTOS
	// INSERT
	public function insert_medicamentos($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('medicamentos', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('CRUD_Medicamento/retrieve_medicamentos');
		endif;
	}

	// SELECT
	public function select_medicamentos($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('medicamentos');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_medicamentos() {
		$this->db->order_by('id');
		return $this->db->get('medicamentos');
	}

	// UPDATE
	public function update_medicamentos($dados = NULL, $id = NULL) {
		if ($dados != NULL && $id != NULL):
			$this->db->update('medicamentos', $dados, $id);
			redirect('CRUD_Medicamento/retrieve_medicamentos');
		endif;
	}

	// DELETE
	public function delete_medicamentos($id = NULL) {
		if ($id != NULL):
			$this->db->delete('medicamentos', $id);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('CRUD_Medicamento/retrieve_medicamentos');
		endif;
	}


	public function search_medicamentos($nome = NULL) {
		if ($nome != NULL) {
			$this->db->like('nome', $nome, 'both');
			$this->db->order_by('id');
			return $this->db->get('medicamentos');
		} 
	}
}