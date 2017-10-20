<?php
if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
	echo "<br>";
	echo "<br>";
	echo "<div class='center center_align table_div'>";

	echo "<h1 class='big_title'>Lista de Usuários</h1>";
	echo '<br>';
	if ($this->session->flashdata('exclusaook')):
		echo "<p class='success'>".$this->session->flashdata('exclusaook').'</p>';
	endif;
	$this->table->set_heading('ID', 'Nome', 'Usuário', 'Permissões','Operações');
	foreach ($usuarios as $linha):
		$p = "";
		foreach ($permissoes as $permissao):
			if ($permissao->id_usuario == $linha->id): 
				if ($permissao->id_permissao == 1) $p .= "Cadastrar ";
				if ($permissao->id_permissao == 2) $p .= "Editar ";
				if ($permissao->id_permissao == 3) $p .= "Excluir ";
			endif;
		endforeach;
		$this->table->add_row($linha->id,$linha->nome,$linha->usuario, $p,
			anchor("CRUD_Usuario/update/$linha->id",'Editar').' '. 
			anchor("CRUD_Usuario/delete/$linha->id",'Excluir'));
	endforeach;
	echo $this->table->generate();
	echo "</div>";
} else {
	include "erro_permissao.php";
}