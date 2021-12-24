<?php 
    include 'conexao.php';

    $sqlPr = "select * from pessoa where id = '$_SESSION[id]'";
    $quPR = mysqli_query($con, $sqlPr);
    $prf = mysqli_fetch_assoc($quPR);
?>