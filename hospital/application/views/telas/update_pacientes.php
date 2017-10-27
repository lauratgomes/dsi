<?php
    if ($this->session->userdata('logado') == true) {

    	$cpf_paciente = $this->uri->segment(3);
    	if ($cpf_paciente == NULL) redirect('CRUD_Paciente/retrieve_pacientes');

    	$query = $this->Paciente_model->select_pacientes($cpf_paciente)->row();

    	echo "<h2>Edição de Pacientes </h2>";

        echo form_open("CRUD_Paciente/update_pacientes/$cpf_paciente");

       	if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

        echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), 'autofocus');
		echo "<br />";
		echo form_label('Telefone: ');
		echo form_input(array('name'=>'telefone'), set_value('telefone', $query->telefone));
		echo "<br />";
		echo form_label('Rua: ');
		echo form_input(array('name'=>'rua'), set_value('rua', $query->rua));
		echo "<br />";
		echo form_label('Complemento: ');
		echo form_input(array('name'=>'complemento'), set_value('complemento', $query->complemento));
		echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Concluir');
		echo form_hidden('cpf_paciente', $query->cpf);
		echo form_close();
	} else {
		include "erro.php";
	}