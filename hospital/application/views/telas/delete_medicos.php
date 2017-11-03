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
								echo "<h5>Exclusão de Médicos</h5>";
							echo "</div>";
						echo "</div>";
						echo "<div class='card-body'>";

							echo form_open("CRUD_Medico/delete_medicos/$id_medico");
							
								if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;
								
								echo "<div class='form-row'>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CPF: ');
										echo form_input(array('name'=>'cpf', 'disabled'=>'disabled'), set_value('cpf', $query->cpf), array('class' => 'form-control'));
									echo "</div>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CRM/COREN: ');
										echo form_input(array('name'=>'crm_coren', 'disabled'=>'disabled'), set_value('crm_coren', $query->crm_coren), array('class' => 'form-control'));
									echo "</div>";
								echo "</div>";
								echo "<div class='form-group'>";
									echo form_label('Nome: ');
									echo form_input(array('name'=>'nome', 'disabled'=>'disabled'), set_value('nome', $query->nome), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-row'>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('Data de nascimento: ');
										echo form_input(array('name' => 'nascimento', 'class' => 'form-control', 'type' => 'date', 'value' => $query->nascimento, 'disabled'=>'disabled'));
									echo "</div>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CEP: ');
										echo form_input(array('name'=>'cep', 'disabled'=>'disabled'), set_value('cep', $query->cep), array('class' => 'form-control'));
									echo "</div>";
								echo "</div>";

								echo "<div class='form-group'>";
									echo form_label('Rua: ');
									echo form_input(array('name'=>'rua', 'disabled'=>'disabled'), set_value('rua', $query->rua), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-group'>";
									echo form_label('Complemento: ');
									echo form_input(array('name'=>'complemento', 'disabled'=>'disabled'), set_value('complemento', $query->complemento), array('class' => 'form-control'));
								echo "</div> <br />";
								echo "<div class='text-center'>";
									echo form_submit(array('name'=>'cadastrar'), 'Excluir', array('class' => 'btn btn-secondary btn-block'));
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