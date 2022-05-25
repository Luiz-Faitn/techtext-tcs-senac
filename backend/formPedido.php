<?php
    include 'conexao.php';

    if($_GET['cod']){
        $sql = "SELECT idPedido, data_Cadastro, idCliente, dataEntrega 
                FROM pedido
                WHERE idPedido = " . $_GET['cod'];
        
        $resultado = mysqli_query($conexao, $sql);

        if(!$resultado){
            die("Erro: " . mysqli_error($conexao));
        }else{
            $pedido = mysqli_fetch_array($resultado);
        }
    }

    $sqlCliente = "SELECT idCliente, nome_fantasia FROM cliente ORDER BY nome_fantasia";

    $resultadoCliente = mysqli_query($conexao, $sqlCliente);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Pedidos</title>
</head>

<body>
  <h2>Cadastro de Pedidos</h2>

  <a href="listaPedido.php">Lista</a><br><br>

  <form method="post" action="gravaPedido.php">

    <?php
        if($_GET['cod']){
    ?>
    Código: <br>
    <input type="text" readonly="readonly" value="<?php echo $pedido['idPedido'] ?>" name="cod"><br><br>
    <?php
        }
    ?>

    Data do Cadastro: <br>
    <input type="date" value="<?php echo $pedido['dataCadastro'] ?>" name="dataCadastro"><br><br>

    Cliente: <br>
    <select name="cliente">
      <option>Selecione</option>
      <?php
                while($cliente = mysqli_fetch_array($resultadoCliente)){
                    
                      if($cliente['idCliente'] == $pedido['idCliente']){
                         echo "<option value='$cliente[idCliente]' selected='selected'>";
                      }else{
                         echo "<option value='$cliente[idCliente]'>";
                      }
                      
                      echo $cliente['nome_fantasia'];
                      echo "</option>";
                }
            ?>

      <br><br>

    </select>
    <br><br>

    Data de Entrega: <br>
    <input type="date" value="<?php echo $pedido['dataEntrega'] ?>" name="dataEntrega">
    <br><br>

    <input type="submit" value="Enviar">
  </form>
</body>

</html>