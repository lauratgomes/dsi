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
	public function select_tratamentos($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('tratamentos');
		else:
			return FALSE;
		endif;
	}

	public function select_registros($id_tratamento = NULL) {
		if ($id_tratamento != NULL):
			$this->db->select('id_registro');
			$this->db->where('id', $id_tratamento);
			$this->db->limit(1);
			return $this->db->get('tratamentos');
		endif;
	}

	public function select_tratamento_registro($id_registro = NULL) {
		if ($id_registro != NULL) {
			$this->db->where('id_registro', $id_registro);
			$tratamento = $this->db->get('tratamentos')->result();
			return $tratamento;
		}
	}

	// SELECT ALL
	public function selectAll_tratamentos() {
		$this->db->from('tratamentos');
		$this->db->join('registros', 'registros.id = tratamentos.id_registro', 'inner');
		return $this->db->get();
	}

	// UPDATE
	public function update_tratamentos($remedio = NULL, $id_tratamento = NULL) {
		if ($remedio != NULL && $id_tratamento != NULL):
			$this->db->update('tratamentos', $remedio);
			$this->db->where('id', $id_tratamento);

			$this->db->select('id_registro');
			$this->db->from('tratamentos');
			$this->db->where('id', $id_tratamento);
			$id_registro = $this->db->get()->result();
			return $id_registro;
		endif;
	}

	// DELETE
	public function delete_tratamentos($id = NULL) {
		if ($id != NULL):
			$this->db->delete('tratamentos');
			$this->db->where('id', $id);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('CRUD_Tratamento/retrieve_tratamentos');
		endif;
	}
}