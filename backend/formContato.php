<?php
    include 'conexao.php';

    if($_GET['cod']){
       $sql = "SELECT idContato, email, telefone, idCliente 
               FROM contato 
               WHERE idContato = $_GET[cod]";

        $resultado = mysqli_query($conexao, $sql);

        if(!$resultado){
            die("Erro: " . mysqli_error($conexao));
        }else{
            $contato = mysqli_fetch_array($resultado);
        }
    }

    $sqlCliente = "SELECT idCliente, razao_social, nome_fantasia, marca
                   FROM cliente
                   ORDER BY nome_fantasia";
    
    $resultadoCliente = mysqli_query($conexao, $sqlCliente);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="post" action="gravaContato.php">

        <h2>Cadastro de Contato</h2>

    <?php
        if($_GET['cod']){
           echo "Código: <br>";
           echo "<input readonly='readonly' type='text' name='cod' value='$_GET[cod]'/><br><br>";
        }
    ?>

        Email: <br>
        <input type="email" name="email" maxlength="100" placeholder="usuario@email.com" 
                                value="<?php echo $contato['email'] ?>">
        <br><br>

        Telefone: <br>
        <input type="tel" name="telefone" maxlength="15" placeholder="(99)99999-9999" 
                                value="<?php echo $contato['telefone'] ?>">

        <br><br>

        Cliente: <br>        
        <select name="cliente">
            <option>Selecione</option>

        <?php
            while($resultado = mysqli_fetch_array($resultadoCliente)){

                  if($resultado['idCliente'] == $contato['idCliente']){
                     echo "<option value='$resultado[idCliente]' selected='selected'>";
                  }else{
                     echo "<option value='$resultado[idCliente]'>";
                  }
                  
                  echo $resultado['nome_fantasia'];
                  echo "</option>";
            }
        ?>
        </select>

        <br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>