<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		echo "<br />";
	        echo "<div class='container-fluid'>";
	            echo "<div class='row align-items-center justify-content-center'>";
	                echo "<div class='col-lg-10'>";
	                    echo "<div class='card'>";
	                        echo "<div class='card-header card-title'>";
	                            echo "<div class='text-center'>";
	                                echo "<h5>Quartos</h5>";
	                            echo "</div>";
	                        echo "</div>";
							
							echo "<div class='card-body'>";
	                    		echo "<div class='row'>";
		
							if ($this->session->flashdata('exclusaook')):
								echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
							endif;

							foreach ($quartos as $linha):
								if ($linha->vago == 't') {
									$linha->vago = 'Vago';
								} else {
									$linha->vago = 'Ocupado';
								}

								echo "<div class='col-md-4'>";
									echo "<div class='card'>";
										echo "<img height='200px' width='100px' class='card-img-top' src='../imagens/quarto.jpg' />";
										echo "<h5 class='card-title text-center'> Quarto " . $linha->id . " - " . $linha->vago . "</h5>";
										echo "<div class='card-body'>";
											echo "<p class='card-text text-justify'> Limite de pacientes: " . $linha->limite . "</p>";
											echo "<div class='text-right'>";
												echo anchor("CRUD_Quarto/update_quartos/$linha->id", "<img height='25px' width='25px' src='../imagens/lapis.png'>");
												if ($linha->vago == 'Vago') {
													echo anchor("CRUD_Quarto/delete_quartos/$linha->id", "<img height='25px' width='25px' src='../imagens/lixeira.png'>");
												}
											echo "</div>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							endforeach;
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}