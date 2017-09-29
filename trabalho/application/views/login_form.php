<?php
	if (isset($this->session->userdata['usuario'])) {
		
	} else {
		//$msg = "Você deve estar logado!";
	}

			$this->load->view('includes/header');

		echo form_open('crud/user_login_process'); 
		
		echo validation_errors();		
		echo form_label('Login: ');
		echo form_input(array('name'=>'login'), set_value('login'));
		echo "<br />";
		echo form_label('Senha: ');
		echo form_password(array('name'=>'senha'),set_value('senha'));
		echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Enviar');
		echo form_close();
	?>