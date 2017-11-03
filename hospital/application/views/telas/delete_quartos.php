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
                                echo "<h5>Exclusão de Quarto </h5>";
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='card-body'>";
							echo form_open("CRUD_Quarto/delete_quartos/$id_quarto");
							
								if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;

		                        echo "<div class='form-group'>";
									echo form_label('Número do quarto: ');
									echo form_input(array('name'=>'ID', 'disabled'=>'disabled'), set_value('ID', $query->id), array('class'=>'form-control'));
								echo "</div>";
		                        echo "<div class='form-group'>";
									echo form_label('Limite de pacientes: ');
									echo form_input(array('name'=>'limite', 'disabled'=>'disabled'), set_value('limite', $query->limite), array('class'=>'form-control'));
								echo "</div>";
		                        echo "<div class='form-group'>";
									echo form_label('Vago: ');
									if ($query->vago == 't') {
										$query->vago = "Sim";
									}
									echo form_input(array('name'=>'vago', 'disabled'=>'disabled'), set_value('vago', $query->vago), array('class'=>'form-control'));
								echo "</div> <br />";
								echo "<div class='text-center'>";
	                                echo form_submit(array('name'=>'cadastrar'), 'Excluir', array('class' => 'btn btn-secondary btn-block'));
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