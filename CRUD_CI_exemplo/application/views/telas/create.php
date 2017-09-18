<?php 
echo form_open('crud/create');
echo validation_errors('<p>','</p>');

if ($this->session->flashdata('cadastrook')):
	echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
endif;

echo form_label('Título: ');
echo form_input(array('name'=>'titulo'),set_value('titulo'),'autofocus');
echo form_label('Descrição: ');
echo form_textarea(array('name'=>'descricao'),set_value('descricao'));
echo form_label('Autor: ');
echo form_input(array('name'=>'autor'),set_value('autor'));
echo form_label('Data e Hora: ');
echo form_input(array('name'=>'data_hora'),set_value('data_hora'));
echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
echo form_close();