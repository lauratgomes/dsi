<?php
	if (isset($this->session->userdata['usuario'])) {
		$username = ($this->session->userdata['usuario']['login']);
		$permissao = ($this->session->userdata['usuario']['permissao']);

		if ($permissao == 0) {

			$id_user = $this->uri->segment(3);
			if ($id_user == NULL) redirect('crud/retrieve_usuarios');

			$query = $this->crud_model->select_usuarios($id_user)->row();

			echo "<h2>Update Usuário</h2>";
			
			echo form_open("crud/update_usuarios/$id_user");
			
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
			echo form_label('Permissão: ');
			echo "<select name='permissao'>
	                <option value=1> 1 - Apenas leitura </option>
	                <option value=2> 2 - Leitura e escrita </option>
	                <option value=3> 3 - Leitura, escrita, edição e exclusão </option>
	              </select>";
			echo "<br />";	
			echo form_submit(array('name'=>'cadastrar'), 'Alterar Dados');
			echo form_hidden('id_user', $query->id);
			echo form_close();
			
		} else {
			include "erro.php";
		}
	}