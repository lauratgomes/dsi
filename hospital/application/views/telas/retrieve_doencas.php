<?php
	if ($this->session->userdata('logado') == true) {
		echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-10'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Doenças</h5>";
                            echo "</div>";
                        echo "</div>";
                       	echo "<nav class='navbar navbar-expand-lg navbar-custom' id='pesquisa'>";
							echo "<ul class='navbar-nav mr-auto'>";
							echo "</ul>";
								echo form_open('CRUD_Doenca/pesquisa_doencas');
									echo "<div class='form-row'>";
								        echo form_input(array('name'=>'codigo', 'placeholder'=>'Código'), set_value('codigo'), array('class'=>'form-control col-lg-3'));
								        echo form_input(array('name'=>'descricao', 'placeholder'=>'Descrição'), set_value('descricao'), array('class'=>'form-control col-lg-6'));
								        echo form_submit(array('name'=>'cadastrar'), 'Pesquisar');
							        echo "</div>";
						        echo form_close();
						echo "</nav>";
                        echo "<div class='card-body'>";

							if ($this->session->flashdata('exclusaook')):
								echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
							endif;


							$template = array(
							    'table_open' => '<table class="table table-striped text-center">'
							);
							$this->table->set_template($template);
							
							$this->table->set_heading('CID', 'Descrição');
							foreach ($doencas as $linha):
								$this->table->add_row($linha->codigo, $linha->descricao);
							endforeach;
							echo $this->table->generate();

						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}