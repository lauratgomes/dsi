<?php
	if (isset($this->session->userdata['usuario'])) {
		$username = ($this->session->userdata['usuario']['login']);
		$permissao = ($this->session->userdata['usuario']['permissao']);

		if ($permissao == 0 || $permissao == 1 || $permissao == 2 || $permissao == 3) {
			if (isset($this->session->userdata['usuario'])) {

				echo "<h2>Lista de Notícias</h2>";

				if ($this->session->flashdata('exclusaook')):
					echo '<p>'.$this->session->flashdata('exclusaook').'</p>';
				endif;

				echo "<table class='table-striped'>
						<tr>
							<th>Título</th>
							<th>Imagem</th>
							<th>Descrição</th>
							<th>Data</th>
							<th>Autor</th>
							<th></th>
							<th></th>
						</tr>";
				foreach ($noticias as $linha):
					echo "<tr>
							<td> " . $linha->titulo . "</td>
							<td> <img src='../uploads/" . $linha->id . ".jpg' width='150px' height='150px'> </td>
							<td><p>" . $linha->descricao . "</p> </td>
							<td><p>" . $linha->data . "</p> </td>
							<td><p>" . $linha->autor . "</p> </td>
							<td>" . anchor("crud/update/$linha->id", 'Editar') . "</td>
							<td>" . anchor("crud/delete/$linha->id", 'Excluir') . "</td>
						 </tr>";
				endforeach;
				echo "</table>";
			} else {
				include "erro.php";
			}
		}
	}