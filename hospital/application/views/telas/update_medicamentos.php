<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_medicamento = $this->uri->segment(3);
		if ($id_medicamento == NULL) redirect('CRUD_Medicamento/retrieve_medicamentos');

		$query = $this->Medicamento_model->select_medicamentos($id_medicamento)->row();

		echo "<h2>Editar medicamento: $id_medicamento </h2>";
			
		echo form_open("CRUD_Medicamento/update_medicamentos/$id_medicamento");
			
		if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

		echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), 'autofocus');
		echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Alterar Dados');
		echo form_hidden('id_medicamento', $query->id);
		echo form_close();
	} else {
		include "erro.php";
	}