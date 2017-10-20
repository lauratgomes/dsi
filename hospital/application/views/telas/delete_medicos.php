<?php

	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
	
		$id_medico = $this->uri->segment(3);
		if ($id_medico == NULL) redirect('CRUD_Medico/retrieve_medicos');

		echo "<h2>Deletar Notícia</h2>";
		
		$query = $this->Medico_model->select_medicos($id_medico)->row();

		echo form_open("CRUD_Medico/delete_medicos/$id_medico");
		
		if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;
		
		echo form_label('CPF: ');
		echo form_input(array('name'=>'cpf'), set_value('cpf', $query->cpf), 'disabled="disabled"');
		echo "<br />";
		echo form_label('CRM/COREN: ');
		echo form_input(array('name'=>'crm_coren'), set_value('crm_coren', $query->crm_coren), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Data de nascimento: ');
		echo "<br />";
		echo "<input type='date' name='nascimento' value='" . $query->nascimento . "' disabled='disabled'>";
		echo "<br />";
		echo form_label('CEP: ');
		echo form_input(array('name'=>'cep'), set_value('cep', $query->cep), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Rua: ');
		echo form_input(array('name'=>'rua'), set_value('rua', $query->rua), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Complemento: ');
		echo form_input(array('name'=>'complemento'), set_value('complemento', $query->complemento), 'disabled="disabled"');
	   	echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Excluir registro');
		echo form_hidden('id_medico', $query->cpf);
		echo form_close();
	} else {
		include "erro.php";
	}