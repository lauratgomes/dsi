<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quarto_model extends CI_Model{

	// CRUD QUARTOS
	// INSERT
	public function insert_quartos($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('quartos', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('CRUD_Quarto/retrieve_quartos');
		endif;
	}

	// SELECT
	public function select_quartos($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('quartos');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_quartos() {
		$this->db->order_by('id');
		return $this->db->get('quartos');
	}

	// UPDATE
	public function update_quartos($dados = NULL, $id = NULL) {
		if ($dados != NULL && $id != NULL):
			$this->db->where('id', $id);
			$this->db->update('quartos', $dados);
			redirect('CRUD_Quarto/retrieve_quartos');
		endif;
	}

	// DELETE
	public function delete_quartos($id = NULL) {
		if ($id != NULL):
			$this->db->delete('quartos', $id);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('CRUD_Quarto/retrieve_quartos');
		endif;
	}
}