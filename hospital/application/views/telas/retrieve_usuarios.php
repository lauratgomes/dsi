<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		echo "<h2>Lista de Usuários</h2>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;
		$this->table->set_heading('ID', 'Nome', 'Login', 'Administrador', '', '');
		foreach ($usuarios as $linha):
			if ($linha->admin == 't') {
				$linha->admin = "Sim";
				$this->table->add_row($linha->id, $linha->nome, $linha->login, $linha->admin);
			} else {
				$linha->admin = "Não";
				$this->table->add_row($linha->id, $linha->nome, $linha->login, $linha->admin, 
				anchor("CRUD_Usuario/update_usuarios/$linha->id", 'Editar'),  
				anchor("CRUD_Usuario/delete_usuarios/$linha->id", 'Excluir'));
			}
		endforeach;
		echo $this->table->generate();
	} else {
		include "erro.php";
	}