<?php 
include("cabecalho.php"); 
include("conecta.php");
include("banco-produto.php");
include("logica-usuario.php");

verificaUsuario();
?>


<?php



$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id= $_POST["categoria_id"];
if (array_key_exists('usado', $_POST)) {
    $usado = 'true';
} else {
    $usado = 'false';
}
//$conexao = mysqli_connect('localhost', 'root', 'loja');




if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) {
    ?>
<p class="alert-success">
    Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!
</p>
<?php
} else {
    $msg = mysqli_error($conexao);
        ?>
    <p class="alert-danger">
       O Produto <?= $nome; ?> não foi adicionado: <?= $msg;?>
    </p>
 <?php
    }
mysqli_close($conexao);
?>   


<?php include("rodape.php"); ?>
