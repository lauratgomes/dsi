<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	// CRUD USUARIOS
	// INSERT
	public function insert_usuarios($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('usuarios', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('CRUD_Usuario/retrieve_usuarios');
		endif;
	}

	// SELECT
	public function select_usuarios($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_usuarios() {
		$this->db->order_by('id');
		return $this->db->get('usuarios');
	}

	// UPDATE
	public function update_usuarios($dados = NULL, $id = NULL) {
		if ($dados != NULL && $id != NULL):
			$this->db->update('usuarios', $dados, $id);
			redirect('CRUD_Usuario/retrieve_usuarios');
		endif;
	}

	// DELETE
	public function delete_usuarios($id = NULL) {
		if ($id != NULL):
			$this->db->delete('usuarios', $id);
			$this->session->set_flashdata('exclusaook', 'Registro excluído com sucesso!');
			redirect('CRUD_Usuario/retrieve_usuarios');
		endif;
	}

	public function session_login($dados = NULL) {	
		if ($dados != NULL) {
			if ($dados['login'] == 'admin') {
				$where = "login = 'admin' AND senha = '" . md5($dados['senha']) . "'";
			} else {
				$where = "login = '" . $dados['login'] . "' AND senha = '" . md5($dados['senha']) . "'";
			}

			$query = $this->db->query("SELECT * FROM usuarios WHERE " . $where . " LIMIT 1");

			if ($query->row()) {
				$vet = [];
				foreach ($query->result() as $row) {
			    	$vet[] = $row->id;
			    	$vet[] = $row->login;
			    	$vet[] = $row->admin;
				}

				return $vet;
			} else {
				return -1;
			}
		}
	}
}