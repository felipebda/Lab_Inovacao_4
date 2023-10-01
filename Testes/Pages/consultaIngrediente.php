<?php
    include_once "../Connection/conexao.php";
    
    //Variaveis usuario
    $idIngrediente = 0;
    $descricao = "";

    //CASO MUDAR QUERY, ATUALIZAR TABELA HTML APROPRIADAMENTE
    $sql = "SELECT * FROM ingrediente where ativo = 1";
    $query= $pdo->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>My CookBook</title>
    <style>
        .color_red{
            color:red;
        }
        .configbutton{
            border:none;
            background-color:transparent;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <div class="container">
      <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book me-2" viewBox="0 0 16 16">
          <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
          <span class="fs-4">My CookBook</span>
        </a>

        <ul class="nav nav-pills">
          <li class="nav-item"><a href="../index1.php" class="nav-link active" aria-current="page">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        </ul>
      </header>
    </div>
    <!--END HEADER -->

    <div class= "container mt-3">
        <div class="row">
            <div class = col-2>
            <h3>Consulta - Ingrediente</h3>
            </div>
            <hr>
        </div>
    </div>

    <!--Table-->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id Ingrediente</th>
                <th scope="col">Nome do Ingrediente</th>
                <th scope="col">Descricao</th>
                <th scope="col"></th>
                <th scope="col"></th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['idIngrediente'].'</td>';
                        echo '<td>'.$row['nome'].'</td>';
                        echo '<td>'.$row['descricao'].'</td>';
                        
                        ?>
                            <!-- ACESSAR INGREDIENTE-->
                            <td scope="col">
                                <form action="atualizaIngrediente.php" method="POST">
                                <input type="hidden" name="atualizaCargo" value=<?php echo '"'.$row['idIngrediente'].'"'; ?>>
                                <button type="submit" class="configbutton"><span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search " viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg></span></button>

                                </form>

                            </td>


                            </td>

                            <!--EXCLUIR INGREDIENTE -->
                            <td scope="col">
                                <form action="inativarIngrediente.php" method="POST">
                                    <?php //echo $row['idCargo']; ?>
                                    <input type="hidden" name="excluirIngrediente" value=<?php echo '"'.$row['idIngrediente'].'"'; ?>>
                                    <button type="submit" class="configbutton"><span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-trash color_red" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                    </svg></span></button>                                   
                                </form>
                            </td>
                        <?php
                        echo '</tr>';
                    }

                ?>
            </tbody>
        </table>

    </div>
    <!--End Table --> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
</body>
</html>