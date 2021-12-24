<?php
include 'conexao.php';

if(isset($_POST['cad'])){
    $carro = $_POST['carro'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];

    $sqlCar = "insert into carro (nomeCarro, marcaCarro, anoCarro) values ('$carro','$marca','$ano')";
    mysqli_query($con, $sqlCar);
    header('location: car.php');

}

?>