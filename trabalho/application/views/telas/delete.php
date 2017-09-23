<?php
	$this->load->view('includes/header');

$id_not = $this->uri->segment(3);
if ($id_not == NULL) redirect('crud/retrieve');

$query = $this->crud_model->select_noticias($id_not)->row();

echo form_open("crud/delete/$id_not");
if ($this->session->flashdata('edicaook')):
	echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
endif;

echo "<br /> <br /> <br /> <br />";
echo form_label('Título: ');
echo form_input(array('name'=>'titulo'), set_value('titulo', $query->titulo), 'disabled="disabled"');
echo "<br />";
echo form_label('Descrição: ');
echo form_input(array('name'=>'descricao'), set_value('descricao', $query->descricao), 'disabled="disabled"');
echo "<br />";
echo form_label('Autor: ');
echo form_input(array('name'=>'autor'), set_value('autor', $query->autor), 'disabled="disabled"');
echo "<br />";
echo form_label('Data: ');
echo "<input type='date' name='data' value='" . $query->data . "' disabled='disabled'>";
echo "<br />";
echo form_label('Imagem: ');
echo "<input type='file' name='imagem' disabled='disabled'>";
echo "<br />";
echo form_submit(array('name'=>'cadastrar'), 'Excluir registro');
echo form_hidden('id_noticia', $query->id);
echo form_close();