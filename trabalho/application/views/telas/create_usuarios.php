<?php

if (isset($this->session->userdata['usuario'])) {
    $username = ($this->session->userdata['usuario']['login']);
    $permissao = ($this->session->userdata['usuario']['permissao']);

    if ($permissao == 0) {
    
       echo "<h2>Cadastro de Usuários</h2>";

        echo form_open('crud/create_usuarios');
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
        echo form_password(array('name'=>'senha'),set_value('senha'));
        echo "<br />";
        echo form_label('Permissão: ');
        echo "<select name='permissao'>
                <option value=1> Apenas leitura </option>
                <option value=2> Leitura e escrita </option>
                <option value=3> Leitura, escrita, edição e exclusão </option>
              </select>";
        echo "<br />";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
        echo form_close();
    } else {
      include "erro.php";
    }
}