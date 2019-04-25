<?
  require_once 'layout/cabecalho.html';

  require_once 'database/banco.php';

  require_once 'layout/mensagem.php';

  // adicionando conexao a variavel com os dados do banco
  $conn = mysqli_connect($servername, $username, $password, $database);
  if(isset($_GET['id'])):
    $id = $_GET['id'];
    $recebe = "SELECT * FROM produtos WHERE id = '$id'";
    $resultado = mysqli_query($conn, $recebe);
    $dados = mysqli_fetch_array($resultado);
  endif;

?>


        <!-- tabela para listar todos os produtos cadastrados -->
        <div class="container">

            <h5 class="center-align">Lista de produtos cadastrados</h5>
               <div class="col s12 m6 push-m3">
                   <table class="striped">
                       <thead>
                           <tr>
                               <th>Nome</th>
                               <th>Descrição</th>
                               <th>Imagens</th>
                               <input type="hidden" name="id"  value="<?php echo $dados['id']; ?>">

                               <th>Editar</th>
                                <th>Excluir</th>
                           </tr>
                       </thead>

                       <tbody>
                       <?php
                           // adicionando conexao a variavel com os dados do banco
                           $conn = mysqli_connect($servername, $username, $password, $database);
                           $query = "SELECT * FROM produtos";
                           $resultado = mysqli_query($conn, $query);
                           if(mysqli_num_rows($resultado)>0):
                           while($dados = mysqli_fetch_array($resultado)):
                        ?>

                           <tr>
                               <td><?php echo $dados['nome']; ?></td>
                               <td><?php echo $dados['descricao']; ?></td>
                               <td id="imagem"><img src="img/<?php echo $dadps['imagem']; ?>" alt=""></td>

                               <td><a href="edita.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></td>
                               <td><a href="includes/excluir.php?id=<?php echo $dados['id']; ?>" class="btn-floating red"><i class="material-icons">delete</i></td>


                           </tr>
                           <?php
                               endwhile;
                               else:
                           ?>
                            <tr>
                               <td>-</td>
                               <td>-</td>
                               <td>-</td>
                               <td>-</td>

                           </tr>
                           <?php
                                endif;
                            ?>
                       </tbody>
                   </table>
               </div>
</div>








<?php
require_once 'layout/rodape.html';
?>
