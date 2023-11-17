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

      public function checkEmail(string $emailFunc){
            $sql = "SELECT emailFunc FROM funcionario WHERE emailFunc = ?";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $emailFunc);
            $instrucao->execute();
            
            $emailArray = $instrucao->fetch(PDO::FETCH_ASSOC);

            $email = $emailArray['emailFunc'];

            
                  return $email;
            

      }

      public function getHash(string $emailFunc) {
            $sql = "SELECT senha FROM funcionario WHERE emailFunc = ?";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $emailFunc);
            $instrucao->execute();

            $senhaArray = $instrucao->fetch(PDO::FETCH_ASSOC);

            $senhaSegura = $senhaArray['senha'];

            return $senhaSegura;
      }

      
      public function validarSenha(String $senhaPura, string $senhaSegura){
            $senhaSeguraAlt = str_replace('"','',$senhaSegura);
            $msg = (password_verify($senhaPura, $senhaSeguraAlt)) ? "Senha válida" : "<br>Senha inválida";  
            if ($msg == "<br>Senha inválida") {
                  echo $msg; 
            } else{
                  return $senhaSeguraAlt;
            }    
             
      }

      public function criarObjeto(string $emailFunc, string $senhaSeguraAlt) {
            
            $query = "SELECT * FROM funcionario WHERE emailFunc = ? AND senha = ?";
            $instrucao = $this->pdo->prepare($query);
            $instrucao->bindValue(1, $emailFunc);
            $instrucao->bindValue(2, $senhaSeguraAlt);
            $instrucao->execute();
            $lista = $instrucao->fetch(PDO::FETCH_ASSOC);
            
            return $this->formarObjeto($lista);
        
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

      public function buscarCargo(string $emailFunc){
                  $sql = "SELECT idCargo FROM funcionario WHERE emailFunc = ?";
                  $instrucao = $this->pdo->prepare($sql);
                  $instrucao->bindValue(1, $emailFunc);
                  $instrucao->execute();
      
                  $cargoArray = $instrucao->fetch(PDO::FETCH_ASSOC);

                  $cargo = $cargoArray['idCargo'];
                  return $cargo;

      }

      //NOVO - Buscar ID do FUNCIONARIO ---------------------------------------------------------------------------
      public function buscarIdFuncionario(string $emailFunc){
            $sql = "SELECT idFunc FROM funcionario WHERE emailFunc = ?";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $emailFunc);
            $instrucao->execute();

            $idFuncArray = $instrucao->fetch(PDO::FETCH_ASSOC);

            $idFuncionario = $idFuncArray['idFunc'];
            return $idFuncionario;

}

      public function setCookie(String $emailFunc, String $senhaSeguraAlt, String $idCargo){

            setcookie('u_email', $emailFunc, time()+3000);
            setcookie('u_senha', $senhaSeguraAlt, time()+3000);
            setcookie('u_idcargo', $idCargo, time()+3000);

            return $idCargo;
            
      }

      public function direcionarSecao(String $idCargo){
            if ($idCargo == 1) 
            {
                header("Location: ../Pages/secaoAdmin.php");
                exit();
            }
            else if($idCargo == 2)
            {

                header("Location: secaoCoziJ.php");
                exit();
            }
            else if($idCargo == 3)
            {
                header("Location: secaoDegust.php");
                exit();
            }
            else if($idCargo == 4)
            {
                header("Location: ../Pages/secaoEdit.php");
                exit();
            }
            return true;
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