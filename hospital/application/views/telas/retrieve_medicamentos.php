<?php
	if ($this->session->userdata('logado') == true) {
		echo "<h2>Lista de Medicamentos</h2>";
		
		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		if ($this->session->userdata('admin') == true) {
			$this->table->set_heading('ID', 'Nome', '', '');
			foreach ($medicamentos as $linha):
				$this->table->add_row($linha->id, $linha->nome, 
					anchor("CRUD_Medicamento/update_medicamentos/$linha->id", 'Editar'),  
					anchor("CRUD_Medicamento/delete_medicamentos/$linha->id", 'Excluir'));
			endforeach;	
		} else {
			$this->table->set_heading('ID', 'Nome');
			foreach ($medicamentos as $linha):
				$this->table->add_row($linha->id, $linha->nome); 
			endforeach;
		}
		
		echo $this->table->generate();

	} else {
		include "erro.php";
	}