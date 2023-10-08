<?php

    class Restaurante{
        private ?int $idRestaurante;
        private string $nome;
        private string $contato;
        private int $ativo;
    

    public function __construct(?int $idRestaurante, string $nome, string $contato, int $ativo)
    {
        $this->idRestaurante = $idRestaurante;
        $this->nome = $nome;
        $this->contato = $contato;
        $this->ativo = $ativo;
    }

    public function getIdRestaurante() : int {
        return $this->idRestaurante;
    }

    public function getNome() : string {
        return $this->nome;
    }

    public function getContato() : string {
        return $this->contato;
    }

    public function getAtivo() : int {
        return $this->ativo;
    }
    
}

?>