<?php
class FuncionarioFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo){
                            $this->pdo = $pdo;
                            
              }
              public function cadastrar(Funcionario $funcionario) {

              $insert = "INSERT INTO livro_de_receita.funcionario 
              (rg, nome, dt_ingr, salario, idCargo, nome_fantasia, emailFunc, senha, imagem)
              VALUES 
              (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $funcionario->getIdFunc());
              $instrucao->bindValue(2, $funcionario->getRg());
              $instrucao->bindValue(3, $funcionario->getNome());
              $instrucao->bindValue(4, $funcionario->getIngresso());
              $instrucao->bindValue(5, $funcionario->getSalario());
              $instrucao->bindValue(6, $funcionario->getIdCargo());
              $instrucao->bindValue(7, $funcionario->getNomeF());
              $instrucao->bindValue(8, $funcionario->getEmail());
              $instrucao->bindValue(9, $funcionario->getSenha());
              $instrucao->bindValue(10, $funcionario->getImagem());
              $instrucao->execute();

}
}

?>