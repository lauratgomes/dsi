<?php 
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
	    
	    echo "<h2>Cadastro de Quartos</h2>";

		echo form_open('CRUD_Quarto/create_quartos');
		echo validation_errors('<p>','</p>');
		
		if ($this->session->flashdata('cadastrook')):
			echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
		endif;

		echo form_label('Limite de pacientes por quarto: ');
		echo form_input(array('name' => 'limite',
							  'class' => 'form-control',
							  'type' => 'number'), 'autofocus');

		echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
		echo form_close();
	}