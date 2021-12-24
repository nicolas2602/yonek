<?php 
    session_start();
    include 'php/conexao.php';
    if(isset($_POST['log'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sqlLog = "select * from pessoa where email='$email' and senha='$senha'";
        $queryLog = mysqli_query($con, $sqlLog);

        if(mysqli_num_rows($queryLog) > 0){
            header('refresh:3;');
            $_SESSION['msg'] = "<span style='color: green'>E-mail e Senha corretos!</span>";          
        }else{
            header('refresh:3;');
            $_SESSION['msg'] = "<span style='color: red'>E-mail ou Senha incorreto!</span>";          
        } 
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="post">
        <input type="email" name="email" id="email" placeholder="E-mail" required><br><br>
        <input type="password" name="senha" id="senha" placeholder="Senha" required><br>
        
        <?php       
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        
        <br>

        <input type="submit" name="log" id="entrar" value="Entrar"><br>
        <a href="cadastro.php">Cadastrar</a>
    </form> 
</body>
</html>