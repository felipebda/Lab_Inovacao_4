<?php

class ReceitaFuncoes
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;             
    }

    private function formarObjeto($dados)
      {
            return new Receita(
                  $dados['nome'],
                  $dados['cozinheiro'],
                  $dados['idRec'],
                  $dados['dt_criacao'],
                  $dados['id_categ'],
                  $dados['modo_preparo'],
                  $dados['porcoes'],
                  $dados['degustador'],
                  $dados['dt_degustacao'],
                  $dados['nota_degustacao'],
                  $dados['ind_inedita'],
                  $dados['ativo'],
            );
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
        $sqlNovaReceita = "INSERT INTO livro_de_receita2.receita (nome, cozinheiro, idRec, dt_criacao, id_categ, modo_preparo, nota_degustacao, ind_inedita,ativo) VALUES (:nomeReceita, :idCozinheiro, :idReceita, :da_ta, :idCategoria, '', 0, 1,1)";
        $queryReceita = $this->pdo->prepare($sqlNovaReceita);
        //-------ACRESCENTAR INFORMAÇÕES AO BD DE RECEITA-----------------------//
        $queryReceita->bindValue(":nomeReceita", $nomeReceita);
        $queryReceita->bindValue(":idCozinheiro", $idCozinheiro);
        $queryReceita->bindValue(":idReceita", $idReceita);
        $queryReceita->bindValue(":da_ta", $dataReceita);
        $queryReceita->bindValue(":idCategoria", $idCategoria);
        $queryReceita->execute();
        
    }

    //Funcao alterar descricao do cargo
    public function alterar($idFunc, $idRec, $novaNotaDegustacao){
        $query = "UPDATE receita SET degustador = :d, nota_degustacao = :novaNota WHERE idRec = :idReceita";
        $instrucao = $this->pdo->prepare($query);
        $instrucao->bindValue(":d",$idFunc);
        $instrucao->bindValue(":novaNota",$novaNotaDegustacao);
        $instrucao->bindValue(":idReceita",intVal($idRec));
        $instrucao->execute();
      }
      
      //finalizara query de update: 
      public function inativar($idRec){
        $query = "UPDATE receita SET degustador = null, nota_degustacao = 0 WHERE idRec = :idReceita";
        $instrucao = $this->pdo->prepare($query);
        $instrucao->bindValue(":idReceita",intVal($idRec));
        $instrucao->execute();
      }

}
?>