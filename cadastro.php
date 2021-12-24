<?php 

    include 'php/conexao.php'; 
    include 'php/insert.php'


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'include/link.php'; ?>
    <link rel="stylesheet" href="css/login.css">
    <title>Cadastro PHP</title>
</head>

<style>
.formulario{
    padding-top: 100px;
}

</style>

<body>
    
    <div class="formulario" align="center">
        <form method="post">
            <div class="container">
                <div class="card bg-dark" style="width: 20rem; height: 32rem">
                    <div class="card-body" id="cbody"> 
                        <h4>Cadastro</h4>
                        <div class="col-10">
                            <label style="padding-right: 199px;">Nome:</label><br>
                            <input type="text" name="name" class="form-control" placeholder="Digite o seu nome" required><br>
                        </div>
                        <div class="col-10">
                            <label style="padding-right: 189px;">E-mail:</label><br>
                            <input type="email" name="email" class="form-control" placeholder="Digite o seu e-mail" required><br>
                        </div>
                        <div class="col-10">
                            <label style="padding-right: 199px;">Senha:</label><br>
                            <input type="password" name="senha" class="form-control" placeholder="Digite a senha" required><br>
                        </div>
                        <div class="col-10">
                            <div style="padding-right: 135px;">
                                <label> Repetir senha:</label><br>
                            </div>
                            <input type="password" name="rsenha" class="form-control" placeholder="Digite a senha novamente" required><br>
                        </div>
                        
                        <div class="d-grid gap-1 col-10 mx-auto">
                            <input type="submit" name="sub" class="btn btn-success" value="Cadastrar">
                        </div>

                        <div class="d-grid gap-1 col-10 mx-auto" style="padding-top: 10px;">
                            <a href="index.php" class="btn btn-secondary">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>          
        </form>     
    </div>
    
    <?php include 'include/script.php'; ?>
</body>
</html>