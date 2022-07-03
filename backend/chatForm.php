<!DOCTYPE html>
<html>
<head>
	<title>Chat-Simples</title>
	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
						document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'chat.php', true);
			req.send();
		}	
		setInterval(function(){ajax();}, 1000);
	</script>
</head>
<body onload="ajax();">
	<div id="chat">	
	</div>
	<form method="post">
	<input type="number" name="idchat" placeholder="Insere o seu nome: ">
		<input type="text" name="nome" placeholder="Insere o seu nome: ">
		<input type="text" name="mensagem" placeholder="mensagem">
		<input type="submit" value="Enviar">	
	</form>

  <?php
		include "conexao.php";
		$nome = $_POST['nome'];
		$mensagem = $_POST['mensagem'];

        $sql = "INSERT INTO chat (nome, mensagem) VALUES ('$nome', '$mensagem')";

        $resultado = mysqli_query($sql, $conexao);

      if ($resultado) {   
          header('../chatForm.php');
      } else {
          echo "Erro: " . mysqli_error($conexao);
      }
	?>
	
</body>
</html>