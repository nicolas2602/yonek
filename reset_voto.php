<?php 
  include 'php/conexao.php';

  $sql = "update voto set nVotos=0";
  mysqli_query($con, $sql);
  header('location: voto.php');


?>