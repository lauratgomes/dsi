<?php 
	
	if (!isset($this->session->userdata['usuario'])) {
		$msg = "É preciso estar logado para entrar nessa área!";
		$this->load->view('login_form', $msg);
	}

	$this->load->view('includes/header');

	if (isset($this->session->userdata['usuario'])) {
		$username = ($this->session->userdata['usuario']['login']);
		$permissao = ($this->session->userdata['usuario']['permissao']);

			if ($permissao == 0) {
				$this->load->view('includes/menu');
			}

			if ($permissao == 1) {
				$this->load->view('includes/menu1');
			}

			if ($permissao == 2) {
				$this->load->view('includes/menu2');
			}

			if ($permissao == 3) {
				$this->load->view('includes/menu3');
			}

			if ($tela != '') $this->load->view('telas/' . $tela);
			$this->load->view('includes/footer');
		}