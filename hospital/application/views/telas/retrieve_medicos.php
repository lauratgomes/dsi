<?php
	if ($this->session->userdata('logado') == true) {
		echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-12'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Médicos</h5>";
                            echo "</div>";
                        echo "</div>";
                       	echo "<nav class='navbar navbar-expand-lg navbar-custom' id='pesquisa'>";
							echo "<ul class='navbar-nav mr-auto'>";
							echo "</ul>";
							echo form_open('CRUD_Medico/pesquisa_medicos');
								echo "<div class='form-row'>";
									echo form_input(array('name'=>'nome', 'placeholder'=>'Nome'), set_value('nome'), array('class'=>'form-control col-lg-8'));
							        echo form_submit(array('name'=>'cadastrar'), 'Pesquisar', array('class' => 'btn btn-secondary'));
							    echo "</div>";
					        echo form_close();
        				echo "</nav>";
                        echo "<div class='card-body'>";

							if ($this->session->flashdata('exclusaook')):
								echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
							endif;

							if ($medicos == NULL) {
								echo "<br/>
									  <div class='alert alert-info' role='alert'>
										<strong>Desculpe!</strong> Não há registros para a sua busca.
									  </div>";
							} else {
								$template = array(
									    'table_open' => '<table class="table table-striped text-center">'
									);
								$this->table->set_template($template);
								
								$this->table->set_heading('CPF', 'CRM/COREN', 'Nome', 'Data de nascimento', 'CEP', 'Rua', 'Complemento', '', '');

								foreach ($medicos as $linha):
									$this->table->add_row($linha->cpf, $linha->crm_coren, $linha->nome, $linha->nascimento, $linha->cep, $linha->rua, $linha->complemento, 
										anchor("CRUD_Medico/update_medicos/$linha->cpf", "<img height='25px' width='25px' src='../imagens/lapis.png'>"),  
										anchor("CRUD_Medico/delete_medicos/$linha->cpf", "<img height='25px' width='25px' src='../imagens/lixeira.png'>"));
								endforeach;
								echo $this->table->generate();
							}
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}