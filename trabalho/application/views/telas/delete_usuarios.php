<?php

$id_user = $this->uri->segment(3);
if ($id_user == NULL) redirect('crud/retrieve_usuarios');

$query = $this->crud_model->select_usuarios($id_user)->row();

echo form_open("crud/delete_usuarios/$id_user");
if ($this->session->flashdata('edicaook')):
	echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
endif;

echo "<br /> <br /> <br /> <br />";
echo form_label('Nome: ');
echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), 'disabled="disabled"');
echo "<br />";
echo form_label('Login: ');
echo form_input(array('name'=>'login'), set_value('login', $query->login), 'disabled="disabled"');
echo "<br />";
echo form_label('Senha: ');
echo form_password(array('name'=>'senha'), set_value('senha', $query->senha), 'disabled="disabled"');
echo "<br />";
echo form_label('Permissão: ');
echo "<input type='number' name='permissao' value='" . $query->permissao . "' disabled='disabled'>";
echo form_submit(array('name'=>'cadastrar'), 'Excluir registro');
echo form_hidden('id_user', $query->id);
echo form_close();