<?php 
   include 'php/conexao.php'; 
   include 'php/up_car.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <form method="post" align="center">
        <h1>Atualização de Carros</h1>
        
        <h2 style="color: blue;">ID do Carro: <?php echo $cars['IdCarro'] ?></h2> 
        <input type="hidden" name="id" value="<?php echo $cars['IdCarro'] ?>">

        <label style="padding-right: 235px;">Nome: </label> <br> 
        <input type="text" name="carro" id="carro" size="38" value="<?php echo $cars['nomeCarro'] ?>"><br>

        <label style="padding-right: 235px;">Marca: </label> <br> 
        <input type="text" name="marca" id="marca" size="38" value="<?php echo $cars['marcaCarro'] ?>"><br>
        
        <label style="padding-right: 245px;">Ano: </label><br>
        <div style="padding-right: 200px;">
            <input type="number" placeholder="YYYY" min="1900" max="2100" name="ano" id="ano" value="<?php echo $cars['anoCarro'] ?>"><br><br>
        </div>

        <div style="padding-left: 5px;">
            <input type="submit" name="up" value="Atualizar" style="width: 21em;"><br><br>
            <a href="car.php">Voltar</a>
        </div>        

    </form>

</body>
</html>