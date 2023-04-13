<?php 
session_start();
  include 'php/conexao.php';
  include 'php/select2.php';

  if(isset($_POST['add'])){
      $voto = $_POST['voto'];
      
      $sq = "select * from voto";
      $qu = mysqli_query($con, $sq);

      if(mysqli_num_rows($qu) < 4){
            $ivoto = "insert into voto (candidato) values('$voto')";
            mysqli_query($con, $ivoto);
            

            if($ivoto == 1){
                header('location: voto.php'); 
            }else{
                $_SESSION['msg'] = "<script>alert('O voto é até 1!');</script>";
            }

       }else{
            $_SESSION['msg'] = "<script>alert('O limite de candidatos até 4!');</script>";
       }
    }
  
  include 'php/up_voto.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'include/link.php'; ?>
     <link rel="stylesheet" href="css/estilo.css">
    <title>Votação</title>
</head>

<body>

    <?php include 'include/nav.php'; ?>
    <?php
        if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
        }
    ?>
 
        <br>
    <table class="table table-dark table-bordered table-hover table-sm w-75 p-3 border border-secondary border-3" align="center">
        <thead class="text-center">
            <tr>
                <th colspan="5"><h1>Votação</h1></th>
            </tr>

            <tr class="text-nowrap">
                <th colspan="5">                   
                    <div class="d-flex justify-content-between">
                        <div class="col-md-1">
                            <a href="reset_voto.php" class="btn btn-outline-warning btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                </svg> 
                                Reiniar N° votos
                            </a>

                            <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#modal_chart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                                Visualizar Resultados
                            </button>
                        </div>          
                        <div class="col-sm-4">
                            <form method="post" align="center">
                                <div class="input-group input-group-sm">
                                    <input class="form-control" type="text" name="voto" placeholder="Digite o nome do candidato" required>
                                    <button type="submit" class="btn btn-outline-success" name="add">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    Adicionar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>                   
                </th>
            </tr>

            <tr>
                <th style="width: 7%;">ID</th>
                <th style="width: 20%;">Candidato</th>
                <th style="width: 8.3%;">N° Votos</th>
                <th style="width: 7.8%;">Voto</th>
                <th style="width: 10%;">Ação</th>
            </tr>
        </thead>
        <?php 
        
        $sql = "select * from voto LIMIT 4";
        $qvoto = mysqli_query($con, $sql);
        $res = 1;
        while($voto = mysqli_fetch_array($qvoto)){
            $idvoto = $voto['IdVoto'];
            $cand = $voto['candidato'];
            $num = $voto['nVotos'];
        ?>
        <tbody class="text-center">
            <tr>
                <td><?=$idvoto?></td>
                <td><?=$cand?></td>
                <td><?=$num?></td>
                <td>
                    <a href="votar_cand.php?cand=<?=$idvoto?>" class="btn btn-info btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-fill" viewBox="0 0 16 16">
                            <path d="M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002z"/>
                        </svg>
                        Votar
                    </a>
                </td>
                <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_votoEdit" data-bs-whatever="<?=$idvoto;?>" data-bs-whatevercand="<?=$cand;?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                    <a href="del_voto.php?delV=<?=$idvoto?>&<?=$cand?>&<?=$num?>" class="btn btn-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        </tbody>
        <?php 
           } 
        ?>
        <tbody>          
            <tr>
                <td colspan="5"> 
                    <div class="d-flex justify-content-between">
                        <div class="col-md-5">                        
                            <a href="limpar_voto.php" class="btn btn-outline-danger btn-sm" onclick="return confirm('Deseja apagar os votos?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                                Limpar
                            </a>
                        </div>                       
                    </div>
                </td>
            </tr>    
        </tbody>
    </table>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
            ['Candidato', 'N° de Votos'],
                <?php 
                    $sql="select * from voto";
                    $query = mysqli_query($con, $sql);
                    while($vot = mysqli_fetch_array($query)){

                        $cand = $vot['candidato'];
                        $num = $vot['nVotos'];
                    
                        echo"['$cand', $num],";
                    }                          
                ?>
            ]);

            var options = {
            title: 'Gráfico de Votos',
            titleTextStyle: { color: '#FFF' },
            backgroundColor: '#1F2222',
            legendTextStyle: { color: '#FFF' },
            width: '465',
            heigth: '800',
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
            
            $(window).resize(function(){
                drawChart();
            });
        
    </script>
    <?php include 'include/modal_chart.php'; ?>

    <?php include 'include/modal_voto_edit.php'; ?>
    <script type="text/javascript">
        var modal_voto = document.getElementById('modal_votoEdit')
            modal_voto.addEventListener('show.bs.modal', function (event) {               
            var button = event.relatedTarget

            var id = button.getAttribute('data-bs-whatever')
            var cand = button.getAttribute('data-bs-whatevercand')
            

            var modalTitle = modal_voto.querySelector('.modal-title')
            var idInput = modal_voto.querySelector('#id')
            var candInput = modal_voto.querySelector('#cand')

            modalTitle.textContent = 'N° do Candidato: ' + id
            idInput.value = id
            candInput.value = cand

        })
    </script>

    <?php include 'include/footer.php'; ?>
    <?php include 'include/script.php'; ?>
</body>
</html>




              