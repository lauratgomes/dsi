<?php
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		
		$id_user = $this->uri->segment(3);
		if ($id_user == NULL) redirect('CRUD_Usuario/retrieve_usuarios');

		$query = $this->Usuario_model->select_usuarios($id_user)->row();
		
		echo "<br />";
        echo "<div class='container-fluid'>";
            echo "<div class='row align-items-center justify-content-center'>";
                echo "<div class='col-lg-8'>";
                    echo "<div class='card'>";
                        echo "<div class='card-header card-title'>";
                            echo "<div class='text-center'>";
                                echo "<h5>Exclusão de Usuários </h5>";
                            echo "</div>";
                        echo "</div>";
                            
                        echo "<div class='card-body'>";
							echo form_open("CRUD_Usuario/delete_usuarios/$id_user");
								
								if ($this->session->flashdata('edicaook')):
									echo '<p>' . $this->session->flashdata('edicaook') . '</p>';
								endif;
								
								echo "<div class='form-group'>";
									echo form_label('ID: ');
									echo form_input(array('name'=>'ID', 'disabled'=>'disabled'), set_value('ID', $query->id), array('class'=>'form-control'));
								echo "</div>";
								echo "<div class='form-group'>";
                                    echo form_label('Nome: ');
                                    echo form_input(array('name'=>'nome', 'disabled'=>'disabled'), set_value('nome', $query->nome), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Login: ');
                                    echo form_input(array('name'=>'login', 'disabled'=>'disabled'), set_value('login', $query->login), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Senha: ');
                                    echo form_password(array('name'=>'senha', 'disabled'=>'disabled'), set_value('senha', $query->senha), array('class' => 'form-control'));
                                echo "</div>";
                                echo "<div class='form-group'>";
                                    echo form_label('Administrador: ');

                                    if ($query->admin == 't') {
                                    	$query->admin = "Sim";
                                    } else {
                                    	$query->admin = "Não";
                                    }

                                    echo form_input(array('name'=>'admin', 'disabled'=>'disabled'), set_value('admin', $query->admin), array('class'=>'form-control'));
                                echo "</div> <br />";
                                echo "<div class='text-center'>";
                                    echo form_submit(array('name'=>'cadastrar'), 'Excluir', array('class' => 'btn btn-secondary btn-block'));
                                echo "</div>";
								echo form_hidden('id_user', $query->id);
							echo form_close();
						echo "</div>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
	} else {
		include "erro.php";
	}