<?php
if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
	echo "<br>";
	echo "<div class='container-fluid'>";
	echo 	"<div class='row align-items-center justify-content-center'>";
	echo 		"<div class='col-md-11'>";
	echo 			"<div class='card'>";
	echo 				"<div class='card-header card-title'>";
	echo 					"<h4 class='text-center'>Quartos</h4>";
	echo 				"</div>";
	
	if ($this->session->flashdata('exclusaook')):
		echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
	endif;

		//$this->table->set_heading('ID', 'Limite de pacientes', 'Vago', '', '');
	foreach ($quartos as $linha):
		if ($linha->vago = 't') {
			$linha->vago = 'Vago';
		} else {
			$linha->vago = 'Ocupado';
		}

		echo "<div class='card-body'>";
		echo 	"<div class='row'>";
		echo 		"<div class='col-md-4'>";
		echo 			"<div class='card' style='width: 20rem;'>";
		echo 				"<img class='card-img-top' src='../images/fitos.jpg' alt='Card image cap'>";
		echo 					"<div class='card-body'>";
		echo 	   					"<h5 class='card-title text-center'> Quarto " . $linha->id . " - " . $linha->vago . "</h5>";
		echo 	   						"<p class='card-text text-justify'> Limite de pacientes: " . $linha->limite . "</p>";
		echo 							"<div class='text-right'>";
		echo 								"<a href='link...'>
		<img src='../images/icons/edit1_gray.png'> </img>
	</a>";
	echo 								"<a href='link...'>
	<img src='../images/icons/delete1_gray.png'> </img>
</a>";
echo							anchor("CRUD_Quarto/update_quartos/$linha->id", 'Editar');
echo "<br/>";
echo							anchor("CRUD_Quarto/delete_quartos/$linha->id", 'Excluir');
echo					"</div>";
echo					"</div> </div> </div>";
endforeach;
echo 			"</div>";
echo 		"</div>";
echo 				"</div>";
echo 			"</div>";
echo 		"</div>";
echo "</div>";
} else {
	include "erro.php";
}