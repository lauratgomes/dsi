<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		echo "<br>";
		echo "<div class='container-fluid'>";
		echo 	"<div class='row align-items-center justify-content-center'>";
		echo 		"<div class='col-md-11'>";
		echo 			"<div class='card'>";
		echo 				"<div class='card-header card-title'>";
		echo 					"<h4 class='text-center'>Usuários</h4>";
		echo 				"</div>";


		if ($this->session->flashdata('exclusaook')):
			echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
		endif;
		$this->table->set_heading('ID', 'Nome', 'Login', 'Administrador', '', '');
		foreach ($usuarios as $linha):
			if ($linha->admin == 't') {
				$linha->admin = "Sim";
				$this->table->add_row($linha->id, $linha->nome, $linha->login, $linha->admin);
			} else {
				$linha->admin = "Não";
				$this->table->add_row($linha->id, $linha->nome, $linha->login, $linha->admin, 
				anchor("CRUD_Usuario/update_usuarios/$linha->id", 'Editar'),  
				anchor("CRUD_Usuario/delete_usuarios/$linha->id", 'Excluir'));
			}
		endforeach;
		echo $this->table->generate();
		echo 			"</div>";
echo 		"</div>";
echo 				"</div>";
echo 			"</div>";
echo 		"</div>";
echo "</div>";
	} else {
		include "erro.php";
	}