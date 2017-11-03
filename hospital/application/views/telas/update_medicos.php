<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_medico = $this->uri->segment(3);
		if ($id_medico == NULL) redirect('CRUD_Medico/retrieve_medicos');

		$query = $this->Medico_model->select_medicos($id_medico)->row();

		echo "<br />";
		echo "<div class='container-fluid'>";
			echo "<div class='row align-items-center justify-content-center'>";
				echo "<div class='col-lg-8'>";
					echo "<div class='card'>";
						echo "<div class='card-header card-title'>";
							echo "<div class='text-center'>";
								echo "<h5>Edição do Médico</h5>";
							echo "</div>";
						echo "</div>";
						echo "<div class='card-body'>";
			
							echo form_open("CRUD_Medico/update_medicos/$id_medico");
								
								if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;

								echo "<div class='form-group'>";
									echo form_label('Nome: ');
									echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-row'>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('Data de nascimento: ');
										echo form_input(array('name' => 'nascimento', 'class' => 'form-control', 'type' => 'date', 'value' => $query->nascimento));
									echo "</div>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CEP: ');
										echo form_input(array('name'=>'cep'), set_value('cep', $query->cep), array('class' => 'form-control'));
									echo "</div>";
								echo "</div>";

								echo "<div class='form-group'>";
									echo form_label('Rua: ');
									echo form_input(array('name'=>'rua'), set_value('rua', $query->rua), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-group'>";
									echo form_label('Complemento: ');
									echo form_input(array('name'=>'complemento'), set_value('complemento', $query->complemento), array('class' => 'form-control'));
								echo "</div> <br />";
								echo "<div class='text-center'>";
									echo form_submit(array('name'=>'cadastrar'), 'Enviar', array('class' => 'btn btn-secondary btn-block'));
								echo "</div>";
								echo form_hidden('id_medico', $query->cpf);
							echo form_close();
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";		
	} else {
		include "erro.php";
	}