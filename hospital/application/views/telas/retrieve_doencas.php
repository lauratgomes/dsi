<?php
	if ($this->session->userdata('logado') == true) {
		
		echo "<h2>Lista de Doenças</h2>";

		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;

		echo form_open('CRUD_Doenca/pesquisa_doencas');
		echo form_label('Código: ');
        echo form_input(array('name'=>'codigo'), set_value('codigo'), 'autofocus');
		echo form_label('Doença: ');
        echo form_input(array('name'=>'descricao'), set_value('descricao'));
        echo form_submit(array('name'=>'cadastrar'), 'Pesquisar');
        echo form_close();

		$this->table->set_heading('CID', 'Descrição');
		foreach ($doencas as $linha):
			$this->table->add_row($linha->codigo, $linha->descricao);
		endforeach;
		echo $this->table->generate();
	} else {
		include "erro.php";
	}