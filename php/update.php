<?php 
include 'conexao.php';

if(isset($_POST['up'])){
    $id = $_POST['id'];
    $nome = $_POST['name'];
    $email = $_POST['emailUp'];
    $senha = $_POST['senhaUp'];

    $sql = "update pessoa set nome='$nome', email='$email', senha='$senha' where id={$id}";
    mysqli_query($con, $sql);
    header('location: consulta.php');
}
     
?>