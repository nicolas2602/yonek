<?php 

include 'conexao.php';

if(isset($_POST['upV'])){
    $idv = $_POST['id'];
    $cand = $_POST['cand'];

    $sqlV = "update voto set candidato = '$cand' where IdVoto = {$idv}";
    mysqli_query($con, $sqlV);
    header('location: voto.php');

}

?>