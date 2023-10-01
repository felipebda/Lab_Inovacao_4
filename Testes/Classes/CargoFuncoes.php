<?php



class CargoFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo){
                            $this->pdo = $pdo;
                            
              }

              
              public function cadastrar(Cargo $cargo) {

              $insert = "INSERT INTO livro_de_receita2.Cargo
              (descicao)
              VALUES 
              (?,?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $cargo->getDescricao());
              $instrucao->bindValue(2, $cargo->getAtivo());
              $instrucao->execute();

              }

              //Funcao inativar cargo
              public function inativar($idCargo){
                $query = "UPDATE Cargo SET ativo = 0 WHERE idCargo = :id";
                $instrucao = $this->pdo->prepare($query);
                $instrucao->bindValue(":id",intVal($idCargo));
                $instrucao->execute();
              }

              //Funcao alterar descricao do cargo
              public function alterar($idCargo, $novaDescricaoCargo){
                $query = "UPDATE Cargo SET descicao = :n WHERE idCargo = :id";
                $instrucao = $this->pdo->prepare($query);
                $instrucao->bindValue(":n",$novaDescricaoCargo);
                $instrucao->bindValue(":id",intVal($idCargo));
                $instrucao->execute();
              }
}
 
?>