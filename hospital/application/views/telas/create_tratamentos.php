<?php
    if ($this->session->userdata('logado') == true) {
       echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Cadastro de Tratamentos</h5>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body'>";
                        	echo form_open('CRUD_Tratamento/create_tratamentos');

                            	if ($this->session->flashdata('cadastrook')):
                                    echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
                                endif;

                                echo "<div class='form-row'>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('CPF do paciente: ');
                                        echo form_input(array('name'=>'cpf_paciente'), set_value('cpf_paciente'), array('class' => 'form-control'));
                                    echo "</div>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('CPF do médico: ');
                                        echo form_input(array('name'=>'cpf_medico'), set_value('cpf_medico'), array('class' => 'form-control'));
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('CID: ');
                                        echo form_input(array('name'=>'cid'), set_value('cid'), array('class' => 'form-control'));
                                        echo "<small class='form-text text-muted'>" . anchor("CRUD_Doenca/retrieve_doencas", 'Não sabe o CID? Clique aqui.', ['target' => '_blank']) . "</small>";
                                    echo "</div>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('Remédio: ');
                                        echo form_input(array('name'=>'remedio'), set_value('remedio'), array('class' => 'form-control'));
                                        echo "<small class='form-text text-muted'>" . anchor("CRUD_Medicamento/retrieve_medicamentos", 'Não sabe qual remédio cadastrar? Clique aqui.', ['target' => '_blank']) . "</small>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Data e hora de entrada: ');
                                    echo form_input(array('name'=>'data_hora_entrada', 'type'=>'datetime-local', 'class'=>'form-control'), set_value('data_hora_entrada'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Escolha um quarto: ');
                                    echo "<select class='form-control' name='quarto'>";
                                           foreach ($quartos as $linha) {
                                               echo "<option value=$linha->id> $linha->id </option>";
                                           }
                                    echo "</select>";
                                echo "</div> <br />";
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