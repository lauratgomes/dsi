<?php 
if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {

	$iduser = $this->uri->segment(3);
	if ($iduser == NULL) redirect ('CRUD_Usuario/retrieve');

	$query = $this->Usuario_model->get_byid($iduser)->row();
	$permissoes = $this->Usuario_model->get_permissoes()->result();
	echo "<br>";
	echo "<br>";
	echo "<div class='center_align micro_div'>";
	echo "<h1 class='center big_title'>Update Usuário</h1>";
	echo form_open("CRUD_Usuario/update/$iduser");
	if ($this->session->flashdata('edicaook')):
		echo "<p class='success'>".$this->session->flashdata('edicaook').'</p>';
	endif;
	echo "<br>";
	echo "<br>";
	echo form_label('Nome Completo: ');
	echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),'autofocus');
	echo "<br>";
	echo "<br>";
	echo form_label('Usuario: ');
	echo form_input(array('name'=>'usuario'),set_value('usuario',$query->usuario));
	echo "<br>";
	echo "<br>";
	echo form_label('Senha: ');
	echo form_password(array('name'=>'senha'));
	echo "<br>";
	echo "<br>";
	echo form_label('Repita a Senha: ');
	echo form_password(array('name'=>'senha2'));
	echo "<br>";
	echo "<br>";

	$p = "";

	$cadastrar = false;
	$editar = false;
	$excluir = false;

	foreach ($permissoes as $permissao):
		if ($permissao->id_usuario == $query->id): 
			if ($permissao->id_permissao == 1) {
				$cadastrar = true;
			} else {
				if ($permissao->id_permissao == 2) {
				$editar = true;
				}
				else {
					if ($permissao->id_permissao == 3) {
					$excluir = true;
					}
				}
			}
			
		endif;
	endforeach;

	if ($cadastrar == true) {
		$data = array(
	        'name'          => 'permissoes[]',
	        'value'         => 1,
	        'checked'       => TRUE,
		);
		echo form_checkbox($data);
		echo form_label('Cadastrar');
		echo "<br>";
	} else {
		$data = array(
	        'name'          => 'permissoes[]',
	        'value'         => 1,
	        'checked'       => FALSE,
		);
		echo form_checkbox($data);
		echo form_label('Cadastrar');
		echo "<br>";
	}
	////////////////////////////////////////
	
	if ($editar == true) {
		$data = array(
	        'name'          => 'permissoes[]',
	        'value'         => 2,
	        'checked'       => TRUE,
		);
		echo form_checkbox($data);
		echo form_label('Editar');
		echo "<br>";
	} else {
		$data = array(
	        'name'          => 'permissoes[]',
	        'value'         => 2,
	        'checked'       => FALSE,
		);
		echo form_checkbox($data);
		echo form_label('Editar');
		echo "<br>";
	}
	//////////////////////////////////////////
	
	if ($excluir == true) {
		$data = array(
	        'name'          => 'permissoes[]',
	        'value'         => 3,
	        'checked'       => TRUE,
		);
		echo form_checkbox($data);
		echo form_label('Excluir');
		echo "<br>";
	} else {
		$data = array(
	        'name'          => 'permissoes[]',
	        'value'         => 3,
	        'checked'       => FALSE,
		);
		echo form_checkbox($data);
		echo form_label('Excluir');
		echo "<br>";
	}
	echo "<br>";
	echo "<br><div class='center'>";	
	echo form_submit(array('name'=>'atualizar'), 'Alterar Dados');
	echo "</div>";
	echo form_hidden('idusuario',$query->id);
	echo form_close();
	echo "</div>";
} else {
	include "erro_permissao.php";
}