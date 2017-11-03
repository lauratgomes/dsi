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
								echo "<h5>Edição de Paciente</h5>";
							echo "</div>";
						echo "</div>";
						echo "<div class='card-body'>";
					        echo form_open("CRUD_Paciente/update_pacientes/$cpf_paciente");

						       	if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;

						        echo "<div class='form-group'>";
									echo form_label('Nome: ');
									echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-group'>";
									echo form_label('Telefone: ');
									echo form_input(array('name'=>'telefone'), set_value('telefone', $query->telefone), array('class' => 'form-control'));
								echo "</div>";
								echo "<div class='form-row'>";
									echo "<div class='form-group col-md-7'>";
										echo form_label('Rua: ');
										echo form_input(array('name'=>'rua'), set_value('rua', $query->rua), array('class' => 'form-control'));
									echo "</div>";
									echo "<div class='form-group col-md-5'>";
										echo form_label('Complemento: ');
										echo form_input(array('name'=>'complemento'), set_value('complemento', $query->complemento), array('class' => 'form-control'));
									echo "</div>";
								echo "</div> <br />";
								echo "<div class='text-center'>";
							    	echo form_submit(array('name'=>'cadastrar'), 'Enviar', array('class' => 'btn btn-secondary btn-block'));
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