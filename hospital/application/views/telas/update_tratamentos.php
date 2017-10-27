<?php
    if ($this->session->userdata('logado') == true) {

    	$id_tratamento = $this->uri->segment(3);
		if ($id_tratamento == NULL) redirect('CRUD_Tratamento/retrieve_tratamentos');

        $query = $this->Registro_model->select_registros($id_tratamento)->row();

    	echo "<h2> Edição de Tratamento </h2>";

    	echo form_open("CRUD_Tratamento/update_tratamentos/$id_tratamento");

    	if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

        echo form_label('CPF do médico: ');
        echo form_input(array('name'=>'cpf_medico'), set_value('cpf_medico', $query->cpf_medico), 'autofocus');
        echo "<br />";
        echo form_label('CID: ');
        echo form_input(array('name'=>'cid'), set_value('cid', $query->cid));
        echo "<br />";
        echo "Caso você não saiba o CID, descubra clicando " . anchor("CRUD_Doenca/retrieve_doencas", 'aqui', ['target' => '_blank']);  
        echo "<br />";
        echo form_label('Remédio: ');
        echo form_input(array('name'=>'remedio'), set_value('remedio', $query->remedio));
        echo "Caso você não saiba o código do remédio, descubra clicando " . anchor("CRUD_Medicamento/retrieve_medicamentos", 'aqui', ['target' => '_blank']);  
        echo "<br />";
        echo form_label('Escolha um quarto: ');
        echo "<select name='quarto'>";
               foreach ($quartos as $linha) {
                   echo "<option value=$linha->id> $linha->id </option>";
               }
        echo "</select>";
        echo "<br />";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
        echo form_hidden('id_tratamento', $query->id);
		echo form_close();
    } else {
      include "erro.php";
    }