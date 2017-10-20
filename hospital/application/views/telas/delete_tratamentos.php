<?php
    if ($this->session->userdata('logado') == true) {

    	$id_tratamento = $this->uri->segment(3);
		if ($id_tratamento == NULL) redirect('CRUD_Tratamento/retrieve_tratamentos');

		$query = $this->Tratamento_model->select_tratamentos($id_tratamento)->row();

    	echo "<h2> Exclusão de Tratamento </h2>";

    	echo form_open('CRUD_Tratamento/delete_tratamentos/$id_tratamento');

    	if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

        echo form_label('CPF do paciente: ');
        form_input(array('name'=>'cpf_paciente'), set_value('cpf_paciente', $query->cpf_paciente), 'disabled="disabled"');
        echo "<br />";
        echo form_label('CPF do médico: ');
        form_input(array('name'=>'cpf_medico'), set_value('cpf_medico', $query->cpf_medico), 'disabled="disabled"');
        echo "<br />";
        echo form_label('CID: ');
        form_input(array('name'=>'cid'), set_value('cid', $query->cid), 'disabled="disabled"');
        echo "<br />";
        echo form_label('Remédio: ');
        form_input(array('name'=>'remedio'), set_value('remedio', $query->remedio), 'disabled="disabled"');
        echo "<br />";
        echo "Qual a causa da saída do paciente?";
         echo "<select name='saida'>
                <option value='alta'> Alta médica </option>
                <option value='morte'> Óbito </option>
              </select>";
        echo "<br />";
        echo form_submit(array('name'=>'cadastrar'), 'Excluir');
        echo form_hidden('id_tratamento', $query->cpf_paciente);
		echo form_close();
    } else {
      include "erro.php";
    }