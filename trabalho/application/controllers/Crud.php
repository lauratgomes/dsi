<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

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
		$this->load->model('crud_model');
	}
	
	public function index() {
		$dados = array(
			'titulo' => 'teste',
			'tela' => '',
			);
		$this->load->view('login_form', $dados);
	}





	// CRUD NOTICIAS (C - OK; R - OK; U - ; D - OK;)
	public function create() {
		$this->form_validation->set_rules('titulo','TITULO','trim|required|max_length[100]|is_unique[noticia.titulo]');
		$this->form_validation->set_rules('descricao','DESCRICAO', 'trim|required|max_length[500]');
		$this->form_validation->set_rules('autor','AUTOR','trim|required|max_length[50]|strtolower');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('imagem', 'IMAGEM', 'trim');


		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('titulo', 'descricao', 'autor', 'data', 'imagem'), $this->input->post());
			$id_noticia = $this->crud_model->insert_noticias($dados);

			if ($id_noticia != NULL) {
				$this->fazUpload($id_noticia);
			}
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create',
			);
		$this->load->view('crud',$dados);
	}

	public function fazUpload($id_noticia = NULL) {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';     
		$config['file_name'] = $id_noticia;
		$config['overwrite'] = TRUE;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('imagem')) {
			$data['dadosArquivo'] = $this->upload->data();
			$this->crud_model->update_noticia($data['dadosArquivo']['file_name'], $id_noticia);
		} else {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
	}

	public function retrieve() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve',
			'noticias' => $this->crud_model->selectAll_noticias()->result(),
		);
		$this->load->view('crud',$dados);
	}

	public function update() {
		$this->form_validation->set_rules('descricao','DESCRICAO', 'trim|required|max_length[500]');
		$this->form_validation->set_rules('autor','AUTOR','trim|required|max_length[50]|strtolower');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required|strtolower');
		$this->form_validation->set_rules('imagem', 'IMAGEM', 'trim');

		if ($this->form_validation->run() == TRUE):
			$id_noticia = $this->input->post('id_noticia');

			$dados = elements(array('descricao','autor', 'data', 'imagem'), $this->input->post());
			if ($this->crud_model->update_noticias($dados, $this->input->post('id_noticia'))) {
				$this->fazUpload($id_noticia);
		    }
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update',
			);
		$this->load->view('crud', $dados);
	}

	public function delete() {
		if ($this->input->post('id_noticia') > 0):
			$dir = "./uploads/" . $this->input->post('id_noticia') . '.jpg';
			unlink($dir);

			$this->crud_model->delete_noticias(array('id' => $this->input->post('id_noticia')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete',
			);
		$this->load->view('crud',$dados);
	}






	// CRUD USUÁRIOS (C - OK; R - OK; U - ; D - OK;)
	public function create_usuarios() {
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]');
		$this->form_validation->set_rules('login','LOGIN', 'trim|required|max_length[50]|is_unique[usuario.login]');
		$this->form_validation->set_rules('senha','SENHA','trim|required|max_length[30]|strtolower');
		$this->form_validation->set_rules('permissao', 'PERMISSAO', 'trim|required');


		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('login', 'senha', 'nome', 'permissao'), $this->input->post());
			$dados['senha'] = md5($dados['senha']);
			$this->crud_model->insert_usuarios($dados);
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create_usuarios',
			);
		$this->load->view('crud',$dados);
	}

	public function retrieve_usuarios() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_usuarios',
			'usuarios' => $this->crud_model->selectAll_usuarios()->result(),
			);
		$this->load->view('crud',$dados);
	}

	public function update_usuarios() {
		$this->form_validation->set_rules('nome','NOME', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('senha','SENHA','trim|required|max_length[30]|strtolower');
		$this->form_validation->set_rules('permissao', 'PERMISSAO', 'trim|required');

		if ($this->form_validation->run() == TRUE):
			$dados = elements(array('nome','senha', 'permissao'), $this->input->post());
			$dados['senha'] = md5($dados['senha']);
			$this->crud_model->update_usuarios($dados, array('id' => $this->input->post('id_user')));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_usuarios',
			);
		$this->load->view('crud', $dados);
	}

	public function delete_usuarios() {
		if ($this->input->post('id_user') > 0):
			$this->crud_model->delete_usuarios(array('id' => $this->input->post('id_user')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_usuarios',
			);
		$this->load->view('crud',$dados);
	}







	public function user_login_process() {
		$this->form_validation->set_rules('login', 'LOGIN', 'trim|required');
		$this->form_validation->set_rules('senha', 'SENHA', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$dados = array(
				'login' => $this->input->post('login'),
				'senha' => $this->input->post('senha'),
			);

			$result = $this->crud_model->session_login($dados);

			if ($result != '') {
				$session_data = array(
					'login' => $result[0],
					'permissao' => $result[1],
				);
				
				$this->session->set_userdata('usuario', $session_data);
				
				$dados2 = array(
					'titulo' => 'teste',
					'tela' => '',
					);

				$this->load->view('crud', $dados2);
			} else {
				$this->load->view('login_form');
			}
		}
	}

	public function logout() {
		$dados = array(
			'login' => '',
			'permissao' => '',
		);
		$this->session->sess_destroy();
		$this->session->unset_userdata('usuario', $dados);
		$this->load->view('login_form');
	}
}