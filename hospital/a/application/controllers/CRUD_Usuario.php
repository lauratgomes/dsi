<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Usuario extends CI_Controller {

	public function __CONSTRUCT() {
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('Usuario_model');
		$this->load->model('Noticia_model');
	}

	public function login() {
		$usuario = $this->input->post('usuario');
		$senha = $this->input->post('senha');
		$flag = $this->verifica_login($usuario, $senha);
		if ($flag == true) {
			$id = $this->busca_id($usuario, $senha);	
			// salva as permissoes na sessão
			$permissoes = $this->Usuario_model->busca_permissoes($id)->result();
			$this->session->set_userdata('cadastrar', false);
			$this->session->set_userdata('editar', false);
			$this->session->set_userdata('exclui', false);
			foreach ($permissoes as $permissao) {
				if ($permissao->id_permissao == 1) {
					$this->session->set_userdata('cadastrar', true);
				}
				if ($permissao->id_permissao == 2) {
					$this->session->set_userdata('editar', true);
				}
				if ($permissao->id_permissao == 3) {
					$this->session->set_userdata('excluir', true);
				}
			}
			$this->session->set_userdata('id', $id);
			$this->session->set_userdata('usuario', $usuario);
			$this->session->set_userdata('senha', $senha);
			$this->session->set_userdata('logado', true);
			if ($usuario == 'admin') {
				$this->session->set_userdata('admin', true);
				$this->retrieve();
			} else {
				$this->session->set_userdata('admin', false);
				$this->retrieve_noticia();
			}	
		} else {
			$this->session->set_flashdata('loginbad','O usuário ou a senha estão errados');
			$this->session->set_userdata('logado', false);
			$this->index();
		}
	}

	public function retrieve_noticia() {
		$dados = array(
			'titulo' => 'CRUD Notícia &raquo; Retrieve',
			'tela' => 'retrieve_noticia',
			'usuarios' => $this->Usuario_model->get_all()->result(),
			'noticias' => $this->Noticia_model->get_all()->result()
		);
		$this->load->view('View_Usuario',$dados);
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

	public function verifica_login($usuario, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->get_all()->result();
		foreach ($usuarios as $u) {
			if ($usuario == $u->usuario && $senha == $u->senha) {
				return true;
			}
		}
		return false;
	}

	public function busca_id($usuario, $senha) {
		$senha = md5($senha);
		$usuarios = $this->Usuario_model->get_all()->result();
		foreach ($usuarios as $u) {
			if ($usuario == $u->usuario && $senha == $u->senha) {
				return $u->id;
			}
		}
		return -1;
	}

	public function index() {
		$dados = array(
			'titulo' => 'Index',
			'tela' => 'login',
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function create() {
		//validacao do form
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[80]|ucwords');
        $this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema');
        $this->form_validation->set_rules('usuario','USUARIO','trim|required|max_length[70]|strtolower|is_unique[usuarios.usuario]');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE):
            $data = elements(array('nome','usuario','senha'), $this->input->post());
            $permissoes = $this->input->post('permissoes');
        	//$dados['permissoes'] = $this->input->post('permissoes');
        	$data['senha']=md5($data['senha']);
        	$this->Usuario_model->do_insert($data, $permissoes);
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create',
		);

		$this->load->view('View_Usuario',$dados);
	}


	public function retrieve() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve',
			'usuarios' => $this->Usuario_model->get_all()->result(),
			'permissoes' => $this->Usuario_model->get_permissoes()->result()
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function update() {
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[80]|ucwords');
        $this->form_validation->set_message('Este %s já está cadastrado no sistema');
        $this->form_validation->set_rules('usuario','USUARIO','trim|required|max_length[70]|strtolower');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE):
			$permissoes = $this->input->post('permissoes');
            $dados = elements(array('nome','senha','usuario'),$this->input->post());
        	$dados['senha']=md5($dados['senha']);
        	$this->Usuario_model->do_update($dados, $this->input->post('idusuario'), $permissoes);
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update',
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function delete() {
		if ($this->input->post('idusuario')>0):  
			$this->Usuario_model->do_delete(array('id' => $this->input->post('idusuario')));
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete',
		);
		$this->load->view('View_Usuario',$dados);
	}
		
}
