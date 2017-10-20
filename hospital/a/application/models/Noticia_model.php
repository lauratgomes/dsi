<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia_model extends CI_Model{

	public function do_insert($dados=NULL) {
		if($dados!=NULL):
			$this->db->insert('noticias',$dados);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('cadastrook','Notícia cadastrada com sucesso!');
			return $id;
		endif;
	}

	public function get_all() {
		$this->db->order_by('data', 'DESC');
		return $this->db->get('noticias');
	}

	public function do_delete($id=NULL) {
		if($id!=NULL):
			$this->db->delete('noticias',$id);
			$this->session->set_flashdata('exclusaook','Notícia excluída com sucesso!');
			redirect('CRUD_Noticia/retrieve');
		endif;
	}

	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->order_by('id', 'DESC');
			$this->db->where('id',$id);
			$this->db->limit(1);
			return $this->db->get('noticias');
		else:
			return FALSE;
		endif;
	}

	public function do_update($dados=NULL,$id=NULL) {
		if($dados!=NULL && $id!=NULL):
			$this->db->update('noticias', $dados, array('id' => $id));
			$this->session->set_flashdata('edicaook','Atualização realizada com sucesso!');
			redirect('CRUD_Noticia/retrieve');
		endif;
	}

}