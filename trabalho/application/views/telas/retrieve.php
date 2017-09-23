<?php 
	$this->load->view('includes/header');

echo '<h2> Lista de Notícias</h2>';

if ($this->session->flashdata('exclusaook')):
	echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
endif;

$this->table->set_heading('ID', 'Imagem', 'Título', 'Descrição', 'Autor', 'Data', '', '');
foreach ($noticias as $linha):
	$this->table->add_row($linha->id, $linha->imagem, $linha->titulo, $linha->descricao, $linha->autor, $linha->data, 
		anchor("crud/update/$linha->id", 'Editar'),  
		anchor("crud/delete/$linha->id", 'Excluir'));
endforeach;
echo $this->table->generate();