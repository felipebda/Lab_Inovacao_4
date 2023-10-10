<?php

class MedidaFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo){
                            $this->pdo = $pdo;
                            
              }


              public function cadastrarMedida(Medida $medida) {

              $insert = "INSERT INTO livro_de_receita2.medida_ingrediente
              (descricao, ativo)
              VALUES 
              (?,?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $medida->getDescricao());
              $instrucao->bindValue(2, $medida->getAtivo());
              $instrucao->execute();
              }

              private function formarObjeto($dados)
              {
              return new Medida(
                            $dados['idMedida'],
                            $dados['descricao'],
                            $dados['ativo'],                       

              );
              }

              
              public function cadastrar(Medida $Medida) {

              $insert = "INSERT INTO livro_de_receita2.medida_ingrediente
              (descricao, ativo)
              VALUES 
              (?,?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $Medida->getDescricao());
              $instrucao->bindValue(2, $Medida->getAtivo());
              $instrucao->execute();

              }

              public function buscarAtivos()
      {
            $sql = "SELECT * FROM medida_ingrediente WHERE ativo = 1";
            $statement = $this->pdo->query($sql);
            $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

            $todosAtivos = array_map(function ($Medida) {
                  return $this->formarObjeto($Medida);
            }, $dados);

            return $todosAtivos;
      }

              public function buscar(int $idMedida)
              {
              $sql = "SELECT * FROM medida_ingrediente WHERE idMedida =  ?;";
              $instrucao = $this->pdo->prepare($sql);
              $instrucao->bindValue(1, $idMedida);
              $instrucao->execute();

              $dados = $instrucao->fetch(PDO::FETCH_ASSOC);

              return $this->formarObjeto($dados);
              }

              public function inativar(int $idMedida)
              {
              $sql = "UPDATE `livro_de_receita2`.`medida_ingrediente`
                                          SET `ativo` = 0
                                          WHERE `idMedida` = ?;";
              $instrucao = $this->pdo->prepare($sql);
              $instrucao->bindValue(1, $idMedida);
              $instrucao->execute();

              return true;
              }

              public function buscarNome(string $Medida)
      {
            $sql = "SELECT * FROM medida_ingrediente WHERE descricao =  ? AND ativo = 1;";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $Medida);
            $instrucao->execute();

            $dados = $instrucao->fetchAll(PDO::FETCH_ASSOC);

            $selecionado = array_map(function ($Medida) {
                  return $this->formarObjeto($Medida);
            }, $dados);

            return $selecionado;
      }
}
 
?>