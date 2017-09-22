<?php 
echo '<h2> Lista de Usuários</h2>';

if ($this->session->flashdata('exclusaook')):
	echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
endif;

$this->table->set_heading('ID', 'Nome', 'Login', 'Permissão', '', '');
foreach ($usuarios as $linha):
	$this->table->add_row($linha->id, $linha->nome, $linha->login, $linha->permissao, 
		anchor("crud/update_usuarios/$linha->id", 'Editar'),  
		anchor("crud/delete_usuarios/$linha->id", 'Excluir'));
endforeach;
echo $this->table->generate();