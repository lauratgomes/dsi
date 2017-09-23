<?php
	$this->load->view('includes/header');

$id_user = $this->uri->segment(3);
if ($id_user == NULL) redirect('crud/retrieve_usuarios');

$query = $this->crud_model->select_usuarios($id_user)->row();

echo form_open("crud/update_usuarios/$id_user");
echo validation_errors('<p>','</p>');
if ($this->session->flashdata('edicaook')):
	echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
endif;

echo "<br /><br /><br /><br />";
echo form_label('Nome: ');
echo form_input(array('name'=>'nome'), set_value('nome', $query->nome));
echo "<br />";
echo form_label('Login: ');
echo form_input(array('name'=>'login'), set_value('login', $query->login), 'disabled="disabled"');
echo "<br />";
echo form_label('Senha: ');
echo form_password(array('name'=>'senha'), set_value('senha', $query->senha));
echo "<br />";
echo form_label('Permissão: ');
echo "<input type='number' name='permissao' value='" . $query->permissao . "'>";
echo "<br />";
echo form_submit(array('name'=>'cadastrar'), 'Alterar Dados');
echo form_hidden('id_user', $query->id);
echo form_close();