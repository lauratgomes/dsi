<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quarto_model extends CI_Model{

	// CRUD QUARTOS
	// INSERT
	public function insert_quartos($dados = NULL){
		if ($dados != NULL):
			$this->db->insert('quartos', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastro realizado com sucesso!');
			redirect('CRUD_Quarto/retrieve_quartos');
		endif;
	}

	// SELECT
	public function select_quartos($id = NULL) {
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('quartos');
		else:
			return FALSE;
		endif;
	}

	// SELECT ALL
	public function selectAll_quartos() {
		$this->db->order_by('id');
		return $this->db->get('quartos');
	}

	public function selectAll_quartos_vagos() {
		$this->db->where('vago', true);
		$this->db->order_by('id');
		return $this->db->get('quartos');
	}

	// UPDATE
	public function update_quartos($dados = NULL, $id = NULL) {
		if ($dados != NULL && $id != NULL):
			$quarto = $this->select_quartos($id)->result();

			if ($quarto[0]->n_pacientes < $dados) {
				$arr = array('vago'=>true, 'limite'=>$dados);

				$this->db->where('id', $id);
				$this->db->update('quartos', $arr);
				redirect('CRUD_Quarto/retrieve_quartos');
			}

			if ($quarto[0]->n_pacientes == $dados) {
				$arr = array('limite'=>$dados, 'vago'=>false);

				$this->db->where('id', $id);
				$this->db->update('quartos', $arr);
				redirect('CRUD_Quarto/retrieve_quartos');
			}

			if ($quarto[0]->n_pacientes > $dados) {
				$dados = $quarto[0]->n_pacientes;

				$arr = array('limite'=>$quarto[0]->n_pacientes, 'vago'=>false);

				$this->db->where('id', $id);
				$this->db->update('quartos', $arr);
				redirect('CRUD_Quarto/retrieve_quartos');
			}
		endif;
	}

	public function update_quartos_vagos($id = NULL) {
		if ($id != NULL):

			$quarto = $this->select_quartos($id)->result();

			$n_pacientes = $quarto[0]->n_pacientes + 1;

			if ($n_pacientes == $quarto[0]->limite) {
				$vago = FALSE;

				$dados = array('vago'=>$vago, 'n_pacientes'=>$n_pacientes);
				
				$this->db->where('id', $id);
				$this->db->update('quartos', $dados);
			} else {
				$arr = array('n_pacientes'=>$n_pacientes);

				$this->db->where('id', $id);
				$this->db->update('quartos', $arr);
			}

			//redirect('CRUD_Quarto/retrieve_quartos');
		endif;
	}

	public function update_libera_quarto($id_quarto = NULL) {
		if ($id_quarto != NULL) {
			$quarto = $this->select_quartos($id_quarto)->result();

			$n_pacientes = $quarto[0]->n_pacientes - 1;
			$vago = true;

			$dados = array('vago'=>$vago, 'n_pacientes'=>$n_pacientes);

			$this->db->where('id', $id_quarto);
			$this->db->update('quartos', $dados);
		}
	}

	// DELETE
	public function delete_quartos($id = NULL) {
		if ($id != NULL):
			$this->db->delete('quartos', $id);
			redirect('CRUD_Quarto/retrieve_quartos');
		endif;
	}
}