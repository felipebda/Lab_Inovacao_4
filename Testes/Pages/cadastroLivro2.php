<?php

//NOVO -COMECAR A SESSION ---------------------------------------------------------------------------------------
session_start();

include_once "../Connection/conexao.php";

//ID do Livro 
$idLivro = intval($_SESSION['idLivro']);

//PEGAR INFORMAÇÔES DA RECEITA PARA VIZUALIZACAO DA TABELA

$sqlListaReceita = "SELECT re.nome as nome_receita, 
                    re.cozinheiro as id_cozinheiro,
                    fu.nome as nome_funcionario, 
                    cat.descricao as nome_categoria, 
                    re.ind_inedita as inedita
                    from receita re
                    join funcionario fu on re.cozinheiro = fu.idFunc
                    join categoria cat on re.id_categ = cat.idCategoria";

$queryListaReceita = $pdo->query($sqlListaReceita);


//TODO - DESCOBRIR SE POSSUI RECEITA EM PUBLICACOES
$sqlBuscaTemReceita = "SELECT pu.Livro_idLivro as idLivro,
                    pu.Receita_nome as receita,
                    pu.Receita_cozinheiro as idCozinheiro,
                    fu.nome as nomeCozinheiro,
                    re.idRec as idRec
                    from publicacao pu
                    join funcionario fu on pu.Receita_cozinheiro = fu.idFunc
                    join receita re on pu.Receita_cozinheiro = re.cozinheiro
                    where Livro_idLivro = $idLivro";

$queryBuscaTemReceita = $pdo->query($sqlBuscaTemReceita);
$queryBuscaTemReceita->execute();

//$resultadoBuscaTemReceita = $queryBuscaTemReceita->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>My CookBook</title>
    <style>
        .configbutton{
            border:none;
            background-color:transparent;
            color:red;
        }

        .configbuttonblue{
            border:none;
            background-color:transparent;
            color:blue;
        }

        .table-container {
            max-height: 125px; /* Altura máxima da tabela */
            overflow-y: auto; /* Adiciona uma barra de rolagem vertical quando necessário */
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
            <h3>Cadastro de Livro</h3>
            </div>
            <div class = col-8>
            </div>
            <div class = col-2>
            <h4>etapa 2/2</h4>
            </div>

            <hr>
        </div>
    </div>

    <!-- Mostrar tabelas Receitas no banco de dados -->
    <div class="container mt-2">
        <h3>Adicionar Receitas</h3>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Receita</th>
                        <th>Autor</th>
                        <th>Categoria</th>
                        <th>Inedita</th>
                        <th>Adicionar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $queryListaReceita->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<tr>';
                            echo '<td>'.$row['nome_receita'].'</td>';
                            echo '<td>'.$row['nome_funcionario'].'</td>';
                            echo '<td>'.$row['nome_categoria'].'</td>';
                            if($row['inedita'] == 1) // Caso seja receita inedita
                            {
                                ?>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                    </td>
                                <?php
                            }
                            else // caso nao seja receita inedita
                            {
                                ?>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                    </td>
                                <?php
                            }
                            
                            ?>
                            <td>
                                <form action="../Validation/validaInsercaoReceitaLivro.php" method="post">
                                    <input type="hidden" name="nome_receita" value=<?php echo '"'.$row['nome_receita'].'"'; ?>>
                                    <input type="hidden" name="id_cozinheiro" value=<?php echo '"'.$row['id_cozinheiro'].'"'; ?>>
                                    <button type="submit" class='configbutton'>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </span>
                                    </button>

                                </form>
                            </td>
                            <?php

                            echo"</tr>";

                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--Tabela de receitas na publicação caso tenha -->
    

    <div class="container mt-5">
        <h3>Registro de Receitas Adicionadas</h3>
        <?php
            if($queryBuscaTemReceita == null)
            {
        ?>

            <div class="row">
                <div class ="d-flex justify-content-center align-items-center mt-5">
                    <p>Não há ingredientes inseridos na receita.</p>
                </div>

            </div>
        <?php    
        }
        else
        {
            ?>
                <div class="table-container">
                <table class="table">
                    <thead>
                        <th>Receita</th>
                        <th>Cozinheiro</th>
                        <th>Visualizar</th>
                        <th>Retirar</th>
                    </thead>

                    <tbody>
                        <?php
                            while($row =$queryBuscaTemReceita->fetch(PDO::FETCH_ASSOC))
                            {
                                echo'<tr>';
                                echo'<td>'.$row['receita'].'</td>';
                                echo'<td>'.$row['nomeCozinheiro'].'</td>';
                                ?>
                                    <td>
                                        <form action="visualizaReceitaCadastroLivro2.php" method="post">
                                            <input type="hidden" name="nome_receita" id="nome_receita" value=<?php echo '"'.$row['receita'].'"'; ?>>
                                            <input type="hidden" name="id_cozinheiro" id="id_cozinheiro" value=<?php echo '"'.$row['idCozinheiro'].'"'; ?>>
                                            <input type="hidden" name="id_receita" id="id_receita" value=<?php echo '"'.$row['idRec'].'"'; ?>>

                                            <button type="submit" class="configbuttonblue">
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                                </span>

                                            </button>

                                        </form>
                                    </td>

                                    <td>
                                        <form action="..//Validation/validaRetiradaReceitaCadastroLivro2.php" method="post">
                                            <input type="hidden" name="nome_receita" id="nome_receita" value=<?php echo '"'.$row['receita'].'"'; ?>>
                                            <input type="hidden" name="id_cozinheiro" id="id_cozinheiro" value=<?php echo '"'.$row['idCozinheiro'].'"'; ?>>
                                            <button type="submit" class="configbutton">
                                                <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                                </span>

                                            </button>

                                        </form>
                                    </td>

                                <?php

                                
                            }

                        ?>
                    </tbody>

                </table>
                </div>
            <?php
        }

        ?>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-5"></div>
            <div class="col-2">
                <a href="cadastroLivroFinal.php"><button type="button" class="btn btn-primary">Finalizar</button></a>
            </div>

        </div>

    </div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    function scrollTable() {
        // Adiciona ou remove uma classe para mostrar ou ocultar a barra de rolagem
        $('.table-container').toggleClass('table-container-scroll');
    }
</script>    
    
</body>
</html>

