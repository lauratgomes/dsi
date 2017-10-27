<?php
    if ($this->session->userdata('logado') == true) {
		
		echo "<h2> Registros </h2>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		$this->table->set_heading('CPF do paciente','CPF do médico', 'CID', 'Quarto', 'Remédio', 'Data e Hora de entrada', 'Data e Hora de saída', 'Saída');
		foreach ($registros as $linha):
			if ($linha->data_hora_saida == NULL && $linha->saida == NULL) {
				$linha->data_hora_saida = "-";
				$linha->saida = "-";
			}

			$this->table->add_row($linha->cpf_paciente, $linha->cpf_medico, $linha->cid, $linha->quarto, $linha->remedio, $linha->data_hora_entrada, $linha->data_hora_saida, $linha->saida);
		endforeach;
		echo $this->table->generate();
	} else {
		include "erro.php";
	}