<?php 
    include 'php/conexao.php';

    if(isset($_POST['up'])){

        $id = $_POST['id'];
        $car = $_POST['carro'];
        $marc = $_POST['marca'];
        $ano = $_POST['ano'];

        $sqlCar = "update carro set nomeCarro='$car', marcaCarro='$marc', anoCarro='$ano' where IdCarro={$id}";
        mysqli_query($con, $sqlCar);
        header('location:car.php');
    }

?>