<?php



class CategoriaFuncoes {

              private PDO $pdo;

              public function __construct(PDO $pdo){
                            $this->pdo = $pdo;
                            
              }

              private function formarObjeto($dados)
              {
              return new Categoria(
                            $dados['idCategoria'],
                            $dados['descricao'],
                            $dados['ativo'],                       

              );
              }

              
              public function cadastrar(Categoria $categoria) {

              $insert = "INSERT INTO livro_de_receita2.categoria
              (descricao, ativo)
              VALUES 
              (?,?)";
              $instrucao = $this->pdo->prepare($insert);
              $instrucao->bindValue(1, $categoria->getDescricao());
              $instrucao->bindValue(2, $categoria->getAtivo());
              $instrucao->execute();

              }

              public function buscarAtivos()
      {
            $sql = "SELECT * FROM categoria WHERE ativo = 1";
            $statement = $this->pdo->query($sql);
            $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

            $todosAtivos = array_map(function ($categoria) {
                  return $this->formarObjeto($categoria);
            }, $dados);

            return $todosAtivos;
      }

              public function buscar(int $idCategoria)
              {
              $sql = "SELECT * FROM categoria WHERE idCategoria =  ?;";
              $instrucao = $this->pdo->prepare($sql);
              $instrucao->bindValue(1, $idCategoria);
              $instrucao->execute();

              $dados = $instrucao->fetch(PDO::FETCH_ASSOC);

              return $this->formarObjeto($dados);
              }

              public function inativar(int $idCategoria)
              {
              $sql = "UPDATE `livro_de_receita2`.`categoria`
                                          SET `ativo` = 0
                                          WHERE `idCategoria` = ?;";
              $instrucao = $this->pdo->prepare($sql);
              $instrucao->bindValue(1, $idCategoria);
              $instrucao->execute();

              return true;
              }

              public function buscarNome(string $categoria)
      {
            $sql = "SELECT * FROM categoria WHERE descricao =  ? AND ativo = 1;";
            $instrucao = $this->pdo->prepare($sql);
            $instrucao->bindValue(1, $categoria);
            $instrucao->execute();

            $dados = $instrucao->fetchAll(PDO::FETCH_ASSOC);

            $selecionado = array_map(function ($categoria) {
                  return $this->formarObjeto($categoria);
            }, $dados);

            return $selecionado;
      }
}
 
?>