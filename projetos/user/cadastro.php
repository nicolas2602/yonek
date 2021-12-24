<?php 
    session_start();
    include 'php/conexao.php';

    if(isset($_POST['cad'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $rsenha = $_POST['rsenha'];
        
        if($senha == $rsenha){       
            $sqlcad = "insert into pessoa(nome, email, senha) values('$nome','$email','$senha')";
            $queryCad = mysqli_query($con, $sqlcad);
        
        if($queryCad){
            $_SESSION['msgC'] = "<b>Nome:</b> " .$nome."<br>";
            $_SESSION['msgC2'] = "<b>E-mail:</b> ".$email."<br>";
            $_SESSION['msgC3'] = "<b>Senha:</b> ".$senha;
            header('refresh:0;');
        }

        }else{
            $_SESSION['msg'] = "<span style='color: red'>Senhas não correspondem!</span>";
        }
       
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <a href="login.php">Voltar</a>
 
    <h1>Cadastro</h1>
    <form method="post">

        <?php 
          if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          }
        ?>
        <br>
        <input type="text" name="nome" placeholder="Nome" required><br><br>
        <input type="email" name="email" placeholder="E-mail" required><br><br>
        <input type="password" name="senha" placeholder="Senha" required><br><br>
        <input type="password" name="rsenha" placeholder="Repetir Senha" required><br><br>
        <input type="submit" name="cad" value="Cadastrar">
    </form>
     <br>

    <?php 
        if(isset($_SESSION['msgC'])){
            echo $_SESSION['msgC'];
            unset($_SESSION['msgC']);
        }
        if(isset($_SESSION['msgC2'])){
            echo $_SESSION['msgC2'];
            unset($_SESSION['msgC2']);
        }
        if(isset($_SESSION['msgC3'])){
            echo $_SESSION['msgC3'];
            unset($_SESSION['msgC3']);
        }
        
    ?>
</body>
</html>