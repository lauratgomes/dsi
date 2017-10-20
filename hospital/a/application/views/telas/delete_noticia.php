<?php 
if ($this->session->userdata('logado') == true && $this->session->userdata('excluir') == true) {
	$id = $this->uri->segment(3);
	if ($id == NULL) redirect ('CRUD_Noticia/retrieve');

	echo "<br>";
    echo "<br>";
    echo "<div class='center_align small_div'>";
	echo "<h1 class='center big_title'>Deletar Notícia</h1>";
	echo "<br>";
    echo "<br>";
	$query = $this->Noticia_model->get_byid($id)->row();

	echo form_open("CRUD_Noticia/delete/$id");
	//echo validation_errors('<p>','</p>');
	echo form_label('ID: ');
	echo form_input(array('name'=>'id'),set_value('id',$query->id),
		'disabled="disabled"');
	echo "<br>";
    echo "<br>";
	echo form_label('Título: ');
	echo form_input(array('name'=>'titulo'),set_value('titulo',$query->titulo),
		'disabled="disabled"');
	echo "<br>";
    echo "<br>";
	echo form_label('Texto: ');
	echo form_textarea(array('name'=>'texto'),set_value('texto',$query->texto),
		'disabled="disabled"');
	echo "<br>";
    echo "<br>";
	echo form_label('Data: ');
	echo form_input(array('name'=>'data'),set_value('data',$query->data),
		'disabled="disabled"');
	echo "<br>";
    echo "<br><div class='center'>";
	echo form_submit(array('name'=>'excluir'), 'Excluir Registro');
	echo "</div>";
	echo form_hidden('id',$query->id);
	echo form_close();
	echo "</div>";
} else {
	include "erro_permissao.php";
}