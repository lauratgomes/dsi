<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_model extends CI_Model{

	// SELECT
	public function select_registros($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('registros');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_registros() {
		$this->db->order_by('id');
		return $this->db->get('registros');
	}
}