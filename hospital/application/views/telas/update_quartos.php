<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_quarto = $this->uri->segment(3);
		if ($id_quarto == NULL) redirect('CRUD_Quarto/retrieve_quartos');

		$query = $this->Quarto_model->select_quartos($id_quarto)->row();

		echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Edição do quarto: $query->id </h5>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body'>";
							echo form_open("CRUD_Quarto/update_quartos/$id_quarto");
								
								if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;

								echo "<div class='form-group'>";
									echo form_label('Limite de pacientes por quarto: ');
									echo form_input(array('name' => 'limite', 'class' => 'form-control', 'type' => 'number', 'value' => $query->limite));
								echo "</div> <br />";
								echo "<div class='text-center'>";
	                                echo form_submit(array('name'=>'cadastrar'), 'Enviar', array('class' => 'btn btn-secondary btn-block'));
	                            echo "</div>";
								echo form_hidden('id_quarto', $query->id);
							echo form_close();
						echo "</div>";
	    			echo "</div>";
	    		echo "</div>";
	    	echo "</div>";
	    echo "</div>";
	} else {
		include "erro.php";
	}