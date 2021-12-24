<?php 
session_start();
include 'php/conexao.php';

if(isset($_GET['cand'])){

    // $sqlV = "select * from voto";
    // $queryV = mysqli_query($con, $sqlV);

    // if(isset($queryV) > 3){
    //     $_SESSION['msg'] = "<script>alert('Você já votou!')</script>";
    //     header('location: voto.php');
    // }else{
         
        // $sql_cand = "update voto set nVotos = nVotos + 1 < 3 where IdVoto = '".$_GET['cand']."'";
        $sql_cand = "update voto set nVotos = nVotos + 1 where IdVoto = '".$_GET['cand']."'";
        $conc_query = mysqli_query($con, $sql_cand);

        if(mysqli_affected_rows($con)){
            $_SESSION['msg'] = "<script>alert('Voto concluído!')</script>";
            header('location: voto.php');
        }elseif($conc_query > 3){
            $_SESSION['msg'] = "<script>alert('Você já votou!')</script>";
            header('location: voto.php');
        }else{
            $_SESSION['msg'] = "<script>alert('Erro no voto!')</script>";
            header('location: voto.php');
        }      

    //  }
}


?>