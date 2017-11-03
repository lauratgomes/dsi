<?php
    if ($this->session->userdata('logado') == true) {

    	$id_tratamento = $this->uri->segment(3);
		if ($id_tratamento == NULL) redirect('CRUD_Tratamento/retrieve_tratamentos');

        $query = $this->Registro_model->select_registros($id_tratamento)->row();

    	echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Edição de Tratamento</h5>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body'>";
                        	echo form_open("CRUD_Tratamento/update_tratamentos/$id_tratamento");

                            	if ($this->session->flashdata('edicaook')):
                        			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
                        		endif;

                                echo "<div class='form-group'>";
                                    echo form_label('CPF do médico: ');
                                    echo form_input(array('name'=>'cpf_medico'), set_value('cpf_medico', $query->cpf_medico), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-row'>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('CID: ');
                                        echo form_input(array('name'=>'cid'), set_value('cid', $query->cid), array('class' => 'form-control'));
                                        echo "<small class='form-text text-muted'>" . anchor("CRUD_Doenca/retrieve_doencas", 'Não sabe o CID? Clique aqui.', ['target' => '_blank']) . "</small>";
                                    echo "</div>";
                                    echo "<div class='form-group col-md-6'>";
                                        echo form_label('Remédio: ');
                                        echo form_input(array('name'=>'remedio'), set_value('remedio', $query->remedio), array('class' => 'form-control'));
                                        echo "<small class='form-text text-muted'>" . anchor("CRUD_Medicamento/retrieve_medicamentos", 'Não sabe qual remédio cadastrar? Clique aqui.', ['target' => '_blank']) . "</small>";
                                    echo "</div>";
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