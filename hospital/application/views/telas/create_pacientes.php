<?php
    if ($this->session->userdata('logado') == true) {

    	echo "<h2>Cadastro de Pacientes </h2>";

        echo form_open('CRUD_Paciente/create_pacientes');

        if ($this->session->flashdata('cadastrook')):
            echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
        endif;

        echo form_label('CPF: ');
		echo form_input(array('name'=>'cpf'), set_value('cpf'), 'autofocus');
		echo "<br />";
		echo form_label('RG: ');
		echo form_input(array('name'=>'rg'), set_value('rg'));
		echo "<br />";
		echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome'));
		echo "<br />";
		echo form_label('Telefone: ');
		echo form_input(array('name'=>'telefone'), set_value('telefone'));
		echo "<br />";
		echo form_label('Rua: ');
		echo form_input(array('name'=>'rua'), set_value('rua'));
		echo "<br />";
		echo form_label('Complemento: ');
		echo form_input(array('name'=>'complemento'), set_value('complemento'));
		echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
		echo form_close();
	} else {
		include "erro.php";
	}