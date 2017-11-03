<?php 
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		echo "<br />";
		echo "<div class='container-fluid'>";
			echo "<div class='row align-items-center justify-content-center'>";
				echo "<div class='col-lg-8'>";
					echo "<div class='card'>";
						echo "<div class='card-header card-title'>";
							echo "<div class='text-center'>";
								echo "<h5>Cadastro de Médicos</h5>";
							echo "</div>";
						echo "</div>";
						echo "<div class='card-body'";
							echo form_open('CRUD_Medico/create_medicos');

								if ($this->session->flashdata('cadastrook')):
									echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
								endif;

								echo "<div class='form-row'>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CPF: ');
										echo form_input(array('name'=>'cpf', 'pattern'=>'\d*', 'max'=>'99999999999'), set_value('cpf'), array('class' => 'form-control'));
									echo "</div>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CRM/COREN: ');
										echo form_input(array('name'=>'crm_coren'), set_value('crm_coren'), array('class' => 'form-control'));
									echo "</div>";
								echo "</div>";
	
								echo "<div class='form-group'>";
									echo form_label('Nome: ');
									echo form_input(array('name'=>'nome'), set_value('nome'), array('class' => 'form-control'));
								echo "</div>";
								
								echo "<div class='form-row'>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('Data de nascimento: ');
										echo form_input(array('name' => 'nascimento', 'class' => 'form-control', 'type' => 'date'));
									echo "</div>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CEP: ');
										echo form_input(array('name'=>'cep'), set_value('cep'), array('class' => 'form-control'));
									echo "</div>";
								echo "</div>";

								echo "<div class='form-group'>";
									echo form_label('Rua: ');
									echo form_input(array('name'=>'rua'), set_value('rua'), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-group'>";
									echo form_label('Complemento: ');
									echo form_input(array('name'=>'complemento'), set_value('complemento'), array('class' => 'form-control'));
								echo "</div> <br />";
								echo "<div class='text-center'>";
									echo form_submit(array('name'=>'cadastrar'), 'Cadastrar', array('class' => 'btn btn-secondary btn-block'));
								echo "</div>";
							echo form_close();
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}