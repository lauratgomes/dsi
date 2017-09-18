<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('crud_model');
	}
	
	public function index()
	{
		$dados = array(
			'titulo' => 'CRUD com CodeIgniter',
			'tela' => '',
		);
		$this->load->view('crud',$dados);
	}

	public function create()
	{
		//validacao do form
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
        $this->form_validation->set_message('is_unique','Este %s já está cadastrado no sistema');
        $this->form_validation->set_rules('email','EMAIL', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[pessoa.email]');
        $this->form_validation->set_rules('login','LOGIN','trim|required|max_length[25]|strtolower|is_unique[pessoa.login]');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE):
            $dados = elements(array('nome','email','login','senha'),
            $this->input->post());
        	//$dados['senha']=md5($dados['senha']);
        	$this->load->model('crud_model');
        	$this->crud_model->do_insert($dados);
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create',
		);
		$this->load->view('crud',$dados);
	}


	public function retrieve()
	{
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve',
			'usuarios' => $this->crud_model->get_all()->result(),
		);
		$this->load->view('crud',$dados);
	}

	public function update()
	{
		// validação do form
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('senha','SENHA','trim|required|strtolower');
        $this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
        $this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|strtolower|matches[senha]');

		if($this->form_validation->run()==TRUE):
            $dados = elements(array('nome','senha'), $this->input->post());
        	$dados['senha']=md5($dados['senha']);
        	//$this->crud_model->to_update($dados);
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update',
		);
		$this->load->view('crud',$dados);
	}

	public function delete()
	{
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete',
		);
		$this->load->view('crud',$dados);
	}
		
}
