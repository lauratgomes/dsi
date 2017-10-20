<?php 
if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
	$iduser = $this->uri->segment(3);
	if ($iduser == NULL) redirect ('CRUD_Usuario/retrieve');

	$query = $this->Usuario_model->get_byid($iduser)->row();
	$permissoes = $this->Usuario_model->get_permissoes()->result();

	 
	$p = "";
	foreach ($permissoes as $permissao):
		if ($permissao->id_usuario == $query->id): 
			if ($permissao->id_permissao == 1) $p .= "Cadastrar ";
			if ($permissao->id_permissao == 2) $p .= "Editar ";
			if ($permissao->id_permissao == 3) $p .= "Excluir ";
		endif;
	endforeach;
	echo "<br>";
	echo "<br>";
	echo "<div class='justify center_align micro_div'>";
	echo "<h1 class='center big_title'>Deletar Usuário</h1>";
	echo form_open("CRUD_Usuario/delete/$iduser");
	echo form_label('ID: ');
	echo form_input(array('name'=>'ID'),set_value('ID',$query->id),
		'disabled="disabled"');
	echo "<br>";
	echo "<br>";
	echo form_label('Nome Completo: ');
	echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),
		'disabled="disabled"');
	echo "<br>";
	echo "<br>";
	echo form_label('Usuário: ');
	echo form_input(array('name'=>'usuario'),set_value('usuario',$query->usuario),
		'disabled="disabled"');
	echo "<br>";
	echo "<br>";
	echo "<div class='center'>";
	echo form_submit(array('name'=>'cadastrar'), 'Excluir Registro');
	echo "</div>";
	echo form_hidden('idusuario',$query->id);
	echo form_close();
	echo "</div>";
} else {
	include "erro_permissao.php";
}