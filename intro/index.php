<?php

include_once('../configs/configurations.inc.php');

$tabCategoria = new Categoria;
//$tabLivro = new Livro;

//Template::enviareEmail('lala.txt');


Seguranca::estaConectado();

Template::gerarAdmin('');


$categorias = $tabCategoria->listar();



echo '<a href="inserirCategoria.php?id=' . $categoria->id .'"> Nova Categoria </a>';


echo '<table>
	<tr>
		<th> Ação </th>
		<th>'. $tabCategoria->legendas['id'].'</th>
		<th>'. $tabCategoria->legendas['descricao'].'</th>
		
	</tr>';
	
while ($categoria = $categorias->fetchObject()) 
{
	echo '
		<tr>
			<td>
				<a href="editarCategoria.php?id='.$categoria->id.'">editar</a>
				<a href="excluirCategoria.php?id='.$categoria->id.'">excluir</a>
			</td>

			<td>
				'.$categoria->id.'
			</td>
			
			<td>
				'.$categoria->descricao.'
			</td>
			
		</tr>
		
		';	
}



	echo '</table>';



?>