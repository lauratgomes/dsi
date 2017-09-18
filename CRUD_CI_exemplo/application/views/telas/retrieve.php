<?php 
echo '<h2> Lista de Notícias</h2>';

if ($this->session->flashdata('exclusaook')):
	echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
endif;

$this->table->set_heading('ID', 'Título', 'Descrição', 'Autor', 'Data_Hora', 'Operações');
foreach ($noticias as $linha):
	$this->table->add_row($linha->id, $linha->titulo, $linha->descricao, $linha->autor, $linha->data_hora, 
		anchor("crud/update/$linha->id", 'Editar') . " - " . 
		anchor("crud/delete/$linha->id", 'Excluir'));
endforeach;
echo $this->table->generate();
