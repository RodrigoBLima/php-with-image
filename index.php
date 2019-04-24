<?
  require_once 'layout/cabecalho.html';

  require_once 'database/banco.php';

  require_once 'layout/mensagem.php';



?>

    <form class="" action="includes/cadastro.php" method="post">
        <div class="row">
          <div class="input-field col s12">
            <input id="nome" type="text" class="validate" name="nome">
            <label for="nome">Nome do produto</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea1" name="descricao" class="materialize-textarea"></textarea>
            <label for="textarea1">Descrição</label>
          </div>
        </div>
        <div class="file-field input-field">
            <div class="btn">
              <span>Imagem</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" name="imagem" type="text">
            </div>
        </div>
        <button type="submit" class="purple lighten-2" name="button">Cadastrar</button>
    </form>

<?php
require_once 'layout/rodape.html';
?>
