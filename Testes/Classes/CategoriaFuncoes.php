<?php



class CategoriaFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo){
                            $this->pdo = $pdo;
                            
              }

              
              public function cadastrar(Categoria $categoria) {

              $insert = "INSERT INTO livro_de_receita2.categoria
              (descricao)
              VALUES 
              (?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $categoria->getDescricao());
              $instrucao->execute();

              }
}
 
?>