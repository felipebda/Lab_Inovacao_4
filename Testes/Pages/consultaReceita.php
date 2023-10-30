<?php
    //Abrir session
    session_start();
    $idFunc = intval($_SESSION['idFunc']);

    include_once "../Connection/conexao.php";
    require "../Classes/Receita.php";
    require "../Classes/ReceitaFuncoes.php";
    require "../Classes/CategoriaFuncoes.php";
    $receitas = new ReceitaFuncoes($pdo);
    //$listaReceita = $receitas->buscarAtivos();

    $queryBuscaReceita;
    

    if(isset($_POST['nomeReceita']))
    {
        $nomeBusca = '%'.$_POST['nomeReceita'].'%';
        echo $nomeBusca;
        $sqlBuscaReceita = "SELECT re.idRec,
                                   re.nome,
                                   re.cozinheiro,
                                   ca.descricao as nome_categoria,
                                   fu.nome as nome_cozinheiro
                            FROM receita re
                            JOIN categoria ca on re.id_categ = ca.idCategoria
                            JOIN funcionario fu on re.cozinheiro = fu.idFunc
                            WHERE re.nome LIKE '$nomeBusca'
                            ORDER BY idRec ASC";

        $queryBuscaReceita = $pdo->query($sqlBuscaReceita);
        $queryBuscaReceita->execute();
    }
    else
    {
        //Fazer SQL das receitas - EM GERAL
        $sqlBuscaReceita = "SELECT re.idRec,
                            re.nome,
                            re.cozinheiro,
                            ca.descricao as nome_categoria,
                            fu.nome as nome_cozinheiro
                            FROM receita re
                            JOIN categoria ca on re.id_categ = ca.idCategoria
                            JOIN funcionario fu on re.cozinheiro = fu.idFunc
                            ORDER BY idRec ASC";

        $queryBuscaReceita = $pdo->query($sqlBuscaReceita);
        $queryBuscaReceita->execute();
    }


    

    //$buscaReceita = $queryBuscaReceita->fetchAll(PDO::FETCH_ASSOC);

    //echo $buscaReceita[1]['nome'];




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
        .color_blue{
            color:blue;
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
            <h3>Consulta - Receita</h3>
            </div>
            <div>        

    <form action="consultaReceita.php" method="post">
              <input type="text" name="nomeReceita" >
              <button class="btn btn-danger w-15 py-2 mt-3" name="buscar" type="submit">Buscar</button>
              </form>
              </div>
              <hr>
        </div>
    </div>
    <!--Table-->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id Receita</th>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Autor</th>
                <th scope="col"></th>
                <th scope="col">Visualizar</th>
                <th scope="col">Modificar</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $queryBuscaReceita->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td>'.$row['idRec'].'</td>';
                        echo '<td>'.$row['nome'].'</td>';
                        echo '<td>'.$row['nome_categoria'].'</td>';
                        echo '<td>'.$row['nome_cozinheiro'].'</td>';
                        echo '<td></td>';
                        ?>

                        <!--VISUALIZAR INGREDIENTE -->
                        <td scope="col">
                            <form action="visalizaReceita.php" method="POST">
                            <input type="hidden" name="idVisualizaReceita" value=<?php echo '"'.$row['idRec'].'"'; ?>>
                            <button type="submit" class="configbutton color_blue"><span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg></span></button>
                            </form>
                        </td>


                        <?php 
                        if(intval($row['cozinheiro']) == $idFunc)
                        {
                            ?>
                                <td scope="col">
                                <form action="atualizaReceita.php" method="POST">
                                <input type="hidden" name="atualizaReceita" value=<?php echo '"'.$row['idRec'].'"'; ?>>
                                <button type="submit" class="configbutton color_blue"><span><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                </svg></span></button>
                                </form>
                                </td>
                            <?php
                        }
                        else{
                            echo '<td></td>';
                        }
                    }

                ?>
                </tr>
                

            </tbody>
        </table>

    </div>
    <!--End Table --> 

    <!--FOOTER -->
    <footer class="py-3 my-4" >
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Editora</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contato</a></li>
      </ul>
      <p class="text-center text-muted">© 2023 My CookBook, Inc</p>
    </footer>
    <!--END FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
</body>
</html>