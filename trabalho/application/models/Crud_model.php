<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model{

	// CRUD NOTICIAS
	// INSERT
	public function insert_noticias($dados = NULL){
		if ($dados != NULL):
				echo $this->db->insert('noticia', _id())) {
			}
		endif;
	}

	// SELECT
	public function select_noticias($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('noticia');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_noticias() {
		$this->db->order_by('data', 'desc');
		return $this->db->get('noticia');
	}

	// UPDATE
	public function update_noticias($dados = NULL, $id = NULL) {
		if ($dados != NULL && $id != NULL):
			$this->db->update('noticia', $dados, $id);
			$this->session->set_flashdata('edicaook, Cadastro realizado com sucesso!');
			redirect('crud/retrieve');
		endif;
	}

	// DELETE
	public function delete_noticias($id = NULL) {
		if ($id != NULL):
			$this->db->delete('noticia', $id);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('crud/retrieve');
		endif;
	}




	// CRUD USUARIOS
	// INSERT
	public function insert_usuarios($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('usuario',$dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('crud/retrieve_usuarios');
		endif;
	}

	// SELECT
	public function select_usuarios($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('usuario');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_usuarios() {
		return $this->db->get('usuario');
	}

	// UPDATE
	public function update_usuarios($dados = NULL, $id = NULL) {
		if ($dados != NULL && $id != NULL):
			$this->db->update('usuario', $dados, $id);
			$this->session->set_flashdata('edicaook, Cadastro realizado com sucesso!');
			redirect('crud/retrieve_usuarios');
		endif;
	}

	// DELETE
	public function delete_usuarios($id = NULL) {
		if ($id != NULL):
			$this->db->delete('usuario', $id);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('crud/retrieve_usuarios');
		endif;
	}



	public function session_login($dados = NULL) {	
		if ($dados != NULL) {
			if ($dados['login'] == 'admin') {
				$where = "login = 'admin' AND senha = '" . $dados['senha'] . "'";
			} else {
				$where = "login = '" . $dados['login'] . "' AND senha = '" . $dados['senha'] . "'";
			}

			$query = $this->db->query("SELECT * FROM usuario WHERE " . $where . " LIMIT 1");

			if ($query->row()) {
				$vet = [];
				foreach ($query->result() as $row) {
			    	$vet[] = $row->login;
			    	$vet[] = $row->permissao;
				}

				return $vet;
			} else {
				return;
			}
		}
	}
}