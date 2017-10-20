<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_quarto = $this->uri->segment(3);
		if ($id_quarto == NULL) redirect('CRUD_Quarto/retrieve_quartos');

		$query = $this->Quarto_model->select_quartos($id_quarto)->row();

		echo "<h2>Deletar Quarto</h2>";
		echo form_open("CRUD_Quarto/delete_quartos/$id_quarto");
			
		if ($this->session->flashdata('edicaook')):
			echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
		endif;

		echo form_label('No do quarto: ');
		echo form_input(array('name'=>'ID'), set_value('ID', $query->id), 'disabled="disabled"');
		echo form_label('Limite de pacientes: ');
		echo form_input(array('name'=>'limite'), set_value('limite', $query->limite), 'disabled="disabled"');
		echo "<br />";
		echo form_label('Vago: ');
		echo form_input(array('name'=>'vago'), set_value('vago', $query->vago), 'disabled="disabled"');
		echo "<br />";
		echo form_submit(array('name'=>'cadastrar'), 'Excluir registro');
		echo form_hidden('id_quarto', $query->id);
		echo form_close();
	} else {
		include "erro.php";
	}
	