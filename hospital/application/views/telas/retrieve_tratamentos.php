<?php
    if ($this->session->userdata('logado') == true) {
		echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-11'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Tratamentos</h5>";
                            echo "</div>";
                        echo "</div>";

						if ($this->session->flashdata('exclusaook')):
							echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
						endif;


						if ($tratamentos == NULL) {
							echo "<br/>
								  <div class='alert alert-info' role='alert'>
									<strong>Desculpe!</strong> Ainda não há registros.
								  </div>";
						} else {
							foreach ($tratamentos as $linha):
								$template = array(
								    'table_open' => '<table class="table table-striped text-center">'
								);
								$this->table->set_template($template);

								$this->table->set_heading('CPF do paciente','CPF do médico', 'CID', 'Remédio', 'Quarto', 'Data e Hora de entrada', 'Data e Hora de saída', 'Saída', '', '');
							
								if ($linha->data_hora_saida == NULL && $linha->saida == NULL) {
									$linha->data_hora_saida = "-";
									$linha->saida = "-";
									$this->table->add_row($linha->cpf_paciente, $linha->cpf_medico, $linha->cid, $linha->remedio, $linha->quarto, $linha->data_hora_entrada, $linha->data_hora_saida, $linha->saida, 
										anchor("CRUD_Tratamento/update_tratamentos/$linha->id", "<img height='25px' width='25px' src='../imagens/lapis.png'>"), 
										anchor("CRUD_Tratamento/delete_tratamentos/$linha->id", "<img height='25px' width='25px' src='../imagens/lixeira.png'>"));
								} else {
									if ($linha->saida == 'alta') {
										$linha->saida = 'Alta médica';
									} else {
										$linha->saida = 'Óbito';
									}

									$this->table->set_heading('CPF do paciente','CPF do médico', 'CID', 'Remédio', 'Quarto', 'Data e Hora de entrada', 'Data e Hora de saída', 'Saída', '', '');
									$this->table->add_row($linha->cpf_paciente, $linha->cpf_medico, $linha->cid, $linha->remedio, $linha->quarto, $linha->data_hora_entrada, $linha->data_hora_saida, $linha->saida, '', '');
								}

							endforeach;
							echo $this->table->generate();
						}
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}