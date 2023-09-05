<?php
class FuncionarioFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo){
                            $this->pdo = $pdo;
                            
              }
              public function cadastrar(Funcionario $funcionario) {

              $insert = "INSERT INTO livro_de_receita2.funcionario 
              (rg, nome, dt_ingr, salario, idCargo, nome_fantasia, emailFunc, senha, imagem)
              VALUES 
              (?, ?, ?, ?, ?, ?, ?, ?, ?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $funcionario->getRg());
              $instrucao->bindValue(2, $funcionario->getNome());
              $instrucao->bindValue(3, $funcionario->getIngresso());
              $instrucao->bindValue(4, $funcionario->getSalario());
              $instrucao->bindValue(5, $funcionario->getIdCargo());
              $instrucao->bindValue(6, $funcionario->getNomeF());
              $instrucao->bindValue(7, $funcionario->getEmail());
              $instrucao->bindValue(8, $funcionario->getSenha());
              $instrucao->bindValue(9, $funcionario->getImagem());
              $instrucao->execute();

}
}

?>