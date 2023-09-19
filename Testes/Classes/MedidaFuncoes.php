<?php

class MedidaFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo){
                            $this->pdo = $pdo;
                            
              }


              public function cadastrarMedida(Medida $medida) {

              $insert = "INSERT INTO livro_de_receita2.medida_ingrediente
              (descricao)
              VALUES 
              (?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $medida->getDescricao());
              $instrucao->execute();

}
}
 
?>