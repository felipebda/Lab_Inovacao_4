<?php

class RestauranteFuncoes
{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;             
    }

    public function cadastrar(Restaurante $restaurante) {

        $insert = "INSERT INTO livro_de_receita2.restaurante
        (nome, contato, ativo)
        VALUES 
        (?,?,?)";
        $instrucao = $this->pdo->prepare($insert);
        $instrucao->bindValue(1, $restaurante->getNome());
        $instrucao->bindValue(2, $restaurante->getContato());
        $instrucao->bindValue(3, $restaurante->getAtivo());
    
        $instrucao->execute();
    
    }

    //Funcao alterar descricao do restaurante
    public function alterar($idRestaurante, $nomeRestaurante, $contato){
        $query = "UPDATE restaurante SET nome = :n, contato= :c WHERE idRestaurante = :id";
        $instrucao = $this->pdo->prepare($query);
        $instrucao->bindValue(":n",$nomeRestaurante);
        $instrucao->bindValue(":c",$contato);
        $instrucao->bindValue(":id",intVal($idRestaurante));
        $instrucao->execute();
    }

    //Funcao inativar Restaurante
    public function inativar($idRestaurante){
        $query = "UPDATE restaurante SET ativo = 0 WHERE idRestaurante = :id";
        $instrucao = $this->pdo->prepare($query);
        $instrucao->bindValue(":id",intVal($idRestaurante));
        $instrucao->execute();
    }
}



?>