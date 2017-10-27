<?php
	if ($this->session->userdata('logado') == true) {
	
		echo "<h2>Lista de Médicos </h2>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		echo form_open('CRUD_Medico/pesquisa_medicos');
		echo form_label('Nome: ');
        echo form_input(array('name'=>'nome'), set_value('nome'), 'autofocus');
        echo form_submit(array('name'=>'cadastrar'), 'Pesquisar');
        echo form_close();

		$this->table->set_heading('CPF', 'CRM/COREN', 'Nome', 'Data de nascimento', 'CEP', 'Rua', 'Complemento', '', '');
		foreach ($medicos as $linha):
			$this->table->add_row($linha->cpf, $linha->crm_coren, $linha->nome, $linha->nascimento, $linha->cep, $linha->rua, $linha->complemento, 
				anchor("CRUD_Medico/update_medicos/$linha->cpf", 'Editar'),  
				anchor("CRUD_Medico/delete_medicos/$linha->cpf", 'Excluir'));
		endforeach;
		echo $this->table->generate();
	} else {
		include "erro.php";
	}