<?php
$id_not = $this->uri->segment(3);
if ($id_not == NULL) redirect('crud/retrieve');

$query = $this->crud_model->select_noticias($id_not)->row();

echo form_open("crud/update/$id_not");
echo validation_errors('<p>','</p>');
if ($this->session->flashdata('edicaook')):
	echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
endif;

echo "<br /><br /><br /><br />";
echo form_label('Título: ');
echo form_input(array('name'=>'titulo'), set_value('titulo', $query->titulo), 'disabled="disabled"');
echo "<br />";
echo form_label('Descrição: ');
echo form_textarea(array('name'=>'descricao'), set_value('descricao', $query->descricao));
echo "<br />";
echo form_label('Autor: ');
echo form_input(array('name'=>'autor'), set_value('autor', $query->autor));
echo "<br />";
echo form_label('Data: ');
echo "<input type='date' name='data' value='" . $query->data . "'>";
echo "<br />";
echo form_label('Imagem: ');
echo form_open_multipart('upload_controller/do_upload');
echo "<input type='file' name='imagem'>";
echo "<br />";
echo form_submit(array('name'=>'cadastrar'), 'Alterar Dados');
echo form_hidden('id_noticia', $query->id);
echo form_close();