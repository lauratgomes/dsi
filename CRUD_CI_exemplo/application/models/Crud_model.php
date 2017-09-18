<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model{

	// INSERT
	public function do_insert($dados=NULL){
		if($dados!=NULL):
			$this->db->insert('noticia',$dados);
			//utilização de session para confirmar cadastro
			$this->session->set_flashdata('cadastrook','Cadastro realizado com sucesso!');
			redirect('crud/retrieve');
		endif;
	}

	// SELECT ALL
	public function get_all() {
		return $this->db->get('noticia');
	}

	// SELECT
	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('noticia');
		else:
			return FALSE;
		endif;
	}

	// UPDATE
	public function do_update($dados=NULL, $condicao=NULL) {
		if ($dados!=NULL && $condicao!=NULL):
			$this->db->update('noticia', $dados, $condicao);
			$this->session->set_flashdata('edicaook, Cadastro realizado com sucesso!');
			redirect('crud/retrieve');
		endif;
	}

	// DELETE
	public function do_delete($condicao = NULL) {
		if ($condicao != NULL):
			$this->db->delete('noticia', $condicao);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('crud/retrieve');
		endif;
	}
}