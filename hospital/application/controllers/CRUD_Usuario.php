<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Usuario extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->helper('file');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->library('upload');
		$this->load->model('Usuario_model');
	}
	
	public function index() {
		$dados = array(
			'titulo' => 'teste',
			'tela' => 'login',
		);
		$this->load->view('crud', $dados);
	}

	// CRUD USUÁRIOS (C - ; R - OK; U - OK; D - OK;)
	public function create_usuarios() {
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[40]');
		$this->form_validation->set_rules('login','LOGIN', 'trim|required|max_length[25]|is_unique[usuario.login]');
		$this->form_validation->set_rules('senha','SENHA','trim|required|max_length[32]');
		$this->form_validation->set_rules('admin', 'ADMIN', 'required');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('nome', 'login', 'senha', 'admin'), $this->input->post());
			$dados['senha'] = md5($dados['senha']);
			$this->Usuario_model->insert_usuarios($dados);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_usuarios',
		);
		$this->load->view('crud', $dados);
	}

	public function retrieve_usuarios() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_usuarios',
			'usuarios' => $this->Usuario_model->selectAll_usuarios()->result(),
		);
		$this->load->view('crud', $dados);
	}

	public function update_usuarios() {
		$this->form_validation->set_rules('nome','NOME', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('senha','SENHA','trim|required|max_length[30]|strtolower');
		$this->form_validation->set_rules('admin', 'ADMIN', 'required');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('nome','senha', 'admin'), $this->input->post());
			$dados['senha'] = md5($dados['senha']);
			$this->Usuario_model->update_usuarios($dados, array('id' => $this->input->post('id_user')));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_usuarios',
		);
		$this->load->view('crud', $dados);
	}

	public function delete_usuarios() {
		if ($this->input->post('id_user') > 0):
			$this->Usuario_model->delete_usuarios(array('id' => $this->input->post('id_user')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_usuarios',
		);
		$this->load->view('crud', $dados);
	}

	public function user_login_process() {
		$usuario = $this->input->post('login');
		$senha = $this->input->post('senha');

		$flag = $this->verifica_login($usuario, $senha);

		if ($flag == true) {
			$dados = array(
				'login' => $usuario,
				'senha' => $senha,
			);
			
			$result = $this->Usuario_model->session_login($dados);
			
			if ($result != '') {
				$this->session->set_userdata('id', $result[0]);
				$this->session->set_userdata('login', $result[1]);
				$this->session->set_userdata('administrador', $result[2]);
				$this->session->set_userdata('logado', true);
				
				if ($usuario == 'admin') {
					$this->session->set_userdata('admin', true);
					$this->retrieve_usuarios();
				} else {
					$this->session->set_userdata('admin', false);
					$this->Paciente_model->retrieve_pacientes();
				}
			} else {
				$this->session->set_userdata('logado', false);
				$this->load->view('login');
			}
		}
	}

	public function verifica_login($usuario, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->selectAll_usuarios()->result();
		foreach ($usuarios as $u) {
			if ($usuario == $u->login && $senha == $u->senha) {
				return true;
			}
		}
		return false;
	}

	public function busca_id($usuario, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->selectAll_usuarios()->result();
		foreach ($usuarios as $u) {
			if ($usuario == $u->usuario && $senha == $u->senha) {
				return $u->id;
			}
		}
		return -1;
	}

	public function logout() {
		$this->session->sess_destroy();
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('senha');
		$this->session->unset_userdata('logado');
		$this->session->unset_userdata('admin');
		$this->index();
	}
}