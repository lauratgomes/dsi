<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function do_insert($dados=NULL, $permissoes=NULL) {
		if($dados!=NULL):
			$this->db->insert('usuarios',$dados);
			$id_usuario = $this->db->insert_id();
			$this->do_insert_permissoes($permissoes, $id_usuario);
			$this->session->set_flashdata('cadastrook','Cadastro realizado com sucesso!');
			redirect('CRUD_Usuario/create');
		endif;
	}

	public function do_insert_permissoes($permissoes, $id_usuario) {
		foreach ($permissoes as $permissao) {
			$array = array('id_usuario' => $id_usuario, 'id_permissao' => (int)$permissao);
			$this->db->insert('usuario_permissao', $array);
		}
	}

	public function do_update($dados=NULL,$id=NULL,$permissoes=NULL) {
		if($dados!=NULL && $id!=NULL):
			$this->exclui_permissoes($permissoes, $id);
			$this->do_insert_permissoes($permissoes, $id);
			$this->db->update('usuarios', $dados, array('id' => $id));
			$this->session->set_flashdata('edicaook','Atualização realizada com sucesso!');
			redirect(current_url());
		endif;
	}

	public function exclui_permissoes($permissoes, $id) {
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuario_permissao');
	}

	public function busca_permissoes($id) {
		$this->db->where('id_usuario', $id);
		return $this->db->get('usuario_permissao');
	}

	public function do_delete($id=NULL) {
		if($id!=NULL):
			$this->db->delete('usuarios',$id);
			$this->session->set_flashdata('exclusaook','Registro excluído 
				com sucesso!');
			redirect('CRUD_Usuario/retrieve');
		endif;
	}

	public function get_all() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('usuarios');
	}

	public function get_permissoes() {
		return $this->db->get('usuario_permissao');
	}

	public function get_byid($id=NULL) {
		if ($id != NULL):
			$this->db->order_by('id', 'ASC');
			$this->db->where('id',$id);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
	}

}