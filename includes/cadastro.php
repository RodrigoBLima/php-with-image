<?php
//iniciando sessão
session_start();

require_once  '../layout/mensagem.php';


//fazendo requisicao do banco de dados
@require_once '../database/banco.php';

// adicionando conexao a variavel com os dados do banco
$conn = mysqli_connect($servername, $username, $password, $database);


if (isset($_POST['cadastrar'])) {

      //validacao simples
        if ( empty($_POST['nome']) ||  empty($_POST['descricao']) ||  empty($_POST['imagem']) ) {

          header('Location: ../index.php');

            $_SESSION['mensagem'] = "Preencha todos os campos " ;

           }
           else{
             //adicionando o que vem do post nas variaveis
             $nome = $_POST['nome'] =  preg_replace('/[^[:alpha:]_]/', '',$_POST['nome']);
             $descricao = $_POST['descricao'];
             $imagem  = $_POST['imagem'];


              //trabalhando na imagem
              $extensao = strtolower(substr($_FILES['arquivo']['nome'], -4));
              $nomefoto = $nome.$descricao.$extensao;
              $diretorio = "img/";
              move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nomefoto);


              //inserindo dados no banco
              $query = "INSERT INTO `produtos` (`nome`, `descricao`, `imagem`) VALUES ('$nome', '$descricao', '$imagem')";

              //se deu tudo certo? exibir uma mensagem de ok
              if (mysqli_query($conn, $query)) {

                  header('Location: ../index.php');
                  $_SESSION['mensagem'] = "Produto cadastrado com sucesso " ;
              } else {
                //se não deu certo exibir mensagem de erro
                  echo  "<script>alert('Erro!);</script>". $query . "<br>" . mysqli_error($conn);
                  //header('Location: ../index.php');

              }
           }

}
