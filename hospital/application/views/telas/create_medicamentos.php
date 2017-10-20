<?php

    if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
    
        echo "<h2>Cadastro de Medicamentos </h2>";

        echo form_open('CRUD_Medicamento/create_medicamentos');

        if ($this->session->flashdata('cadastrook')):
            echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
        endif;

        echo form_label('Nome: ');
        echo form_input(array('name'=>'nome'), set_value('nome'), 'autofocus');
        echo "<br />";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
        echo form_close();
    } else {
      include "erro.php";
    }