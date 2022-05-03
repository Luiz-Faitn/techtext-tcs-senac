<?php 

    include "conexao.php";

    if($_GET) {
        $sql = "SELECT razao_social, nome_fantasia, marca FROM cliente WHERE idcliente = $_GET[codigo]";

        $resultado = mysqli_query($conexao, $sql);

        $cliente = mysqli_fetch_array($resultado);

        if (!$resultado) {
            echo "Erro: " . mysqli_error($conexao);
        }
        $op = "Editar";
    } else {
        $op = "Cadastrar";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<body>
    <h2>Cadastro de Cliente</h2>
    <a href="listar_Cliente.php">Lista de Clientes</a><br /><br />
    <form method="post" action="grava_Cliente.php">
<?php
    if ($_GET) {
        echo "Código:<br />";
        echo "<input type='text' name='cod' readonly='readonly' value='$_GET[codigo]' /><br /><br />";
    }
?>

    Razão Social:<br />
    <input type="text" name="razao_social" value="<?php echo $cliente['razao_social'] ?>" /><br /><br />

    Nome Fantasia:<br />
    <input type="text" name="nome_fantasia" value="<?php echo $cliente['nome_fantasia'] ?>" /><br /><br />

    Marca:<br />
    <input type="text" name="marca" value="<?php echo $cliente['marca'] ?>" /><br /><br />

    <input type="submit" value="<?php echo $op ?>" />

    </form>   
</body>
</html>
