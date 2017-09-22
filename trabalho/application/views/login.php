<?php 
echo form_open('crud/login');
echo validation_errors('<p>','</p>');

echo "<br /><br /><br /><br />";
echo form_label('Login: ');
echo form_input(array('name'=>'login'), set_value('login'), 'autofocus');
echo "<br />";
echo form_label('Senha: ');
echo form_password(array('name'=>'senha'),set_value('senha'));
echo "<br />";
echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
echo form_close();