<?php

include_once('../configs/configurations.inc.php');

$tabCategoria = new Categoria;

//$tabTeste = new Categoria;
$tabLivro = new Categoria;

//$categorias = $tabCategoria->listar();
$livros = $tabLivro->listar();



//echo '<a href="inserirCategoria.php?id=' . $categoria->id .'"> Nova Categoria </a>';
echo '<a href="inserirLivro.php?id=' . $livro->id .'"> Novo Livro </a>';


echo '<table>
	<tr>
		<th> Ação </th>
//		<th>'. $tabCategoria->legendas['id'].'</th>
//		<th>'. $tabCategoria->legendas['descricao'].'</th>
		<th>'. $tabLivro->legendas['id'].'</th>
		<th>'. $tabLivro->legendas['autor'].'</th>
		<th>'. $tabLivro->legendas['titulo'].'</th>
		
	</tr>';
	
//while ($categoria = $categorias->fetchObject()) 
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

while ($livro = $livros->fetchObject()) 
{
	echo '
		<tr>
			<td>
				<a href="editarLivro.php?id='.$livro->id.'">editar</a>
				<a href="excluirLivro.php?id='.$livro->id.'">excluir</a>
			</td>

			<td>
				'.$livro->id.'
			</td>
			
			<td>
				'.$livro->autor.'
			</td>
			
			<td>
				'.$livro->titulo.'
			</td>
		</tr>
		
		';	
}

	echo '</table>';



?>