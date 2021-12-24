<?php 

    include 'php/conexao.php';
    include 'php/update.php';

    
    $pag = (isset($_GET['pag']))?$_GET['pag'] : 1; // ponto da página ou número da página (obs.: ao clicar na url, aparecerá o número da página)
    $sql = "select * from pessoa";
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
    <title>Paginação PHP</title>
</head>

<body>
    
    <?php include 'include/nav.php'; ?>

    <br>
    
    <table class="table table-dark table-striped table-bordered table-hover table-sm w-75 p-3 border border-secondary border-3" align="center">
        
        <thead>
            <th colspan="5">
                <h1 align="center">Paginação</h1> 
            </th>
        </thead>

        <thead class="text-center">
            <th style="width: 5%;">Nome</th>
            <th style="width: 5%;">E-mail</th>
            <th style="width: 5%;">Ação</th>
        </thead>

        <?php 
          while($pessoa = mysqli_fetch_assoc($limit)){
        ?>

        <tr class="text-center">
            <td><?php echo $pessoa['nome'] ?></td>
            <td><?php echo $pessoa['email'] ?></td>
            <td>            
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal_edit"
                    data-bs-whatever="<?php echo $pessoa['id'] ?>" data-bs-whatevernome="<?php echo $pessoa['nome'] ?>"
                    data-bs-whateveremail="<?php echo $pessoa['email'] ?>" data-bs-whateversenha="<?php echo $pessoa['senha'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </button> 

                <a href="delete.php?del=<?php echo $pessoa['id'] ?>&<?php echo $pessoa['nome'] ?>&
                    <?php echo $pessoa['email'] ?>&<?php echo $pessoa['senha'] ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Deseja excluir a pessoa?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                </a>
            </td>
        </tr>    
        <?php } ?>
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

    <?php include 'include/modal_edit.php'; ?>

    <script type="text/javascript">
        var modal_edit = document.getElementById('modal_edit')
            modal_edit.addEventListener('show.bs.modal', function (event) {               
            var button = event.relatedTarget

            var recipient = button.getAttribute('data-bs-whatever')
            var nome = button.getAttribute('data-bs-whatevernome')
            var email = button.getAttribute('data-bs-whateveremail')
            var senha = button.getAttribute('data-bs-whateversenha')

            var modalTitle = modal_edit.querySelector('.modal-title')
            var idInput = modal_edit.querySelector('#id')
            var nomeInput = modal_edit.querySelector('#nome')
            var emailInput = modal_edit.querySelector('#email')
            var senhaInput = modal_edit.querySelector('#senha')

            modalTitle.textContent = 'ID do Usuário: ' + recipient
            idInput.value = recipient
            nomeInput.value = nome
            emailInput.value = email
            senhaInput.value = senha
        })
    </script>

    <?php include 'include/footer.php'; ?>
    <?php include 'include/script.php'; ?>

</body>
</html>