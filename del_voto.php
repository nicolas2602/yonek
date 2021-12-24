<?php 
 include 'php/conexao.php';

 $sql = "delete from voto where IdVoto = '".$_GET['delV']."'";
 mysqli_query($con, $sql);
 header('location: voto.php');

?>