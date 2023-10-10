<?php

class IngredienteFuncoes{

    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;             
    }

    public function cadastrar(Ingrediente $ingrediente) {

        $insert = "INSERT INTO livro_de_receita2.ingrediente
        (nome, descricao, ativo)
        VALUES 
        (?,?,?)";
        $instrucao = $this->pdo->prepare($insert);
        $instrucao->bindValue(1, $ingrediente->getNome());
        $instrucao->bindValue(2, $ingrediente->getDescricao());
        $instrucao->bindValue(3, $ingrediente->getAtivo());

        $instrucao->execute();

    }

    //Funcao inativar Ingrediente
    public function inativar($idIngrediente){
        $query = "UPDATE Ingrediente SET ativo = 0 WHERE idIngrediente = :id";
        $instrucao = $this->pdo->prepare($query);
        $instrucao->bindValue(":id",intVal($idIngrediente));
        $instrucao->execute();
    }

    //Funcao alterar descricao do cargo
    public function alterar($idIngrediente, $nomeIngrediente, $descricaoIngrediente){
        $query = "UPDATE ingrediente SET nome = :n, descricao= :d WHERE idIngrediente = :id";
        $instrucao = $this->pdo->prepare($query);
        $instrucao->bindValue(":n",$nomeIngrediente);
        $instrucao->bindValue(":d",$descricaoIngrediente);
        $instrucao->bindValue(":id",intVal($idIngrediente));
        $instrucao->execute();
    }





}

?>