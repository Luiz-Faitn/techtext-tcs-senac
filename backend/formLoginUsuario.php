<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>TECHTEXT</h1>
    <h2>Entre na sua conta</h2>

    <form method="POST" action="gravaLoginUsuario.php"> 
        
        E-mail: <input type="email" name="email" maxlength="100" placeholder="Digite seu e-mail"><br><br>
        Senha: <input type="password" name="senha" maxlength="15" placeholder="Digite sua senha"><br><br>

        <input type="submit" value="Entrar"><br><br>
        <a href="formCadastroUsuario.php">Cadastre-se</a>
    </form>
</body>
</html>