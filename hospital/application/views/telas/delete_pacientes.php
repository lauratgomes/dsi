<?php
    if ($this->session->userdata('logado') == true) {

    	$cpf_paciente = $this->uri->segment(3);
    	if ($cpf_paciente == NULL) redirect('CRUD_Paciente/retrieve_pacientes');

    	$query = $this->Paciente_model->select_pacientes($cpf_paciente)->row();
		
		echo "<br />";
		echo "<div class='container-fluid'>";
			echo "<div class='row align-items-center justify-content-center'>";
				echo "<div class='col-lg-8'>";
					echo "<div class='card'>";
						echo "<div class='card-header card-title'>";
							echo "<div class='text-center'>";
								echo "<h5>Saída do paciente: $query->nome </h5>";
							echo "</div>";
						echo "</div>";
						echo "<div class='card-body'>";

					        echo form_open("CRUD_Paciente/delete_pacientes/$cpf_paciente");

						       	if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;

						        echo "<div class='form-row'>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('CPF: ');
										echo form_input(array('name'=>'cpf', 'disabled'=>'disabled'), set_value('cpf', $query->cpf), array('class' => 'form-control'));
									echo "</div>";
									echo "<div class='form-group col-md-6'>";
										echo form_label('RG: ');
										echo form_input(array('name'=>'rg', 'disabled'=>'disabled'), set_value('rg', $query->rg), array('class' => 'form-control'));
									echo "</div>";
								echo "</div>";
								echo "<div class='form-group'>";
									echo form_label('Nome: ');
									echo form_input(array('name'=>'nome', 'disabled'=>'disabled'), set_value('nome', $query->nome), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-group'>";
									echo form_label('Telefone: ');
									echo form_input(array('name'=>'telefone', 'disabled'=>'disabled'), set_value('telefone', $query->telefone), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-row'>";
									echo "<div class='form-group col-md-7'>";
										echo form_label('Rua: ');
										echo form_input(array('name'=>'rua', 'disabled'=>'disabled'), set_value('rua', $query->rua), array('class' => 'form-control'));
									echo "</div>";
									echo "<div class='form-group col-md-5'>";
										echo form_label('Complemento: ');
										echo form_input(array('name'=>'complemento', 'disabled'=>'disabled'), set_value('complemento', $query->complemento), array('class' => 'form-control'));
									echo "</div>";
								echo "</div> <br />";
								echo "<div class='text-center'>";
							    	echo form_submit(array('name'=>'cadastrar'), 'Excluir', array('class' => 'btn btn-secondary btn-block'));
							    echo "</div>";
								echo form_hidden('cpf_paciente', $query->cpf);
							echo form_close();
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}