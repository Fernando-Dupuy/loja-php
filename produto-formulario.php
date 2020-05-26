<?php
    include("cabecalho.php");
    include("conecta.php");
    include("banco-categoria.php");
    include("logica-usuario.php");
    
    $categorias = listaCategoria($conexao);
    verificaUsuario();
?>

<h1>Formulário de cadastro</h1>
<form action="adiciona-produto.php" method="post">
    <table class="table">
        <tr>
            <td>Nome</td>
            <td>
             <input type="text" class="form-control" name="nome" /></td>
        </tr>
        <tr>
            <td>Preço</td>
            <td>
                <input type="number" step="0.01" class="form-control" name="preco" /></td>
        </tr>
        <tr>
            <td>Descrição</td>
            <td><textarea name="descricao" class="form-control" ></textarea></td>
        </tr>
       
        <tr>
            <td>Categorias</td>
            <td>
                <select name="categoria_id" class="select">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria['id'] ?>"><?= $categoria['categoria_nome'] ?> </option> 
                <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
                    <td></td>
                    <td><input type="checkbox" name="usado" value="true">Usado</td>
        </tr>
        
        <tr>
        <td><input type="submit" value="Cadastrar" class="btn btn-primary"></td>
        <td></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
