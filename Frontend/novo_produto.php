<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adicionar Produto</title>
  <link rel="stylesheet" href="../CSS/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <main>
    <div class="background-image">
      <div class="background-image_gradient">

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="menu">
            <div class="item__logo"><a href="../index.php">TECHTEXT</a></div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-bag-shopping"></i>Produtos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_produto.php" class="sub-item">Novo Produto</a>
                <a href="listar_produto.php" class="sub-item">Lista de Produtos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-people-group"></i>Clientes<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_cliente.php" class="sub-item">Novo Cliente</a>
                <a href="listar_cliente.php" class="sub-item">Lista de Clientes</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-list"></i>Pedidos<i class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_pedido.php" class="sub-item">Novo Pedido</a>
                <a href="listar_pedido.php" class="sub-item">Lista de Pedidos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-address-book"></i>Contatos<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_contato.php" class="sub-item">Novo Contato</a>
                <a href="listar_contato.php" class="sub-item">Lista de Contatos</a>
              </div>
            </div>
            <div class="item">
              <a class="sub-btn"><i class="fa-solid fa-file-contract"></i>Relatórios<i
                  class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <a href="novo_relatorio.php" class="sub-item">Novo relatório</a>
                <a href="listar_relatorio.php" class="sub-item">Lista de Relatório</a>
              </div>
            </div>
          </div>
        </div>

        <div class="cadastro_produto">
          <h1 class="cadastro__h1">Cadastro de Produtos</h1>

          <!-- Cadastro de produtos -->
          <form method="post" action="../backend/gravar_Produto.php" class="cadastro__form_produto">

            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Modelo</label>
                <input type="text" name="modelo" placeholder="Modelo" id="modelo" required maxlength="200" />
              </div>
              <br><br>

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Tipo de Tecido</label>
                <input type="text" name="tipoTecido" placeholder="Tipo de Tecido" id="tipoTecido" required
                  maxlength="300" />
              </div>
            </div>

            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Tipo de Forro</label>
                <input type="text" name="tipoForro" placeholder="Tipo de Forro" id="tipoForro" required
                  maxlength="300" />
              </div>
              <br><br>

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Observação</label>
                <input type="text" name="obesrvacao" placeholder="Observação..." id="obesrvacao" />
              </div>
            </div>

            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Descrição do Botão</label>
                <input type="text" name="descricaoBotao" placeholder="Descrição do Botão.." id="descricaoBotao" />
              </div>
              <br><br>

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Descrição do Ribite</label>
                <input type="text" name="descricaoRibite" placeholder="Descrição do Ribite..." id="descricaoRibite" />
              </div>
            </div>

            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Descrição da Placa</label>
                <input type="text" name="placa" placeholder="Descrição da Placa..." id="placa" />
              </div>
              <br><br>

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Quantidade do Botão</label>
                <input type="number" name="quantidadeBotao" placeholder="Quantidade do Botão" id="quantidadeBotao" />
              </div>
            </div>


            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Quantidade do Ribite</label>
                <input type="number" name="quantidadeRibite" placeholder="Quantidade do Ribite" id="quantidadeRibite" />
              </div>
              <br><br>

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Quantidade da Placa</label>
                <input type="number" name="quantidadePlaca" placeholder="Quantidade do Placa" id="quantidadePlaca" />
              </div>
            </div>


            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Tamanho</label>
                <input type="number" name="tamanho" placeholder="Tamanho (cm)" id="tamanho" />
              </div>
              <br><br>

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Tamanho da Cintura</label>
                <input type="number" name="tamanhoCintura" placeholder="Tamanho da Cintura (cm)" id="tamanhoCintura" />
              </div>
            </div>

            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Tamanho do Quadril</label>
                <input type="number" name="tamanhoQuadril" placeholder="Tamanho do Quadril (cm)" id="tamanhoQuadril" />
              </div>
              <!-- <br><br> -->

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Tamanho do Grancho Traseiro</label>
                <input type="number" name="tamanhoGanchoTraseiro" placeholder="Tamanho do Gancho Traseiro (cm)"
                  id="tamanhoGanchoTraseiro" />
              </div>
            </div>

            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Comprimento da Perna Lateral</label>
                <input type="number" name="tamanhoComprimentoPernaLateral"
                  placeholder="Comprimento da Perna Lateral (cm)" id="tamanhoComprimentoPernaLateral" />
              </div>
              <!-- <br><br> -->

              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Comprimento Frente da Perna</label>
                <input type="number" name="tamanhoComprimentoFrentePerna" placeholder="Comprimento Frente da Perna (cm)"
                  id="tamanhoComprimentoFrentePerna" />
              </div>
            </div>


            <div class="row">
              <div class="input-cadastro_produto">
                <label class="cadastro__form_item_label">Tamanho da Largura da Perna</label>
                <input type="number" name="tamanhoLaguraPerna" placeholder="Tamanho da Largura da Perna (cm)"
                  id="tamanho_largura_pernatamanhoLaguraPerna" />
              </div>
            </div>

            <div class="cadastro__form_button_container">
              <button type="submit" name="submit_cliente" class="cadastro__form_button cadastro__form_button-submit">
                Cadastrar
              </button>
              <button type="reset" class="cadastro__form_button cadastro__form_button-reset">
                Cancelar
              </button>
            </div>
          </form>
        </div>

        <script type="text/javascript">
        $(document).ready(function() {
          //jquery para ativar sub-menus.
          $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
          });
        });
        </script>
      </div>
    </div>
  </main>
</body>

</html>