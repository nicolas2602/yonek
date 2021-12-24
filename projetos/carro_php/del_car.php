<?php 

include 'php/conexao.php';
$delCar = "delete from carro where IdCarro='".$_GET['delCar']."'";
mysqli_query($con, $delCar);
header('location:car.php');

?>