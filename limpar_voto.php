<?php 
  include 'php/conexao.php';

  $sql = "truncate table voto";
  mysqli_query($con, $sql);
  header('location: voto.php');


?>