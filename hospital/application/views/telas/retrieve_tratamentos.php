<?php
    if ($this->session->userdata('logado') == true) {
		echo "<br>";
		echo "<div class='container-fluid'>";
		echo 	"<div class='row align-items-center justify-content-center'>";
		echo 		"<div class='col-md-11'>";
		echo 			"<div class='card'>";
		echo 				"<div class='card-header card-title'>";
		echo 					"<h4 class='text-center'>Tratamentos</h4>";
		echo 				"</div>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		$this->table->set_heading('CPF do paciente','CPF do médico', 'CID', 'Remédio', 'Quarto', 'Data e Hora de entrada', '');
		foreach ($tratamentos as $linha):
			$this->table->add_row($linha->cpf_paciente, $linha->cpf_medico, $linha->cid, $linha->remedio, $linha->quarto, $linha->data_hora_entrada,
				anchor("CRUD_Tratamento/update_tratamentos/$linha->id", 'Editar'));
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