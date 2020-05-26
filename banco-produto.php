<?php
function listaProduto($conexao) {
	$produtos = array( );

	$resultado = mysqli_query($conexao, "select p.*, categoria_nome from produtos p inner join categorias c on p.categoria_id = c.id");

	while($produto= mysqli_fetch_assoc($resultado)){
		array_push($produtos, $produto);
	}

	return $produtos;

}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado){
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) 
		values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);

    return $resultadoDaInsercao;
}



function removeProduto($conexao, $id){
	$query = "delete from produtos where Id = {$id}";
	return mysqli_query($conexao, $query);
}


function buscaProduto($conexao, $id){
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}


function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado){
	$query = "update produtos set nome ='{$nome}', preco = {$preco}, descricao = '{$descricao}', 
	categoria_id = {$categoria_id}, usado = {$usado} where Id = {$id} ";

	return mysqli_query($conexao, $query);
}