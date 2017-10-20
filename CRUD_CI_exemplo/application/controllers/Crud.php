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
	
	public function index() {
		$dados = array(
			'titulo' => 'CRUD de notícias',
			'tela' => '',
		);
		$this->load->view('crud',$dados);
	}

	public function create() {

		//validacao do form
		$this->form_validation->set_rules('titulo','TITULO','trim|required|max_length[100]|is_unique[noticia.titulo]');
        $this->form_validation->set_rules('descricao','DESCRICAO', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('autor','AUTOR','trim|required|max_length[50]|strtolower');
        $this->form_validation->set_rules('data_hora', 'DATA_HORA', 'trim|required|max_length[16]|strtolower');

		if($this->form_validation->run()==TRUE):
            $dados = elements(array('titulo','descricao','autor','data_hora'),
            $this->input->post());
        	$this->load->model('crud_model');
        	$this->crud_model->do_insert($dados);
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'create',
		);
		$this->load->view('crud',$dados);
	}


	public function retrieve() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve',
			'noticias' => $this->crud_model->get_all()->result(),
		);
		$this->load->view('crud',$dados);
	}

	public function update() {
		// validação do form
        $this->form_validation->set_rules('descricao','DESCRICAO', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('autor','AUTOR','trim|required|max_length[50]|strtolower');
        $this->form_validation->set_rules('data_hora', 'DATA_HORA', 'trim|required|strtolower');

		if($this->form_validation->run()==TRUE):
            $dados = elements(array('descricao','autor', 'data_hora'), $this->input->post());
        	$this->crud_model->do_update($dados, array('id'=>$this->input->post('id_noticia')));
        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update',
		);
		$this->load->view('crud',$dados);
	}

	public function delete() {
		if ($this->input->post('id_noticia') > 0):
			$this->crud_model->do_delete(array('id' => $this->input->post('id_noticia')));
		endif;
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete',
		);
		$this->load->view('crud',$dados);
	}		
}