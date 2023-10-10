<?php

class Cargo {
              private ?int $idCargo;
              private string $descricao;
              private int $ativo;

              public function __construct(?int $idCargo, string $descricao, int $ativo){
                         $this->idCargo = $idCargo;
                         $this->descricao = $descricao;
                         $this->ativo = $ativo;  
              }

              public function getidCargo() : int {
                            return $this->idCargo;
              }

              public function getDescricao() : string {
                            return $this->descricao;
              }

              //funcao para mostrar valor do ativo
              public function getAtivo() : string{
                            return $this->ativo;
              }
}

?>