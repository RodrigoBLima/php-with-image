<?php
//iniciando sessão
session_start();

require_once  '../layout/mensagem.php';

//fazendo requisicao do banco de dados
@require_once '../database/banco.php';

      // adicionando conexao a variavel com os dados do banco
      $conn = mysqli_connect($servername, $username, $password, $database);

      //adicionando o que vem do post nas variaveis
      $nome = $_POST['nome'] =  preg_replace('/[^[:alpha:]_]/', '',$_POST['nome']);
      $descricao = $_POST['descricao'];
      $imagem  = $_POST['imagem'];
      $id = $_POST['id'];


      $query = "DELETE FROM `produtos`  WHERE id = '$id' ";

      //se deu tudo certo? exibir uma mensagem de ok
      if (mysqli_query($conn, $query)) {

          header('Location: ../index.php');
          $_SESSION['mensagem'] = "Produto excluido com sucesso " ;
      } else {
        //se não deu certo exibir mensagem de erro
          echo  "<script>alert('Erro!);</script>". $query . "<br>" . mysqli_error($conn);
          //header('Location: ../index.php');

      }
