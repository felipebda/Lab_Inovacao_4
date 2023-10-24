<?php

class ReceitaFuncoes
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;             
    }

    public function adicionarId()
    {
        //Saber o resultado quando a tabela esta vazia
        $sqlQtdReceita = "SELECT MAX(idRec) FROM receita;";
        $queryQtdReceita = $this->pdo->query($sqlQtdReceita);
        $valorQtdReceita = $queryQtdReceita->fetch();
        //var_dump($valorQtdReceita['MAX(idRec)']);
        //echo "<br>";

        if($valorQtdReceita['MAX(idRec)'] == null)
        {
            return 1;
        }
        else
        {
            return intval($valorQtdReceita['MAX(idRec)']) + 1;
        }
    }

    public function inserirReceitaPreliminar($nomeReceita,$idCozinheiro,$idReceita, $dataReceita,$idCategoria)
    {
        //FAZER SQL
        $sqlNovaReceita = "INSERT INTO livro_de_receita2.receita (nome, cozinheiro, idRec, dt_criacao, id_categ, modo_preparo, ind_inedita,ativo) VALUES (:nomeReceita, :idCozinheiro, :idReceita, :da_ta, :idCategoria, '', 1,1)";
        $queryReceita = $this->pdo->prepare($sqlNovaReceita);
        //-------ACRESCENTAR INFORMAÇÕES AO BD DE RECEITA-----------------------//
        $queryReceita->bindValue(":nomeReceita", $nomeReceita);
        $queryReceita->bindValue(":idCozinheiro", $idCozinheiro);
        $queryReceita->bindValue(":idReceita", $idReceita);
        $queryReceita->bindValue(":da_ta", $dataReceita);
        $queryReceita->bindValue(":idCategoria", $idCategoria);
        $queryReceita->execute();
        
    }

    public function buscarAtivos()
      {
            $sql = "SELECT * FROM receita WHERE ativo = 1";
            $statement = $this->pdo->query($sql);
            $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

            $todosAtivos = array_map(function ($receita) {
                  return $this->formarObjeto($receita);
            }, $dados);

            return $todosAtivos;
      }
}


?>