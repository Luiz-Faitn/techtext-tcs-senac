<?php
    include "conexao.php";

    if($_GET['cod']){
       $sql = "SELECT idUsuario, email, senha, nivel
               FROM usuario
               WHERE idUsuario = $_GET[cod]";

        $resultado = mysqli_query($conexao, $sql);

        if(!$resultado){
            die("Erro: " . mysqli_error($conexao));
        }else{
            $users = mysqli_fetch_array($resultado);
        }
    }

    $sqlNivel = "SELECT nivel FROM usuario";
    $resultNivel = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>TECHTEXT</h1>
    <h2>Cadastro de Usuário</h2><br>

    <?php
        if($_GET['cod']){
           echo "Código:";
           echo "<input readonly='readonly' type='text' name='cod' value='$_GET[cod]'/><br><br>";
        }
    ?>

    <form action="gravaCadastroUsuario.php" method="POST">

        E-mail: 
        <input type="email" name="email" maxlength="100" placeholder="Digite seu e-mail"
                value="<?php echo $users['email'] ?>">
        <br><br>

        Senha: 
        <input type="password" name="senha" maxlength="15" placeholder="Digite sua senha"
                value="<?php echo $users['senha'] ?>">
        <br><br>

        Nível:
        <select name="nivel">
            <option value="">
                Selecionar
            </option>

            <?php
                while($resultadoNivel = mysqli_fetch_array($resultNivel)){

                    if($resultadoNivel['nivel'] == $users['nivel']){
                        echo "<option value='$resultadoNivel[nivel]' selected='selected'>";
                    }else{
                        echo "<option value='$resultadoNivel[nivel]'>";
                    }

                    echo "$resultadoNivel[nivel]";
                    echo "</option>";
                }
            ?> 
        </select>
        <br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>