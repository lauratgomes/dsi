<?php
    if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
        echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Cadastro de Medicamentos </h5>";
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='card-body'>";
                            echo form_open('CRUD_Medicamento/create_medicamentos');

                                if ($this->session->flashdata('cadastrook')):
                                    echo "<div class='alert alert-success'" . $this->session->flashdata('cadastrook') . "</div>";
                                endif;

                                echo "<div class='form-group'>";
                                    echo form_label('Nome: ');
                                    echo form_input(array('name'=>'nome'), set_value('nome'), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<br />";
                                echo "<div class='text-center'>";
                                    echo form_submit(array('name'=>'cadastrar'), 'Cadastrar', array('class' => 'btn btn-secondary btn-block'));
                                echo "</div>";
                            echo form_close();
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    } else {
      include "erro.php";
    }