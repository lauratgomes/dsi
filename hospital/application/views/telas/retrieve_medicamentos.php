<?php
	if ($this->session->userdata('logado') == true) {
		echo "<h2>Lista de Medicamentos</h2>";
		
		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		echo form_open('CRUD_Medicamento/pesquisa_medicamentos');
		echo form_label('Nome: ');
        echo form_input(array('name'=>'nome'), set_value('nome'), 'autofocus');
        echo form_submit(array('name'=>'cadastrar'), 'Pesquisar');
        echo form_close();

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