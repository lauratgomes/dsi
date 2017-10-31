<?php
    if ($this->session->userdata('logado') == true) {
		echo "<br>";
		echo "<div class='container-fluid'>";
		echo 	"<div class='row align-items-center justify-content-center'>";
		echo 		"<div class='col-md-11'>";
		echo 			"<div class='card'>";
		echo 				"<div class='card-header card-title'>";
		echo 					"<h4 class='text-center'>Pacientes</h4>";
		echo 				"</div>";
		echo "<nav class='navbar navbar-expand-lg navbar-custom' style='background-color: #9EC4B0; color: #328450' >";
		echo   "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
		echo    "<ul class='navbar-nav mr-auto'>";
		echo "</ul></div>";

		echo form_open('CRUD_Paciente/pesquisa_pacientes');
		echo form_label('Nome: ');
        echo form_input(array('name'=>'nome'), set_value('nome'), 'autofocus');
        echo form_submit(array('name'=>'cadastrar'), 'Pesquisar');
        echo form_close();
		echo "</nav>";


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
		echo 			"</div>";
		echo 		"</div>";
		echo 				"</div>";
		echo 			"</div>";
		echo 		"</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}