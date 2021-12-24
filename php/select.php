<?php 
include 'conexao.php';

if(isset($_POST['log'])){
      $email=$_POST['email'];
      $senha=$_POST['senha'];
      
     $querySelct = "select * from pessoa where email='$email' and senha='$senha'"; 
      $query = mysqli_query($con, $querySelct); //campo 

      if(mysqli_num_rows($query) > 0){
        $f = mysqli_fetch_assoc($query);
        $_SESSION['id'] = $f['id'];
        header('location: consulta.php');
      }
      else{
        header('refresh:5;');
         $_SESSION['msg'] = 
         "<div class='alert alert-danger' style='width: 20rem;' role='alert'>
            E-mail ou Senha Incorretos!
          </div>";
      }
    }

?>