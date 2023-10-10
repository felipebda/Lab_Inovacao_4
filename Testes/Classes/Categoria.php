<?php

class Categoria {
              private ?int $idCategoria;
              private string $descricao;
              private int $ativo;

              public function __construct(?int $idCategoria, string $descricao, int $ativo){
                         $this->idCategoria = $idCategoria;
                         $this->descricao = $descricao;   
                         $this->ativo = $ativo; 
              }

              public function getIdCategoria() : int {
                            return $this->idCategoria;
              }

              public function getDescricao() : string {
                            return $this->descricao;
              }

              public function getAtivo() : string {
                            return $this->ativo;
                           }
            
}

?>