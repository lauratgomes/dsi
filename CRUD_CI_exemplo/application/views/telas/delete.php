<?php

$id_not = $this->uri->segment(3);
if ($id_not == NULL) redirect('crud/retrieve');

$query = $this->crud_model->get_byid($id_not)->row();

echo form_open("crud/delete/$id_not");
//echo validation_errors('<p>','</p>');
if ($this->session->flashdata('edicaook')):
	echo '<p>'.$this->session->flashdata('edicaook').'</p>';
endif;

echo form_label('Título: ');
echo form_input(array('name'=>'titulo'),set_value('titulo', $query->titulo),'disabled="disabled"');
echo form_label('Descrição: ');
echo form_input(array('name'=>'descricao'),set_value('descricao', $query->descricao),'disabled="disabled"');
echo form_label('Autor: ');
echo form_input(array('name'=>'autor'),set_value('autor', $query->autor),'disabled="disabled"');
echo form_label('Data e Hora: ');
echo form_input(array('name'=>'data_hora'),set_value('data_hora', $query->data_hora),'disabled="disabled"');
echo form_submit(array('name'=>'cadastrar'), 'Excluir registro');
echo form_hidden('id_noticia', $query->id);
echo form_close();