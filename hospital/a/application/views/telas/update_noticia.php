<?php 
if ($this->session->userdata('logado') == true && $this->session->userdata('editar') == true) {

	$id = $this->uri->segment(3);
	if ($id == NULL) redirect ('CRUD_Noticia/retrieve');

	$query = $this->Noticia_model->get_byid($id)->row();
	$usuarios = $this->Usuario_model->get_all()->result();
	echo "<br>";
    echo "<br>";
    echo "<div class='center_align medium_div'>";
	echo "<h1 class='center big_title'>Editar Notícias</h1>";
	echo form_open_multipart("CRUD_Noticia/update/$id");
	if ($this->session->flashdata('edicaook')):
		echo "<p class='success'>".$this->session->flashdata('edicaook').'</p>';
	endif;
	echo "<br>";
    echo "<br>";
	echo "<label>Autor: </label>";
	echo "<select name='id_usuario'>";
		foreach ($usuarios as $usuario):
			if ($query->id_usuario == $usuario->id) {
				echo "<option value='".$usuario->id."' selected='selected'>".$usuario->nome."</option>";
			} else {
				echo "<option value='".$usuario->id."'>".$usuario->nome."</option>";
			}
		endforeach;
	echo "</select>";
	echo "<br>";
    echo "<br>";
	echo form_label('Título: ');
	echo form_input(array('name'=>'titulo'),set_value('titulo',$query->titulo),'autofocus');
	echo "<br>";
    echo "<br>";
	echo form_label('Texto: ');
	echo form_textarea(array('name'=>'texto'),set_value('texto',$query->texto));
   	echo "<br>";
    echo "<br>";
    echo "Selecione uma imagem... ";
    echo "<input type='file' name='foto' accept='image/*'>";
    echo "<br>";
    echo "<br>";
    echo form_label('Data: ');
    echo "<input type='date' name='data' value='".$query->data."'>";
    echo "<br>";
    echo "<br><div class='center'>";
	echo form_submit(array('name'=>'atualizar'), 'Alterar Dados');
	echo "</div>";
	echo form_hidden('id',$query->id);
	echo form_close();

} else {
	include "erro_permissao.php";
}