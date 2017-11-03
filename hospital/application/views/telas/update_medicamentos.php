<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_medicamento = $this->uri->segment(3);
		if ($id_medicamento == NULL) redirect('CRUD_Medicamento/retrieve_medicamentos');

		$query = $this->Medicamento_model->select_medicamentos($id_medicamento)->row();

		echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Edição do medicamento: $id_medicamento </h5>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body'>";
			
							echo form_open("CRUD_Medicamento/update_medicamentos/$id_medicamento");
								
								if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;

								 echo "<div class='form-group'>";
                                	echo form_label('Nome: ');
									echo form_input(array('name'=>'nome'), set_value('nome', $query->nome), array('class'=>'form-control'));
								echo "</div> <br />";
								echo "<div class='text-center'>";
                                    echo form_submit(array('name'=>'cadastrar'), 'Enviar', array('class' => 'btn btn-secondary btn-block'));
                                echo "</div>";
								echo form_hidden('id_medicamento', $query->id);
							echo form_close();
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}