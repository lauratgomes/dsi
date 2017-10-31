<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>" />
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






<?php
echo "<br>";
echo "<div class='container-fluid'>";
echo "<div class='row align-items-center justify-content-center'>";
echo "<div class='col-lg-3'>";
echo "<div class='card'>";
echo "<div class='card-body'>";
echo form_open('Login_Logout/login');
echo "<div class='form-group'>";
if ($this->session->flashdata('loginbad')):
        echo "<p class='alert alert-danger'>".$this->session->flashdata('loginbad').'</p>';
endif;
echo form_label('Usuário: ');
echo form_input(array('name'=>'usuario'),set_value('usuario'), array('class' => 'form-control'));
echo "<br>";
echo form_label('Senha: ');
echo form_password(array('name'=>'senha'),set_value('senha'), array('class' => 'form-control'));
echo "<br>";
echo "<div class='text-center'>";
echo form_submit(array('name'=>'login'), 'Logar', array('class' => 'btn btn-botica'));
echo "</div>";
echo "</div>";
echo form_close();
echo "</div>";
echo "</div>";
echo "</div>";