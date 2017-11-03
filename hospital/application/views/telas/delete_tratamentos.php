<?php
    if ($this->session->userdata('logado') == true) {

        $id_tratamento = $this->uri->segment(3);
        if ($id_tratamento == NULL) redirect('CRUD_Tratamento/retrieve_tratamentos');

        $query = $this->Tratamento_model->select_tratamentos($id_tratamento)->row();

        echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Exclusão de Tratamento</h5>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body'>";
                            echo form_open("CRUD_Tratamento/delete_tratamentos/$id_tratamento");

                                if ($this->session->flashdata('edicaook')):
                                    echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
                                endif;

                                echo "<div class='form-group'>";
                                    echo form_label('CPF do médico: ');
                                    echo "<select class='form-control' name='cpf_medico' disabled='disabled'>";
                                            foreach ($medicos as $linha) {
                                                if ($linha->cpf == $query->cpf_medico) {
                                                    echo "<option value=$linha->cpf selected> $linha->cpf - $linha->nome </option>";
                                                } else {
                                                    echo "<option value=$linha->cpf> $linha->cpf - $linha->nome </option>";
                                                }
                                            }
                                    echo "</select>";
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('CID: ');
                                        echo form_input(array('name'=>'cid', 'disabled'=>'disabled'), set_value('cid', $query->cid), array('class' => 'form-control'));
                                        echo "<small class='form-text text-muted'>" . anchor("CRUD_Doenca/retrieve_doencas", 'Não sabe o CID? Clique aqui.', ['target' => '_blank']) . "</small>";
                                    echo "</div>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('Remédio: ');
                                        echo form_input(array('name'=>'remedio', 'disabled'=>'disabled'), set_value('remedio', $query->remedio), array('class' => 'form-control'));
                                        echo "<small class='form-text text-muted'>" . anchor("CRUD_Medicamento/retrieve_medicamentos", 'Não sabe qual remédio cadastrar? Clique aqui.', ['target' => '_blank']) . "</small>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Escolha um quarto: ');
                                    echo "<select class='form-control' name='quarto' disabled='disabled'>";
                                        foreach ($quartos as $linha) {
                                            if ($linha->id == $query->quarto) {
                                                echo "<option value=$linha->id selected> $linha->id </option>";
                                            } else {
                                                echo "<option value=$linha->id> $linha->id </option>";
                                            }
                                        }
                                    echo "</select>";
                                echo "</div> <br />";
                                echo "<div class='form-row'>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('A saída é por qual motivo? ');
                                        echo "<select name='saida' class='form-control'>
                                                <option value='alta'> Alta médica </option>
                                                <option value='morte'> Óbito </option>
                                              </select>";
                                    echo "</div> <br />";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('Data e hora da saída: ');
                                        echo form_input(array('name'=>'data_hora_saida', 'type'=>'datetime-local', 'class'=>'form-control', set_value('data_hora_saida')));
                                    echo "</div>";
                                echo "</div> <br />";
                                echo "<div class='text-center'>";
                                    echo form_submit(array('name'=>'cadastrar'), 'Enviar', array('class' => 'btn btn-secondary btn-block'));
                                echo "</div>";
                                echo form_hidden('id_tratamento', $query->id);
                            echo form_close();
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    } else {
      include "erro.php";
    }