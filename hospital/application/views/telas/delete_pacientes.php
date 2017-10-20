<?php
    if ($this->session->userdata('logado') == true) {

    	$id_paciente = $this->uri->segment(3);
    	if ($id_paciente == NULL) redirect('CRUD_Paciente/retrieve_pacientes');

    	$query = $this->Paciente_model->select_pacientes($id_paciente)->row();

    	echo "<h2>Saída do(a) Paciente: $query->nome </h2>";

        echo form_open('CRUD_Paciente/delete_pacientes/$id_paciente');

       	if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

        echo form_label('CPF: ');
		echo form_input(array('name'=>'cpf'), set_value('cpf', $query->cpf), 'disabled="disabled"');
		echo "<br />";
        echo form_label('RG: ');
		echo form_input(array('name'=>'rg'), set_value('rg', $query->rg), 'disabled="disabled"');
		echo "<br />";
        echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Telefone: ');
		echo form_input(array('name'=>'telefone'), set_value('telefone', $query->telefone), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Rua: ');
		echo form_input(array('name'=>'rua'), set_value('rua', $query->rua), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Complemento: ');
		echo form_input(array('name'=>'complemento'), set_value('complemento', $query->complemento), 'disabled="disabled"');
		echo "<br />";
		echo form_label('A saída é por qual motivo? ');
		echo "<select name='saida'>
                <option value='alta'> Alta médica </option>
                <option value='morte'> Óbito </option>
              </select>";
        echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Excluir');
		echo form_hidden('id_paciente', $query->cpf);
		echo form_close();
	} else {
		include "erro.php";
	}