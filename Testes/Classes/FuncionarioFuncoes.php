<?php
class FuncionarioFuncoes {

              private PDO $pdo;
              //atributo para validar senha:
              private string $senhaSegura;

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
//não tô consguindo jogar a $senhaSegura no validaSenha():
      public function setHash(string $senhaSegura): void {
            $this->senhaSegura = $senhaSegura;
           }

      public function getHash() : string {
            return $this->senhaSegura;
      }

      public function validarSenha(String $senhaPura){
            
            if(password_verify($senhaPura, $this->senhaSegura)){
                  echo "senha válida";
            }
            else{
                  echo "senha inválida";
            }
             
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

      public function buscarNome(string $nome)
      {
            $sql = "SELECT * FROM funcionario WHERE nome =  ? AND ativo = 1;";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $nome);
            $instrucao->execute();

            $dados = $instrucao->fetchAll(PDO::FETCH_ASSOC);

            $selecionado = array_map(function ($funcionario) {
                  return $this->formarObjeto($funcionario);
            }, $dados);

            return $selecionado;
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