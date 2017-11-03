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

		// SELECT TRATAMENTOS PELO CPF_PACIENTE
		public function select_tratamentos_paciente($cpf_paciente = NULL) {
			if ($cpf_paciente != NULL):
				$where = "cpf_paciente = '$cpf_paciente' AND data_hora_saida IS NULL";

				$this->db->select('id');
				$this->db->where($where);
				$teste = $this->db->get('tratamentos');
				$t = $teste->result();

				return $t[0]->id;
			endif;
		}

		// SELECT ALL
		public function selectAll_tratamentos() {
			$this->db->order_by('id');
			return $this->db->get('tratamentos');
		}

		// UPDATE
		public function update_tratamentos($dados = NULL, $id_tratamento = NULL) {
			if ($dados != NULL && $id_tratamento != NULL):
				$this->db->where('id', $id_tratamento);
				$this->db->update('tratamentos', $dados);
				redirect('CRUD_Tratamento/retrieve_tratamentos');
			endif;
		}

		// DELETE
		public function delete_tratamentos($cpf_paciente = NULL) {
			if ($cpf_paciente != NULL):
				$this->db->delete('tratamentos', $cpf_paciente);
			endif;
		}

		public function registra_saidas($dados_saida = NULL, $id_tratamento) {
			if ($dados_saida != NULL && $id_tratamento != NULL) {
				$this->db->where('id', $id_tratamento);			
				$this->db->update('tratamentos', $dados_saida);
			} else {
				return -1;
			}
		}
	}