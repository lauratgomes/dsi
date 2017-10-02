<?php

if (isset($this->session->userdata['usuario'])) {
	$username = ($this->session->userdata['usuario']['login']);
	$permissao = ($this->session->userdata['usuario']['permissao']);

	if ($permissao == 0 || $permissao == 2 || $permissao == 3) {
				
		echo "<h2>Cadastro de Usuários</h2>";
		
		if ($this->session->flashdata('cadastrook')):
			echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
		endif;
		
		echo form_open_multipart('crud/create');
		echo "<br /	>";
        echo "<br /	>";
		echo form_label('Título: ');
		echo form_input(array('name'=>'titulo'), set_value('titulo'), 'autofocus');
		echo "<br />";
		echo form_label('Descrição: ');
		echo form_textarea(array('name'=>'descricao'), set_value('descricao'));
		echo "<br />";
		echo form_label('Autor: ');
		echo form_input(array('name'=>'autor'), set_value('autor'));
		echo "<br />";
		echo form_label('Data: ');
		echo "<input type='date' name='data'>";
		echo "<br />";
		echo form_label('Imagem: ');
		echo "<input type='file' name='imagem'>";
		echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
		echo form_close();

	} else {
		include "erro.php";
	}
}