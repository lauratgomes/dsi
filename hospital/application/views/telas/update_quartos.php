<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_quarto = $this->uri->segment(3);
		if ($id_quarto == NULL) redirect('CRUD_Quarto/retrieve_quartos');

		$query = $this->Quarto_model->select_quartos($id_quarto)->row();

		echo "<h2>Editar quarto $query->id </h2>";
			
		echo form_open("CRUD_Quarto/update_quartos/$id_quarto");
			
		if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

		echo form_label('Limite de pacientes por quarto: ');
		echo form_input(array('name' => 'limite',
							  'class' => 'form-control',
							  'type' => 'number',
							  'value' => $query->limite), 'autofocus');
		echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Alterar Dados');
		echo form_hidden('id_quarto', $query->id);
		echo form_close();
	} else {
		include "erro.php";
	}