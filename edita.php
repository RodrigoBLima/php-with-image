<?
  require_once 'layout/cabecalho.html';

  require_once 'database/banco.php';

  require_once 'layout/mensagem.php';

  // adicionando conexao a variavel com os dados do banco
  $conn = mysqli_connect($servername, $username, $password, $database);

  //verificando se realmente existe um id para ser editado
if(isset($_GET['id'])):
    $id = $_GET['id'];
    $recebe = "SELECT * FROM produtos WHERE id = '$id'";
    $resultado = mysqli_query($conn, $recebe);
    $dados = mysqli_fetch_array($resultado);
endif;

?>

 <div class="container col-8">
    <form class="" action="includes/editar.php" method="post">
        <div class="row">
          <div class="input-field col s12">
             <input type="hidden" name="id"  value="<?php echo $dados['id']; ?>">
            <input id="nome" type="text" pattern="^[( )a-zA-Z]+$" class="validate" name="nome" value="<?php echo $dados['nome']; ?>">
            <label for="nome">Nome do produto</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12" >
            <textarea id="textarea1" name="descricao" value="<?php echo $dados['descricao']; ?>" class="materialize-textarea"></textarea>
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
