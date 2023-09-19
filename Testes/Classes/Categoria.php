<?php

class Categoria {
              private ?int $idCategoria;
              private string $descricao;

              public function __construct(?int $idCategoria, string $descricao){
                         $this->idCategoria = $idCategoria;
                         $this->descricao = $descricao;   
              }

              public function getIdCategoria() : int {
                            return $this->idCategoria;
              }

              public function getDescricao() : string {
                            return $this->descricao;
              }
}

?>