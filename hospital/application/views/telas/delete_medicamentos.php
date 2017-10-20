<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_medicamento = $this->uri->segment(3);
		if ($id_medicamento == NULL) redirect('CRUD_Medicamento/retrieve_medicamentos');

		$query = $this->Medicamento_model->select_medicamentos($id_medicamento)->row();

		echo "<h2>Deletar Usuário</h2>";
		echo form_open("CRUD_Medicamento/delete_medicamentos/$id_medicamento");
			
		if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

		echo form_label('ID: ');
		echo form_input(array('name'=>'ID'), set_value('ID', $query->id), 'disabled="disabled"');
		echo form_label('Nome: ');
		echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), 'disabled="disabled"');
		echo "<br />";
			
		echo form_submit(array('name'=>'cadastrar'), 'Excluir registro');
		echo form_hidden('id_medicamento', $query->id);
		echo form_close();
	} else {
		include "erro.php";
	}