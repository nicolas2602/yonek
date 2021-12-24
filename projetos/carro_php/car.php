<?php
include 'php/conexao.php';

if(isset($_POST['cad'])){
    $carro = $_POST['carro'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];

    $sqlCar = "insert into carro (nomeCarro, marcaCarro, anoCarro) values ('$carro','$marca','$ano')";
    mysqli_query($con, $sqlCar);
    header('location: car.php');

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Carros</title>
</head>
<body>
    <a href="consulta.php">Voltar</a>      
    </nav>
    <form method="post" align="center">
        <h1>Cadastro de Carros</h1>

        <label style="padding-right: 235px;">Nome: </label> <br> 
        <input type="text" name="carro" id="carro" size="38"><br>

        <label style="padding-right: 235px;">Marca: </label> <br> 
        <input type="text" name="marca" id="marca" size="38"><br>
        
        <label style="padding-right: 245px;">Ano: </label><br>
        <div style="padding-right: 200px;">
            <input type="number" placeholder="YYYY" min="1900" max="2100" name="ano" id="ano"><br><br>
        </div>

        <div style="padding-left: 5px;">
            <input type="submit" name="cad" value="Cadastrar" style="width: 21em;">
        </div>        

    </form>
    
    <br><hr><br>

       <form action="" align="center">
           <input type="search" Placeholder="Digite a caixa de pesquisa..." size="97" name="busca">
           <input type="submit" value="Pesquisar">
       </form><br>

    <table border="2" width="50%" align="center">
        <thead align="left"> 
            <th>ID</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Ano</th>
            <th></th>
            <th></th>

        </thead>
        <?php 
        if(!isset($_GET['busca'])){
        
        $sqlCar = "select * from carro";
        $queryCar = mysqli_query($con, $sqlCar);
        while($car = mysqli_fetch_array($queryCar)){

            $id=$car['IdCarro'];
            $nome=$car['nomeCarro'];
            $marca=$car['marcaCarro'];
            $ano=$car['anoCarro'];

        ?>
        <tbody>
            <tr>
                <td><?= $id ?></td>
                <td><?= $nome ?></td>
                <td><?= $marca ?></td>
                <td><?= $ano ?></td>
                <td>
                    <a href="atualizar_car.php?IdCarro=<?=$id;?>&nomeCarro=<?=$nome;?>&marcaCarro=<?=$marca;?>&anoCarro=<?=$ano;?>">
                      Editar
                    </a>
                </td>
                <td><a href="del_car.php?delCar=<?=$id;?>&<?=$nome;?>&<?=$marca;?>&<?=$ano;?>" onclick="return confirm('Deseja apagar o registro?')">Apagar</a></td>
            </tr>
        </tbody>
        <?php }?>
        <?php  
        
        }else{
           $pesq = $_GET['busca'];
           $sql = "select * from carro where nomeCarro LIKE '%$pesq%' 
                  or marcaCarro LIKE '%$pesq%'
                  or anoCarro LIKE '%$pesq%'";
            $query = mysqli_query($con, $sql);

            if(mysqli_num_rows($query) == 0){
        
        ?>
        <tr>
            <td colspan="5" align="center">Nenhum resultado encontrado...</td>
        </tr>
        <?php 
        }else{ 
            while($carPesq = mysqli_fetch_array($query)){

                $id = $carPesq['IdCarro'];
                $carro = $carPesq['nomeCarro'];
                $marca = $carPesq['marcaCarro'];
                $ano = $carPesq['anoCarro']; 
        ?>
        <tr>
            <td><?=$id?></td>
            <td><?=$carro?></td>
            <td><?=$marca?></td>
            <td><?=$ano?></td>
            <td>
                <a href="atualizar_car.php?IdCarro=<?=$id;?>&nomeCarro=<?=$nome;?>&marcaCarro=<?=$marca;?>&anoCarro=<?=$ano;?>">
                    Editar
                </a>
            </td>
            <td><a href="del_car.php?delCar=<?=$id;?>&<?=$nome;?>&<?=$marca;?>&<?=$ano;?>" onclick="return confirm('Deseja apagar o registro?')">Apagar</a></td>
            
        </tr>
        <?php 
            }
        }
        }
        ?>
    </table>
    
</body>
</html>