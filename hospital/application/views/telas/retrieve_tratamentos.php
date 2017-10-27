<?php
    if ($this->session->userdata('logado') == true) {
		
		echo "<h2>Lista de Tratamentos </h2>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		$this->table->set_heading('CPF do paciente','CPF do médico', 'CID', 'Remédio', 'Quarto', 'Data e Hora de entrada', '');
		foreach ($tratamentos as $linha):
			$this->table->add_row($linha->cpf_paciente, $linha->cpf_medico, $linha->cid, $linha->remedio, $linha->quarto, $linha->data_hora_entrada,
				anchor("CRUD_Tratamento/update_tratamentos/$linha->id", 'Editar'));
		endforeach;
		echo $this->table->generate();
	} else {
		include "erro.php";
	}