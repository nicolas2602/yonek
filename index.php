<?php 
session_start();
include 'php/conexao.php'; 
include 'php/select.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'include/link.php'; ?>
    <link rel="stylesheet" href="css/login.css">
    <title>Login PHP</title>
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle" align="center" id="login">
        
        <?php 
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="post">
            <div class="container" >
                <div class="card bg-dark" style="width: 20rem; height: 22rem">
                    <div class="card-body" id="cbody">    
                        <h4>Login</h4>                        
                        <div class="col-10">
                            <label style="padding-right: 189px;">E-mail:</label> <br>
                            <input type="email" name="email" class="form-control" placeholder="E-mail"><br>
                        </div>

                        <div class="col-10">
                            <label style="padding-right: 199px;">Senha:</label> <br> 
                            <input type="password" name="senha" class="form-control" placeholder="Senha"><br>  
                        </div>

                        <div class="d-grid gap-1 col-10 mx-auto">
                            <input type="submit" name="log" class="btn btn-primary" value="Entrar">
                        </div>
                    
                        <div class="d-grid gap-1 col-10 mx-auto" style="padding-top: 10px;">
                            <a href="cadastro.php" class="btn btn-success">Cadastrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    

    <?php include 'include/script.php'; ?>

</body>
</html>