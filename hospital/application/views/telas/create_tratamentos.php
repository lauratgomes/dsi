<?php
    if ($this->session->userdata('logado') == true) {

       echo "<h2> Cadastro de Tratamento </h2>";

    	echo form_open('CRUD_Tratamento/create_tratamentos');

    	if ($this->session->flashdata('cadastrook')):
            echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
        endif;

        echo form_label('CPF do paciente: ');
        echo form_input(array('name'=>'cpf_paciente'), set_value('cpf_paciente'), 'autofocus');
        echo "<br />";
        echo form_label('CPF do médico: ');
        echo form_input(array('name'=>'cpf_medico'), set_value('cpf_medico'));
        echo "<br />";
        echo form_label('CID: ');
        echo form_input(array('name'=>'cid'), set_value('cid'));
        echo "<br />";
        echo "Caso você não saiba o CID, descubra clicando " . anchor("CRUD_Doenca/retrieve_doencas", 'aqui', ['target' => '_blank']);  
        echo "<br />";
        echo form_label('Remédio: ');
        echo form_input(array('name'=>'remedio'), set_value('remedio'));
        echo "Caso você não saiba o código do remédio, descubra clicando " . anchor("CRUD_Medicamento/retrieve_medicamentos", 'aqui', ['target' => '_blank']);  
        echo "<br />";
        echo form_label('Data e hora de entrada: ');
        echo form_input(array('name'=>'data_hora_entrada', 'type'=>'datetime-local'), set_value('data_hora_entrada'));
        echo "<br />";
        echo form_label('Escolha um quarto: ');
        echo "<select name='quarto'>";
               foreach ($quartos as $linha) {
                   echo "<option value=$linha->id> $linha->id </option>";
               }
        echo "</select>";
        echo "<br />";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
		echo form_close();
    } else {
      include "erro.php";
    }