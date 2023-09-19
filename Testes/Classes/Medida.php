<?php

class Medida {
              private ?int $idMedida;
              private string $descricao;

              public function __construct(?int $idMedida, string $descricao){
                         $this->idMedida = $idMedida;
                         $this->descricao = $descricao;   
              }

              public function getIdCategoria() : int {
                            return $this->idMedida;
              }

              public function getDescricao() : string {
                            return $this->descricao;
              }
}

?>