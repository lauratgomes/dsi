<?php
	if (isset($this->session->userdata['usuario'])) {
		$username = ($this->session->userdata['usuario']['login']);
		$permissao = ($this->session->userdata['usuario']['permissao']);

		if ($permissao == 0 || $permissao == 3) {

				
			$id_not = $this->uri->segment(3);
			if ($id_not == NULL) redirect('crud/retrieve');

			$query = $this->crud_model->select_noticias($id_not)->row();

			echo "<h2>Editar Notícias</h2>";
			
			echo form_open_multipart("crud/update/$id_not");
			
			if ($this->session->flashdata('edicaook')):
				echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
			endif;
			
			echo "<br />";
			echo "<br />";
			echo form_label('Título: ');
			echo form_input(array('name'=>'titulo'), set_value('titulo', $query->titulo), 'disabled="disabled"');
			echo "<br />";
			echo form_label('Descrição: ');
			echo form_textarea(array('name'=>'descricao'), set_value('descricao', $query->descricao));
			echo "<br />";
			echo form_label('Autor: ');
			echo form_input(array('name'=>'autor'), set_value('autor', $query->autor));
			echo "<br />";
			echo form_label('Data: ');
			echo "<input type='date' name='data' value='" . $query->data . "'>";
			echo "<br />";
			echo form_label('Imagem: ');
			echo "<input type='file' name='imagem'>";
    		echo "<br />";
			echo form_submit(array('name'=>'cadastrar'), 'Alterar Dados');
			echo form_hidden('id_noticia', $query->id);
			echo form_close();


		} else {
			include "erro.php";
		}
	}