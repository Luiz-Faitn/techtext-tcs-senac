<?php
    include "conexao.php";

    $sql = "SELECT idUsuario, email, senha, nivel
            FROM usuario";

    $resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Lista de Usuários</h2>

    <a href="../index.php">Voltar</a><br><br>

    <table border="1">
        <tr>
            <td>Código</td>
            <td>Email</td>
            <td>Senha</td>
            <td>Nível</td>
            <td></td>
        </tr>

        <?php
            while($linha = mysqli_fetch_array($resultado)){
                echo "<tr>";
                echo "<td>$linha[idUsuario]</td>";
                echo "<td>$linha[email]</td>";
                echo "<td>$linha[senha]</td>";
                
                echo "<td>";
                    if($linha['nivel'] == 1){
                        echo "Produção";
                    }else{
                        echo "Administrador";
                    }
                echo "</td>";

                echo "<td>";
                echo "<a href='formCadastroUsuario.php?cod=$linha[idUsuario]'>
                          Editar
                      </a>";
                echo "</td>";
  
  
                echo "<td>";
                echo "<a href='excluirUsuario.php?cod=$linha[idUsuario]'>
                          Excluir";
                echo "</td>";

                echo "</tr>";
            }


        ?>
    </table>
</body>
</html>