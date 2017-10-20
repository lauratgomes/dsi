<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		echo "<h2>Lista de Quartos</h2>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		$this->table->set_heading('ID', 'Limite de pacientes', 'Vago', '', '');
		foreach ($quartos as $linha):
			if ($linha->vago = 't') {
				$linha->vago = 'Sim';
			} else {
				$linha->vago = 'Não';
			}

			$this->table->add_row($linha->id, $linha->limite, $linha->vago, 
				anchor("CRUD_Quarto/update_quartos/$linha->id", 'Editar'),  
				anchor("CRUD_Quarto/delete_quartos/$linha->id", 'Excluir'));
		endforeach;
		
		echo $this->table->generate();
	}