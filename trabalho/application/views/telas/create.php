<?php 
$this->load->view('includes/header');

echo form_open('crud/create');
echo validation_errors('<p>','</p>');

if ($this->session->flashdata('cadastrook')):
	echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
endif;

echo "<br /><br /><br /><br />";
echo form_label('Título: ');
echo form_input(array('name'=>'titulo'), set_value('titulo'), 'autofocus');
echo "<br />";
echo form_label('Descrição: ');
echo form_textarea(array('name'=>'descricao'), set_value('descricao'));
echo "<br />";
echo form_label('Autor: ');
echo form_input(array('name'=>'autor'),set_value('autor'));
echo "<br />";
echo form_label('Data: ');
echo "<input type='date' name='data'>";
echo "<br />";
echo form_label('Imagem: ');
echo form_open_multipart('upload_controller/do_upload');
echo "<input type='file' name='imagem'>";
echo "<br />";
echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
echo form_close();