<?php
if ($this->session->userdata('logado') == true) {
	echo "<br>";
    echo "<br>";
    echo "<div class='center_align medium_div'>";
	echo "<h1 class='center big_title'>Lista de Notícias</h1>";
	if ($this->session->flashdata('exclusaook')):
		echo "<p class='success'>".$this->session->flashdata('exclusaook').'</p>';
	endif;
	foreach ($noticias as $noticia):
		echo "<div><h2 class='titulo_noticia'>" . $noticia->titulo . "</h2>";
		echo "<table class='tabelinha'><tr><td class='tdzinho'><img src='../uploads/" . $noticia->id . ".jpg' width='350px'></td>";
		echo "<td class='tdzinho'><p>" . $noticia->texto . "</p></td></tr></table>";
		echo "<p>Data: " . $noticia->data . "</p>"; 
		foreach ($usuarios as $usuario):
			if ($usuario->id == $noticia->id_usuario):
				echo "<p>Autor: " . $usuario->nome . "</p>";
			endif;
		endforeach;
		echo  "<p>Id: ".$noticia->id ."</p>";
		echo "<table><tr>";
		if ($this->session->userdata('editar') == true): 
			echo  "<td><p>" . anchor("CRUD_Noticia/update/$noticia->id",'Editar') ."</p></td>";
		endif;
		if ($this->session->userdata('excluir') == true):
			echo  "<td><p>" . anchor("CRUD_Noticia/delete/$noticia->id",'Excluir')."</p></td>";
		endif;
		echo "</table></tr>";
		echo "<hr></div>";
	endforeach;
} else {
	include "erro_permissao.php";
}