<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Doenca_model extends CI_Model{

	// SELECT
	public function select_doencas($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('doencas');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_doencas() {
		$this->db->order_by('codigo');
		return $this->db->get('doencas');
	}

	// SEARCH
	public function search_doencas($codigo = NULL, $descricao = NULL) {
		if ($codigo != NULL && $descricao != NULL) {
			$array = array('codigo'=>$codigo, 'descricao'=>$descricao);
			$this->db->like($array);
		}

		if ($codigo != NULL && $descricao == NULL) {
			$this->db->like('codigo', $codigo, 'both');
		} 

		if ($descricao != NULL && $codigo == NULL) {
			$this->db->like('descricao', $descricao, 'after');
		}

		$this->db->order_by('codigo');
		return $this->db->get('doencas');
	}
}