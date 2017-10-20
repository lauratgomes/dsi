<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD_Noticia extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model('Noticia_model');
		$this->load->model('Usuario_model');
		$this->load->helper('file');
	}

	public function create() {
		//validacao do form
		$this->form_validation->set_rules('titulo','TITULO','trim|required|max_length[100]|ucwords');
        $this->form_validation->set_rules('texto','TEXTO','trim|required|max_length[800]');
        $this->form_validation->set_rules('data','DATA','trim|required');

		if($this->form_validation->run()==TRUE):
					
	        $data = elements(array('titulo','texto','data'), $this->input->post());
	    	$data['id_usuario'] = $this->session->userdata('id');

	    	$id = $this->Noticia_model->do_insert($data);

	    	$config['upload_path'] = './uploads/';
	    	$config['allowed_types'] = 'jpg';
	    	$config['file_name'] = $id;

	    	$this->load->library('upload', $config);
	    	$this->upload->do_upload('foto');
			redirect('CRUD_Noticia/create');

        endif;

		$dados = array(
			'titulo' => 'CRUD Notícia &raquo; Create',
			'tela' => 'create_noticia',
		);

		$this->load->view('View_Usuario',$dados);
	}

	public function retrieve() {
		$dados = array(
			'titulo' => 'CRUD Notícia &raquo; Retrieve',
			'tela' => 'retrieve_noticia',
			'usuarios' => $this->Usuario_model->get_all()->result(),
			'noticias' => $this->Noticia_model->get_all()->result()
		);
		$this->load->view('View_Usuario',$dados);
	}

	public function delete() {
		if ($this->input->post('id')>0):  
			$diretorio = "./uploads/" . $this->input->post('id') . ".jpg";
			unlink($diretorio);
			$this->Noticia_model->do_delete(array('id' => $this->input->post('id')));
			
		endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Delete',
			'tela' => 'delete_noticia',
		);
		$this->load->view('View_Usuario',$dados);
	}	

	public function update() {

		$this->form_validation->set_rules('titulo','TITULO','trim|required|max_length[100]|ucwords');
        $this->form_validation->set_rules('texto','TEXTO','trim|required|max_length[800]');
        $this->form_validation->set_rules('data','DATA','trim|required');

		if($this->form_validation->run()==TRUE):

			$id = $this->input->post('id');

			$config['upload_path'] = './uploads/';
	    	$config['allowed_types'] = 'jpg';
	    	$config['file_name'] = $id;
	    	$config['overwrite'] = true;
	    
	    	$this->load->library('upload', $config);
	    	$this->upload->do_upload('foto');
			
            $dados = elements(array('titulo','texto','data', 'id_usuario'), $this->input->post());
        	$this->Noticia_model->do_update($dados, $id);

        endif;

		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'update_noticia',
		);
		$this->load->view('View_Usuario',$dados);
	}
		
}
