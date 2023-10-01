<?php

class Ingrediente {
              private ?int $idIngrediente;
              private string $nome;
              private string $descricao;
              private int $ativo;

              public function __construct(?int $idIngrediente, string $nome,string $descricao, int $ativo){
                         $this->idIngrediente = $idIngrediente;
                         $this->nome = $nome;
                         $this->descricao = $descricao;
                         $this->ativo = $ativo;  
              }

              public function getidIngrediente() : int {
                            return $this->idIngrediente;
              }

              public function getNome() : string {
                            return $this->nome;
              }

              public function getDescricao() : string {
                            return $this->descricao;
              }

              //funcao para mostrar valor do ativo
              public function getAtivo() : int{
                            return $this->ativo;
              }
}

?>