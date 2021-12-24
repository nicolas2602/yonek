<?php
    include 'php/conexao.php';
    include 'php/insert_car.php';
    include 'php/up_car.php';

    $pag = (isset($_GET['pag']))?$_GET['pag'] : 1; // ponto da página ou número da página (obs.: ao clicar na url, aparecerá o número da página)
    $sql = "select * from carro";
    $query = mysqli_query($con, $sql);

    $reg = 10; // qtd de registros
    
    $tr = mysqli_num_rows($query); // n° de linhas

    $tp = ceil($tr/$reg); // contabilizar o n° de registros com o n° de linhas por páginas

    $inicio = ($reg * $pag) - $reg; // calcular o início da visualização, a partir do registro que está sendo buscado
    $limit = mysqli_query($con, "$sql LIMIT $inicio, $reg");
   
    $ant = $pag - 1; // voltar na página
    $prox = $pag + 1; // avançar na página

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include 'include/link.php'; ?>
     <link rel="stylesheet" href="css/estilo.css">
    <title>Sistema de Carros</title>
</head>
<body>
    <?php include 'include/nav.php'; ?>  <br>
    <table class="table table-dark table-striped table-bordered table-hover table-sm w-75 p-3 border border-secondary border-3" align="center">

        <thead>
            <th colspan="6">
                <h1 align="center">Sistema de Carro</h1> 
            </th>
        </thead>
        
        <thead>
            <th colspan="6">            
                <div class="d-flex justify-content-between">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_car">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                            </svg>
                        </button>  
                    </div>
                    <div class="col-md-3">
                        <form action="">
                            <div class="input-group"> 
                                <input type="text" type="search" class="form-control" name="busca" placeholder="Digite a busca">
                                <button type="submit" class="btn btn-secondary" name="pesquisa">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>                      
                </div>                
            </th>
        </thead>

        <thead class="text-center"> 
            <th style="width: 5%;">ID</th>
            <th style="width: 15%;">Nome</th>
            <th style="width: 15%;">Marca</th>
            <th style="width: 10%;">Ano</th>         
            <th style="width: 8.3%;">Ação</th>
        </thead>

        <?php 
        if(!isset($_GET['busca'])){       
        while($car = mysqli_fetch_array($limit)){

            $id=$car['IdCarro'];
            $carro=$car['nomeCarro'];
            $marca=$car['marcaCarro'];
            $ano=$car['anoCarro'];

        ?>

        <tbody class="text-center">
            <tr>
                <td><?=$id?></td>
                <td><?=$carro?></td>
                <td><?=$marca?></td>
                <td><?=$ano?></td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#modal_carEdit" data-bs-whatever="<?=$id;?>" data-bs-whatevercar="<?=$carro;?>" 
                        data-bs-whatevermarca="<?=$marca;?>" data-bs-whateverano="<?=$ano;?>" class="btn btn-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </button>
                    <a href="del_car.php?delCar=<?=$id;?>&<?=$carro;?>&<?=$marca;?>&<?=$ano;?>" onclick="return confirm('Deseja apagar o registro?')"
                       class="btn btn-danger btn-sm">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        </tbody>

        <?php }?>
        <?php  
        
        }else{
           $pesq = $_GET['busca'];
           $sql = "select * from carro where nomeCarro LIKE '%$pesq%' 
                  or marcaCarro LIKE '%$pesq%'
                  or anoCarro LIKE '%$pesq%'";
            $query = mysqli_query($con, $sql);

            if(mysqli_num_rows($query) == 0){
        
        ?>
        <tr>
            <td colspan="5" align="center">Nenhum resultado encontrado...</td>
        </tr>
        <?php 
        }else{ 
            while($carPesq = mysqli_fetch_array($query)){

                $id = $carPesq['IdCarro'];
                $carro = $carPesq['nomeCarro'];
                $marca = $carPesq['marcaCarro'];
                $ano = $carPesq['anoCarro']; 
        ?>
        <tbody class="text-center">
            <tr>
                <td><?=$id?></td>
                <td><?=$carro?></td>
                <td><?=$marca?></td>
                <td><?=$ano?></td>
                <td>
                <button data-bs-toggle="modal" data-bs-target="#modal_carEdit" data-bs-whatever="<?=$id;?>" data-bs-whatevercar="<?=$carro;?>" 
                    data-bs-whatevermarca="<?=$marca;?>" data-bs-whateverano="<?=$ano;?>" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button>
                    <a href="del_car.php?delCar=<?=$id;?>&<?=$carro;?>&<?=$marca;?>&<?=$ano;?>" onclick="return confirm('Deseja apagar o registro?')"
                       class="btn btn-danger btn-sm">
                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        </tbody>
        <?php 
            }
        }
        }
        ?>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php 
               if($pag > 1){

            ?>
            <li class="page-item">
                <a class="page-link bg-dark" href="?pag=<?=$ant;?>" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php } ?>
            
            <?php 
                for($i=1; $i<=$tp; $i++){
                    if($pag == $i){
                        echo" <li class='page-item active'><a class='page-link' href='?pag=$i'>$i</a></li>"; // Marcação de página 
                    }else{
                        echo" <li class='page-item'><a class='page-link bg-dark' href='?pag=$i'>$i</a></li>";
                    }
                }
            ?>
            
            <?php 
            if($pag < $tp){

            ?>
            <li class="page-item">
                <a class="page-link bg-dark" href="?pag=<?=$prox;?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

            <?php } ?>

        </ul>
    </nav>

    <?php include 'include/modal_car.php'; ?>
    <?php include 'include/modal_car_edit.php'; ?>
    <script type="text/javascript">
        var modal_car = document.getElementById('modal_carEdit')
            modal_car.addEventListener('show.bs.modal', function (event) {               
            var button = event.relatedTarget

            var recipient = button.getAttribute('data-bs-whatever')
            var carro = button.getAttribute('data-bs-whatevercar')
            var marca = button.getAttribute('data-bs-whatevermarca')
            var ano = button.getAttribute('data-bs-whateverano')

            var modalTitle = modal_car.querySelector('.modal-title')
            var idInput = modal_car.querySelector('#id')
            var carroInput = modal_car.querySelector('#carro')
            var marcaInput = modal_car.querySelector('#marca')
            var anoInput = modal_car.querySelector('#ano')

            modalTitle.textContent = 'ID do Carro: ' + recipient
            idInput.value = recipient
            carroInput.value = carro
            marcaInput.value = marca
            anoInput.value = ano
        })
    </script>

    <?php include 'include/footer.php'; ?>
    <?php include 'include/script.php'; ?>

</body>
</html>