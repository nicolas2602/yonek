<?php 

include 'php/conexao.php';
$del = "delete from pessoa where id='".$_GET['del']."'";
mysqli_query($con, $del);
header('location:  consulta.php');

?>