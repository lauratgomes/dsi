<?php 
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
	    echo "<br>";
		echo "<div class='container-fluid'>";
		echo "<div class='row align-items-center justify-content-center'>";
		echo "<div class='col-lg-6'>";
		echo "<div class='card'>";
		echo "<div class='card-header card-title'>";
	    echo "<h2>Cadastro de Quartos</h2>";
	    echo "</div>";
		echo "<div class='card-body'>";
		echo form_open('CRUD_Quarto/create_quartos');
		echo validation_errors('<p>','</p>');
		
		if ($this->session->flashdata('cadastrook')):
			echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
		endif;

		echo form_label('Limite de pacientes por quarto: ');
		echo form_input(array('name' => 'limite',
							  'class' => 'form-control',
							  'type' => 'number'));

		echo "<br>";
	    echo "<div class='text-center'>";
	    echo form_submit(array('name'=>'cadastrar'), 'Cadastrar', array('class' => 'btn btn-botica'));
	    echo "</div>";
	    echo "</div>";
	    echo form_close();
	    echo "</div>";
	    echo "</div>";
	    echo "</div>";
	} else {
    	include "erro.php";
	}