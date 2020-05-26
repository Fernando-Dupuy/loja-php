<?php 
include('./cabecalho.php'); 
include('./conecta.php'); 
include('./banco-produto.php'); 
include("logica-usuario.php");

verificaUsuario();

?>

<?php
    $produtos = listaProduto($conexao);
?>

<?php if (array_key_exists("removido", $_GET) && $_GET['removido'] == true) {?>
<p class="alert-success">Produto apagado com sucesso!</p>
<?php
}?>
<table class="table table-striped table-bordered">
<?php
    foreach ($produtos as $produto):
?>
<tr>
		<td><?=$produto['nome']?></td>
		<td><?=$produto['preco']?></td>
		<td><?=substr($produto['descricao'], 0, 40)?></td>
		<td><?= $produto['categoria_nome']?></td>
		<td>
			<a class="btn btn-primary" href="produto-altera-formulario.php?id=<?= $produto['Id']?>">Alterar</a>
		</td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?= $produto["Id"]?>">
				<button class="btn btn-danger">Remover</button>
			</form>
		</td>		
</tr>
<?php
    endforeach
?>
</table>
<?php include('./rodape.php'); ?>