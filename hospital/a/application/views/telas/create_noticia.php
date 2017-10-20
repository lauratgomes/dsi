<?php 
if ($this->session->userdata('logado') == true && $this->session->userdata('cadastrar') == true) {
        echo "<br>";
        echo "<br>";
        echo "<div class='center_align small_div'>";

        echo "<h1 class='center big_title'>Cadastro de Usuários</h1>";
        echo "<br>";
        echo "<br>";
        echo form_open_multipart('CRUD_Noticia/create');
        if ($this->session->flashdata('cadastrook')):
        	echo "<p class='success'>".$this->session->flashdata('cadastrook').'</p>';
        endif;
        echo form_label('Título: ');
        echo form_input(array('name'=>'titulo'),set_value('titulo'),'autofocus');
        echo "<br>";
        echo "<br>";
        echo form_label('Texto: ');
        echo form_textarea(array('name'=>'texto'),set_value('texto'));
        echo "<br>";
        echo "<br>";
        echo "Selecione uma imagem... ";
        echo "<input type='file' name='foto' accept='image/*'>";
        echo "<br>";
        echo "<br>";
        echo form_label('Data: ');
        echo "<input type='date' name='data'>";
        echo "<br>";
        echo "<br>";
        echo "<br> <div class='center'>";
        echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
        echo "</div></div>";
        echo form_close();
} else {
         include "erro_permissao.php";
}