<?php 
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
	    echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Cadastro de Quartos </h5>";
                            echo "</div>";
                        echo "</div>";
                        
                        echo "<div class='card-body'>";
							echo form_open('CRUD_Quarto/create_quartos');
							
								if ($this->session->flashdata('cadastrook')):
									echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
								endif;

                                echo "<div class='form-group'>";
									echo form_label('Limite de pacientes por quarto: ');
									echo form_input(array('name' => 'limite', 'class' => 'form-control', 'type' => 'number'));
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