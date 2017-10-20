<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_medico = $this->uri->segment(3);
		if ($id_medico == NULL) redirect('CRUD_Medico/retrieve_medicos');

		$query = $this->Medico_model->select_medicos($id_medico)->row();

		echo "<h2>Update Usuário</h2>";
			
		echo form_open("CRUD_Medico/update_medicos/$id_medico");
			
		if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

		echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome', $query->nome, 'autofocus'));
		echo "<br />";
		echo form_label('Data de nascimento: ');
		echo form_input(array('name' => 'nascimento',
							  'class' => 'form-control',
							  'type' => 'date'), $query->nascimento);
		echo "<br />";
		echo form_label('CEP: ');
		echo form_input(array('name'=>'cep'), set_value('cep', $query->cep));
		echo "<br />";
		echo form_label('Rua: ');
		echo form_input(array('name'=>'rua'), set_value('rua', $query->rua));
		echo "<br />";
		echo form_label('Complemento: ');
		echo form_input(array('name'=>'complemento'), set_value('complemento', $query->complemento));
		echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
		echo form_close();
			
	} else {
		include "erro.php";
	}