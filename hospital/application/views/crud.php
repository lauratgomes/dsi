<?php 

	$this->load->view('includes/header');

	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') != true) {
		$this->load->view('includes/menu2');
	}

	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		$this->load->view('includes/menu');
	}

	if ($tela != '') $this->load->view('telas/' . $tela);

	$this->load->view('includes/footer');
