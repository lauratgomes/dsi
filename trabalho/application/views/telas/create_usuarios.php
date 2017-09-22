<?php 
echo form_open('crud/create_usuarios');
echo validation_errors('<p>','</p>');

if ($this->session->flashdata('cadastrook')):
	echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
endif;

echo "<br /><br /><br /><br />";
echo form_label('Nome: ');
echo form_input(array('name'=>'nome'), set_value('nome'), 'autofocus');
echo "<br />";
echo form_label('Login: ');
echo form_textarea(array('name'=>'login'), set_value('login'));
echo "<br />";
echo form_label('Senha: ');
echo form_password(array('name'=>'senha'),set_value('senha'));
echo "<br />";
echo form_label('Permissão: ');
echo "<input type='number' name='permissao'>";
echo "<br />";
echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
echo form_close();