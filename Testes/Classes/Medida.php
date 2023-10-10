<?php

class Medida {
              private ?int $idMedida;
              private string $descricao;
              private int $ativo;

              public function __construct(?int $idMedida, string $descricao, int $ativo){
                         $this->idMedida = $idMedida;
                         $this->descricao = $descricao; 
                         $this->ativo = $ativo;   
              }

              public function getIdMedida() : int {
                            return $this->idMedida;
              }

              public function getDescricao() : string {
                            return $this->descricao;
              }
              public function getAtivo() : string {
                            return $this->ativo;
                           }
}

?>