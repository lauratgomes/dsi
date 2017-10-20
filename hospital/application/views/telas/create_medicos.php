<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {

			echo form_open('CRUD_Medico/create_medicos');

			if ($this->session->flashdata('cadastrook')):
				echo '<p>'.$this->session->flashdata('cadastrook').'</p>';
			endif;

			echo form_label('CPF: ');
			echo form_input(array('name'=>'cpf',
								  'pattern'=>'\d*',
								  'max'=>'99999999999'), set_value('cpf'),'autofocus');
			echo "<br />";
			echo form_label('CRM/COREN: ');
			echo form_input(array('name'=>'crm_coren'), set_value('crm_coren'));
			echo "<br />";
			echo form_label('Nome: ');
			echo form_input(array('name'=>'nome'), set_value('nome'));
			echo "<br />";
			echo form_label('Data de nascimento: ');
			echo form_input(array('name' => 'nascimento',
								  'class' => 'form-control',
								  'type' => 'date'), 'autofocus');
			echo "<br />";
			echo form_label('CEP: ');
			echo form_input(array('name'=>'cep'), set_value('cep'));
			echo "<br />";
			echo form_label('Rua: ');
			echo form_input(array('name'=>'rua'), set_value('rua'));
			echo "<br />";
			echo form_label('Complemento: ');
			echo form_input(array('name'=>'complemento'), set_value('complemento'));
			echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
			echo form_close();
		} else {
			include "erro.php";
		}
	?>
</body>
</html>
