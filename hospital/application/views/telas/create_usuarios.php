<?php

    if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {

        echo "<h2>Cadastro de Usuários</h2>";

        echo form_open('CRUD_Usuario/create_usuarios');

        if ($this->session->flashdata('cadastrook')):
            echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
        endif;

        echo form_label('Nome: ');
        echo form_input(array('name'=>'nome'), set_value('nome'), 'autofocus');
        echo "<br />";
        echo form_label('Login: ');
        echo form_input(array('name'=>'login'), set_value('login'));
        echo "<br />";
        echo form_label('Senha: ');
        echo form_password(array('name'=>'senha'), set_value('senha'));
        echo "<br />";
        echo form_label('Esse usuário será um administrador? ');
        echo "<select name='admin'>
                <option value='TRUE'> SIM </option>
                <option value='FALSE'> NÃO </option>
              </select>";
        echo "<br />";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
        echo form_close();
    } else {
      include "erro.php";
    }