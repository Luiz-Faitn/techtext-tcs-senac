<?php
    include 'conexao.php';
    
    $modelo =                         $_POST['modelo'];
    $tipoTecido =                     $_POST['tipoTecido'];
    $tipoForro =                      $_POST['tipoForro'];
    $obesrvacao =                     $_POST['obesrvacao']; 
    $descricaoBotao =                 $_POST['descricaoBotao'];
    $descricaoRibite =                $_POST['descricaoRibite'];
    $placa =                          $_POST['placa'];
    $quantidadeBotao =                $_POST['quantidadeBotao'];
    $quantidadeRibite =               $_POST['quantidadeRibite']; 
    $quantidadePlaca =                $_POST['quantidadePlaca'];
    $tamanho =                        $_POST['tamanho'];
    $tamanhoCintura =                 $_POST['tamanhoCintura'];
    $tamanhoQuadril =                 $_POST['tamanhoQuadril'];
    $tamanhoGanchoTraseiro =          $_POST['tamanhoGanchoTraseiro'];
    $tamanhoComprimentoPernaLateral = $_POST['tamanhoComprimentoPernaLateral'];
    $tamanhoComprimentoFrentePerna =  $_POST['tamanhoComprimentoFrentePerna'];
    $tamanhoLaguraPerna =             $_POST['tamanhoLaguraPerna'];

    if ($_POST['cod']) {
        $sql = "UPDATE produto SET modelo='$modelo', tipoTecido='$tipoTecido', tipoForro='$tipoForro', obesrvacao='$obesrvacao', descricaoBotao='$descricaoBotao', descricaoRibite='$descricaoRibite', placa='$placa',
        quantidadeBotao='$quantidadeBotao', quantidadeRibite='$quantidadeRibite', quantidadePlaca='$quantidadePlaca', tamanho='$tamanho', tamanhoCintura='$tamanhoCintura', tamanhoQuadril='$tamanhoQuadril', tamanhoGanchoTraseiro='$tamanhoGanchoTraseiro',
        tamanhoComprimentoPernaLateral='$tamanhoComprimentoPernaLateral', tamanhoComprimentoFrentePerna='$tamanhoComprimentoFrentePerna', tamanhoLaguraPerna='$tamanhoLaguraPerna'
        WHERE idProduto=$_POST[cod]";
    } else {
         $sql = "INSERT INTO produto (modelo, tipoTecido, tipoForro, obesrvacao, descricaoBotao, descricaoRibite, placa,
         quantidadeBotao, quantidadeRibite, quantidadePlaca, tamanho, tamanhoCintura, tamanhoQuadril, tamanhoGanchoTraseiro,
         tamanhoComprimentoPernaLateral, tamanhoComprimentoFrentePerna, tamanhoLaguraPerna) VALUES ('$modelo', '$tipoTecido', '$tipoForro',
         '$obesrvacao', '$descricaoBotao', '$descricaoRibite', '$placa', $quantidadeBotao, $quantidadeRibite, 
         $quantidadePlaca, $tamanho, $tamanhoCintura, $tamanhoQuadril, $tamanhoGanchoTraseiro, $tamanhoComprimentoPernaLateral, 
         $tamanhoComprimentoFrentePerna, $tamanhoLaguraPerna)";
    }

   $resultado = mysqli_query($conexao, $sql);

    if ($resultado) {
        header('location:../Frontend/listar_produto.php');
    } else {
        die("Erro: " . mysqli_error($conexao));
    }