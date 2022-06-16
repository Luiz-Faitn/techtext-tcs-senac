<?php

//Conexão com o banco.
include "../backend/conexao.php";

//Definir o horário padrão brasileiro.
date_default_timezone_set("America/Sao_Paulo");

///Conexão com o banco para pegar as informações que serão mostrados na impressão.
if (isset($_GET)) {
  $sql = "SELECT i.iditens_pedido, i.quantidade AS qtdItensPedido, c.razao_social AS nmCliente, c.idCliente, c.nome_fantasia, i.idPedido, p.data_Cadastro, p.dataEntrega, i.idProduto, 
                 pr.modelo, pr.tipoTecido, pr.tipoForro, pr.obesrvacao AS observacao, pr.descricaoBotao, pr.descricaoRibite, pr.placa, pr.tamanho,
                 pr.tamanhoCintura, pr.tamanhoQuadril, pr.tamanhoGanchoTraseiro, pr.tamanhoComprimentoPernaLateral, pr.tamanhoComprimentoFrentePerna,
                 pr.tamanhoLaguraPerna, (i.quantidade * pr.quantidadeBotao) AS qtdBotao, (i.quantidade * pr.quantidadeRibite) AS qtdRibite,
                 (i.quantidade * pr.quantidadePlaca) AS qtdPlaca
          FROM itens_pedido i
          LEFT JOIN pedido p ON p.idPedido = i.idPedido
          LEFT JOIN cliente c ON p.idCliente = c.idCliente
          LEFT JOIN produto pr ON pr.idProduto = i.idProduto
          WHERE i.iditens_pedido = $_GET[cod]";

  $resultado = mysqli_query($conexao, $sql);

  $relatorio = mysqli_fetch_array($resultado);

  if (!$resultado) {
    echo 'ERRO: ' . mysqli_error($conexao);
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if ($_GET) {
      echo $relatorio['modelo'];
      echo "_";
      echo $relatorio['qtdItensPedido'];
    }
    ?>
  </title>
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
  }

  h1 {
    text-align: center;
    margin-top: 5px;
  }

  h2 {
    text-align: center;
    font-weight: normal;
  }

  th {
    font-weight: bold;
    text-align: left;
  }
  </style>
</head>

<body class="body__impressao">
  <div class="impressao">
    <h1 class="imprimir__h1">
      <?php if ($_GET) {
        echo $relatorio['modelo'];
      }
      ?>
    </h1>
    <h2>
      <?php if ($_GET) {
        echo 'Quantidade: ', $relatorio['qtdItensPedido'];
      }
      ?>
    </h2>

    <div class="conteudo">
      <table>
        <tr>
          <h3>Cliente</h3>
        </tr>
        <tr>
          <th>
            Código do Cliente:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['idCliente'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Razão Social:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['nmCliente'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Nome:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['nome_fantasia'];
            }
            ?>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <br />
          <h3>Pedido</h3>
        </tr>
        <tr>
          <th>
            Código do Pedido:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['idPedido'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Data de Cadastro:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              $data_Cadastro = $relatorio['data_Cadastro'];
              $novaData_Cadastro = date("d/m/Y", strtotime($data_Cadastro));
              echo $novaData_Cadastro;
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Data de Entrega:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              $data_entrega = $relatorio['dataEntrega'];
              $novaData_Entrega = date("d/m/Y", strtotime($data_entrega));
              echo $novaData_Entrega;
            }
            ?>
          </td>
        </tr>
      </table>
      <table>
        <br />
        <tr>
          <h3>Produto</h3>
        </tr>
        <tr>
          <th>
            Código do Produto:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['idProduto'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Modelo:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['modelo'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Tipo de Tecido:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tipoTecido'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Tipo de Forro:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tipoForro'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <?php if ($relatorio['observacao'] != NULL) {
            echo "<th>";
            echo "Observação:&nbsp;";
            echo "</th>";
            echo "<td>";
            echo $relatorio['observacao'];
          }
          ?>
          </td>
        </tr>
        <tr>
          <?php if ($relatorio['descricaoBotao'] != NULL) {
            echo "<th>";
            echo "Descrição do Botão:&nbsp;";
            echo "</th>";
            echo "<td>";
            echo $relatorio['descricaoBotao'];
          }
          ?>
          </td>
        </tr>
        <tr>
          <?php if ($relatorio['descricaoRibite'] != NULL) {
            echo "<th>";
            echo "Descrição do Ribite:&nbsp;";
            echo "</th>";
            echo "<td>";
            echo $relatorio['descricaoRibite'];
          }
          ?>
          </td>
        </tr>
        <tr>
          <?php if ($relatorio['placa'] != NULL) {
            echo "<th>";
            echo "Descrição da Placa:&nbsp;";
            echo "</th>";
            echo "<td>";
            echo $relatorio['placa'];
          }
          ?>
          </td>
        </tr>
        <tr>
          <th>
            Quantidade de Botões:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['qtdBotao'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Quantidade de Ribites:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['qtdRibite'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Quantidade de Placas:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['qtdPlaca'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Tamanho:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tamanho'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Tamanho da Cintura:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tamanhoCintura'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Tamanho do Quadril:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tamanhoQuadril'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Tamanho do Gancho Traseiro:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tamanhoGanchoTraseiro'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Comprimento da Perna Lateral:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tamanhoComprimentoPernaLateral'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Comprimento da Perna Frontal:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tamanhoComprimentoFrentePerna'];
            }
            ?>
          </td>
        </tr>
        <tr>
          <th>
            Tamanho da Largura da Perna:&nbsp;
          </th>
          <td>
            <?php if ($_GET) {
              echo $relatorio['tamanhoLaguraPerna'];
            }
            ?>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>

</html>