<?php
class FuncionarioFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo)
      {
            $this->pdo = $pdo;
      }

      private function formarObjeto($dados)
      {
            return new Funcionario(
                  $dados['idFunc'],
                  $dados['rg'],
                  $dados['nome'],
                  $dados['dt_ingr'],
                  $dados['salario'],
                  $dados['idCargo'],
                  $dados['nome_fantasia'],
                  $dados['emailFunc'],
                  $dados['senha'],
                  $dados['ativo'],

            );
      }
      public function cadastrar(Funcionario $funcionario)
      {

            $insert = "INSERT INTO livro_de_receita2.funcionario 
              (rg, nome, dt_ingr, salario, idCargo, nome_fantasia, emailFunc, senha, ativo, imagem)
              VALUES 
              (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $funcionario->getRg());
              $instrucao->bindValue(2, $funcionario->getNome());
              $instrucao->bindValue(3, $funcionario->getIngresso());
              $instrucao->bindValue(4, $funcionario->getSalario());
              $instrucao->bindValue(5, $funcionario->getIdCargo());
              $instrucao->bindValue(6, $funcionario->getNomeF());
              $instrucao->bindValue(7, $funcionario->getEmail());
              $instrucao->bindValue(8, $funcionario->getSenha());
              $instrucao->bindValue(9, $funcionario->getAtivo());
            $instrucao->bindValue(10, $funcionario->getImagem());
            $instrucao->execute();
      }

      //NÃO FUNCIONA:
      public function buscarFuncionarios()
      {
            $sql = "SELECT funcionario.idFunc, funcionario.nome, cargo.descicao as cargo, funcionario.nome_fantasia from funcionario inner join cargo on funcionario.idCargo = cargo.idCargo;";
            $instrucao = $this->pdo->query($sql);
            $dados = $instrucao->fetchAll(PDO::FETCH_ASSOC);

            $todosDados = array_map(function ($funcionario) {
                  return $this->formarObjeto($funcionario);
            }, $dados);
            return $todosDados;
      }

      public function buscarAtivos()
      {
            $sql = "SELECT * FROM funcionario WHERE ativo = 1";
            $statement = $this->pdo->query($sql);
            $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

            $todosAtivos = array_map(function ($funcionario) {
                  return $this->formarObjeto($funcionario);
            }, $dados);

            return $todosAtivos;
      }


      public function buscar(int $idFunc)
      {
            $sql = "SELECT * FROM funcionario WHERE idFunc =  ?;";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $idFunc);
            $instrucao->execute();

            $dados = $instrucao->fetch(PDO::FETCH_ASSOC);

            return $this->formarObjeto($dados);
      }

      public function mostraId(int $idFunc)
      {
            $sql = "SELECT * FROM funcionario WHERE idFunc =  ?;";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $idFunc);
            $instrucao->execute();

            return $idFunc;
      }

      public function inativar(int $idFunc)
      {

            $sql = "UPDATE `livro_de_receita2`.`funcionario`
                            SET `ativo` = 0
                            WHERE `idFunc` = ?;";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $idFunc);
            $instrucao->execute();

            return true;
      }
}

?>