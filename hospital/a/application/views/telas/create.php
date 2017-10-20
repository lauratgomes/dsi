<?php 
if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
        
        echo "<br>";
        echo "<br>";
        echo "<div class='center_align small_div'>";

        echo "<h1 class='center big_title'>Cadastro de Usuários</h1>";
        echo "<br>";
        echo form_open('CRUD_Usuario/create');
        if ($this->session->flashdata('cadastrook')):
            echo "<p class='success'>".$this->session->flashdata('cadastrook').'</p>';
        endif;       
        echo form_label('Nome Completo: ');
        echo form_input(array('name'=>'nome'),set_value('nome'),'autofocus');
        echo "<br>";
        echo "<br>";
        echo form_label('Usuario: ');
        echo form_input(array('name'=>'usuario'),set_value('usuario'));
        echo "<br>";
        echo "<br>";
        echo form_label('Senha: ');
        echo form_password(array('name'=>'senha'),set_value('senha'));
        echo "<br>";
        echo "<br>";
        echo form_label('Repita a Senha: ');
        echo form_password(array('name'=>'senha2'),set_value('senha2'));
        echo "<br>";
        echo "<br>";
        
        $data = array(
                'name'          => 'permissoes[]',
                'value'         => 1,
                'checked'       => FALSE,
        );
        echo form_checkbox($data);
        echo form_label('Cadastrar');
        echo "<br>";
        
        $data = array(
                'name'          => 'permissoes[]',
                'value'         => 2,
                'checked'       => FALSE,
        );
        echo form_checkbox($data);
        echo form_label('Editar');
        echo "<br>";
        
        $data = array(
                'name'          => 'permissoes[]',
                'value'         => 3,
                'checked'       => FALSE,
        );
        echo form_checkbox($data);
        echo form_label('Excluir');
        echo "<br>";
        echo "<br> <div class='center'>";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
        echo "</div></div>";
        echo form_close();
} else {
         include "erro_permissao.php";
}