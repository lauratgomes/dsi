<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Registro extends CI_Controller {

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
		$this->load->model('Registro_model');
	}

	public function retrieve_registros() {
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve_registros',
			'registros' => $this->Registro_model->selectAll_registros()->result(),
		);
		$this->load->view('crud', $dados);
	}
}