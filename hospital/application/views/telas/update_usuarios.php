<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_user = $this->uri->segment(3);
		if ($id_user == NULL) redirect('CRUD_Usuario/retrieve_usuarios');

		$query = $this->Usuario_model->select_usuarios($id_user)->row();

		echo "<h2>Update Usuário</h2>";
			
		echo form_open("CRUD_Usuario/update_usuarios/$id_user");
			
		if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

		echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), 'autofocus');
		echo "<br />";
		echo form_label('Login: ');
		echo form_input(array('name'=>'login'), set_value('login', $query->login), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Senha: ');
		echo form_password(array('name'=>'senha'));
		echo "<br />";
		echo form_label('Administrador: ');
		 echo "<select name='admin'>
                <option value='TRUE'> SIM </option>
                <option value='FALSE'> NÃO </option>
              </select>";
		echo "<br />";	
		echo form_submit(array('name'=>'cadastrar'), 'Alterar Dados');
		echo form_hidden('id_user', $query->id);
		echo form_close();
			
	} else {
		include "erro.php";
	}