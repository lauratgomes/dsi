<?php
    if ($this->session->userdata('logado') == true) {
		
		echo "<h2>Lista de Pacientes </h2>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		$this->table->set_heading('CPF', 'RG', 'Nome', 'Telefone', 'Rua', 'Complemento', '', '');
		foreach ($pacientes as $linha):
			$this->table->add_row($linha->cpf, $linha->rg, $linha->nome, $linha->telefone, $linha->rua, $linha->complemento, 
				anchor("CRUD_Paciente/update_pacientes/$linha->cpf", 'Editar'),  
				anchor("CRUD_Paciente/delete_pacientes/$linha->cpf", 'Excluir'));
		endforeach;
		echo $this->table->generate();
	} else {
		include "erro.php";
	}