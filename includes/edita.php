<?
  require_once 'layout/cabecalho.html';

  require_once 'database/banco.php';

  require_once 'layout/mensagem.php';

  // adicionando conexao a variavel com os dados do banco
  $conn = mysqli_connect($servername, $username, $password, $database);


?>

 <div class="container col-8">
    <form class="" action="includes/editar.php" method="post">
        <div class="row">
          <div class="input-field col s12">
             <input type="hidden" name="id" pattern="^[( )a-zA-Z]+$" value="<?php echo $dados['id']; ?>">
            <input id="nome" type="text" class="validate" name="nome" value="<?php echo $dados['nome']; ?>">
            <label for="nome">Nome do produto</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12" value="<?php echo $dados['descricao']; ?>">
            <textarea id="textarea1" name="descricao" class="materialize-textarea"></textarea>
            <label for="textarea1">Descrição</label>
          </div>
        </div>
        <div class="file-field input-field">
            <div class="btn">
              <span>Imagem</span>
              <input class="purple lighten-2" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" name="imagem" type="text" value="<?php echo $dados['imagem']; ?>">
            </div>
        </div>
        <button type="submit" class="btn purple lighten-2 rigth" name="atualizaar">Atualizar</button>
    </form>
  </div>


<?php
require_once 'layout/rodape.html';
?>
