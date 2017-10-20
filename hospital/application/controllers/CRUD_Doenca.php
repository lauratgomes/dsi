<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Doenca extends CI_Controller {

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
		$this->load->model('Doenca_model');
	}

	public function retrieve_doencas() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_doencas',
			'doencas' => $this->Doenca_model->selectAll_doencas()->result(),
		);
		$this->load->view('crud', $dados);
	}

	public function pesquisa_doencas() {
		$codigo = $this->input->post('codigo');
		$descricao = $this->input->post('descricao');

		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_doencas',
			'doencas' => $this->Doenca_model->search_doencas($codigo, $descricao)->result(),
		);
		$this->load->view('crud', $dados);
	}
}