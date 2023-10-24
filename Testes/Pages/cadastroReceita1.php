<?php
    include_once "../Connection/conexao.php";

    //Pegar todas as categorias ativas para por no formulario
    $sqlCategoria = "SELECT * FROM categoria where ativo = 1";
    $queryCategoria= $pdo->query($sqlCategoria);

    //Pegar a informação do cozinheiro. DEPOIS LIGAR COM A PERSISTENCIA DE DADOS
    $idCozinheiro = 7;
    $sqlCozinheiro = "SELECT nome FROM funcionario where idFunc = :id";
    $queryCozinheiro= $pdo->prepare($sqlCozinheiro);
    $queryCozinheiro->bindValue(":id",$idCozinheiro);
    $queryCozinheiro->execute();
    $resultadoCozinheiro = $queryCozinheiro->fetch(PDO::FETCH_ASSOC);
    //echo $resultadoCozinheiro["nome"];

    //Saber o resultado quando a tabela esta vazia
    $sqlQtdReceita = "SELECT MAX(idRec) FROM receita;";
    $queryQtdReceita = $pdo->query($sqlQtdReceita);
    $valorQtdReceita = $queryQtdReceita->fetch();
    //var_dump($valorQtdReceita['MAX(idRec)']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>My CookBook</title>
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
            <h3>Cadastro de Receita</h3>
            </div>
            <div class = col-8>
            </div>
            <div class = col-2>
            <h4>etapa 1/4</h4>
            </div>

            <hr>
        </div>
    </div>

    <!-- JANELA CADASTRO  -->
    <div class="container col-4">
        <main class="form-signin w-100 m-auto">
        <form action="../Validation/validaCadastroReceita1.php" method="post">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="57" fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
            <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
            <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
            </svg>               
              <h1 class="h3 mb-3 fw-normal">Informações Iniciais da Receita</h1>

                <!--NOME DA RECEITA -->
                <div class="form-floating rounded-top">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nome_receita" required>
                <label for="floatingInput">Nome da Receita </label>
                </div>

                <!--DATA DE CRIACAO DA RECEITA -->
                <div class="form-floating rounded-top">
                <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com" name="data_receita" required>
                <label for="floatingInput">Data de Criação </label>
                </div>

                <!--COZINHEIRO RESPONSAVEL -->
                <div class="form-floating rounded-top">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nome_cozinheiro" value = <?php echo '"'.$resultadoCozinheiro["nome"]. '"'; ?> readonly>
                <label for="floatingInput">Cozinheiro </label>
                </div>

                <div class="form-floating rounded-top">
                <select class="form-select form-select-lg mb-3" id="floatingInput" aria-label="Large select example" name="idCategoria" required>
                    <option disabled selected value> -- escolha uma opção de categoria -- </option>
                        <?php 
                            //Separar por categoria
                            while($row = $queryCategoria->fetch(PDO::FETCH_ASSOC))
                                {
                                    echo '<option value="'.$row['idCategoria'].'">'.$row['descricao'].'</option>';
                                    }
                        ?>
                </select>
                </div>


                <div>
                <input type="hidden" id="id_cozinheiro" name="id_cozinheiro" value = <?php echo '"'.$idCozinheiro.'"';?>>
                </div>

                <div>
                <input type="hidden" id="tipo_cadastro" name="tipo_cadastro" value ="y">
                </div>

                <button class="btn btn-primary w-25 py-2 mt-3" type="submit">Continuar</button>
            </form>
            <a href="secaoAdmin.php"><button class="btn btn-success w-25 py-2 mt-3" >Voltar</button></a>
        </main>
    </div>
    <!-- FIM JANELA CADASTRO -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>