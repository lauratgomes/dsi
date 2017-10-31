<?php

    if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
        echo "<br />";
        echo "<div class='container-fluid'>";
        echo "<div class='row align-items-center justify-content-center'>";
        echo "<div class='col-lg-6'>";
        echo "<div class='card'>";
        echo "<div class='card-header card-title'>";
        echo "<h4>Cadastro de Medicamentos </h4>";
        echo "</div>";
        echo "<div class='card-body'>";

        echo form_open('CRUD_Medicamento/create_medicamentos');

        if ($this->session->flashdata('cadastrook')):
            echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
        endif;

        echo form_label('Nome: ');
        echo form_input(array('name'=>'nome'), set_value('nome'), 'autofocus', array('class' => 'form-control'));
        echo "<br />";
        echo "<div class='text-center'>";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar', array('class' => 'btn btn-botica'));
        echo "</div>";
        echo "</div>";
        echo form_close();
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo form_close();
    } else {
      include "erro.php";
    }