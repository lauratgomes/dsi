<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>" />
    <link rel="shortcut icon" href="../imagens/favicon.png"/>
</head>
<body>
<?php
	if ($this->session->userdata('logado') == false) {

		$this->load->view('includes/header');

		echo "<div class='container'>
	        	<div class='card card-container'>
	            <img id='profile-img' class='profile-img-card' src='//ssl.gstatic.com/accounts/ui/avatar_2x.png' />
	            <p id='profile-name' class='profile-name-card'></p>";
				
				echo form_open('CRUD_Usuario/user_login_process'); 
					$login = array(
						'name' => 'login',
						'class' => 'form-control',
						'placeholder' => 'Login',
						'required' => 'required');
					echo form_input($login);

					echo "<br />";

					$senha = array(
						'type' => 'password',
						'name' => 'senha',
						'class' => 'form-control',
						'placeholder' => 'Senha',
						'required' => 'required');
					echo form_input($senha);

					echo "<br />";

					echo form_submit(array(
							'name' => 'cadastrar',
							'class' => 'btn btn-lg btn-primary btn-block btn-signin'), 'Enviar');
				echo form_close();
		echo "</div>
			</div>";
	} else {
		redirect('CRUD_Usuario/retrieve_usuarios');
	}
?>
</body>
</html>