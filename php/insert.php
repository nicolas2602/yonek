<?php 

include 'conexao.php';

if(isset($_POST['sub'])){
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $csenha = $_POST['rsenha'];
  
    if($senha == $csenha){        
      $senhacript = password_hash($senha, PASSWORD_DEFAULT);

        $query = "insert into pessoa (nome, email, senha) values ('$nome', '$email', '$senhacript')";
        mysqli_query($con, $query);

        header('location: consulta.php');

    }
    else{
        echo"Senha não identificadas </br>";
        echo"<a href='cadastro.php'>Voltar</a>";
    }
   
}

?>