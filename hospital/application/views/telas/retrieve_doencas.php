<?php
	if ($this->session->userdata('logado') == true) {
		
		echo "<br>";
		echo "<div class='container-fluid'>";
		echo 	"<div class='row align-items-center justify-content-center'>";
		echo 		"<div class='col-md-11'>";
		echo 			"<div class='card'>";
		echo 				"<div class='card-header card-title'>";
		echo 					"<h4 class='text-center'>Doenças</h4>";
		echo 				"</div>";
		echo "<nav class='navbar navbar-expand-lg navbar-custom' style='background-color: #9EC4B0; color: #328450' >";
		echo   "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
		echo    "<ul class='navbar-nav mr-auto'>";
		echo "</ul></div>";
		
		echo form_open('CRUD_Doenca/pesquisa_doencas');
		echo form_label('Código: ');
        echo form_input(array('name'=>'codigo'), set_value('codigo'), 'autofocus');
		echo form_label('Doença: ');
        echo form_input(array('name'=>'descricao'), set_value('descricao'));
        echo form_submit(array('name'=>'cadastrar'), 'Pesquisar');
        echo form_close();
		echo "</nav>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		$this->table->set_heading('CID', 'Descrição');
		foreach ($doencas as $linha):
			$this->table->add_row($linha->codigo, $linha->descricao);
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
