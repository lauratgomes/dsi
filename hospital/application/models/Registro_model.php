<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_Model{

	// INSERT
	public function insert_registros($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('registros', $dados);
			return $this->db->insert_id();
			redirect('CRUD_Paciente/retrieve_pacientes');
		endif;
	}

	// SELECT
	public function select_registros($id_registro = NULL) {
		if ($id_registro != NULL):
			$this->db->from('registros');
			$this->db->join('tratamentos', 'tratamentos.$id_registro = registros.id', 'inner');
			$this->db->limit(1);
			return $this->db->get();
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_registros() {
		$this->db->join('tratamentos', 'tratamentos.$id_registro = registros.id', 'inner');
		return $this->db->get('registros');
	}

	// UPDATE
	public function update_registros($dados = NULL, $id_registro = NULL) {
		if ($dados != NULL && $id_registro != NULL):
			$this->db->update('registros', $dados);
			$this->db->where('id', $id_registro);
			redirect('CRUD_Registro/retrieve_registros');
		endif;
	}

	public function registra_saidas($dados = NULL) {
		if ($dados != NULL) {
			$this->db->update('registros', $dados);
			
		} else {
			return -1;
		}
	}
}