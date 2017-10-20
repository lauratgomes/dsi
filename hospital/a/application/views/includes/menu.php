<ul>
	<?php 
	if ($this->session->userdata('logado') == true && $this->session->userdata('admin') == true) {
		echo "<li>" . anchor('CRUD_Usuario/create','Create Usuário') . "</li>"; 
		echo "<li>" . anchor('CRUD_Usuario/retrieve','Retrieve Usuário') . "</li>"; 
		echo "<li>" . anchor('CRUD_Usuario/retrieve','Update Usuário') . "</li>"; 
		echo "<li>" . anchor('CRUD_Usuario/retrieve','Delete Usuário') . "</li>";  	
	}
	if ($this->session->userdata('logado') == true) {
		echo "<li>" . anchor('CRUD_Noticia/create','Create Notícia') . "</li>"; 
		echo "<li>" . anchor('CRUD_Noticia/retrieve','Retrieve Notícia') . "</li>"; 
		echo "<li>" . anchor('CRUD_Noticia/retrieve','Update Notícia') . "</li>"; 
		echo "<li>" . anchor('CRUD_Noticia/retrieve','Delete Notícia') . "</li>";  	
		echo "<li>" . anchor('CRUD_Usuario/logout','Logout') . "</li>";  	
	}
    ?>

    
</ul>