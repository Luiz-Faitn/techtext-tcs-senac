<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>TECHTEXT</h1>
    <h2>Cadastro de Usuário</h2><br>

    <form action="gravaCadastroUsuario.php" method="POST">

        E-mail: <input type="email" name="email" maxlength="100" placeholder="Digite seu e-mail"><br><br>
        Senha: <input type="password" name="senha" maxlength="15" placeholder="Digite sua senha"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>