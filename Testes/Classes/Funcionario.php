<?php

class Funcionario {
              private ?int $idFunc;
              private string $rg;
              private string $nome;
              private string $dt_ingr;
              private float $salario;
              private int $idCargo;
              private string $nome_fantasia;
              private string $email;
              private string $senha;
              private string $imagem;

              public function __construct(?int $idFunc, string $rg, string $nome, string $dt_ingr, float $salario,  int $idCargo, string $nome_fantasia, string $email, string $senha, string $imagem = 'perfil.jpg'){
              $this->idFunc = $idFunc;
              $this->rg = $rg;
              $this->nome = $nome;
              $this->dt_ingr = $dt_ingr;
              $this->salario = $salario;
              $this->idCargo = $idCargo;
              $this->nome_fantasia = $nome_fantasia;
              $this->email = $email;
              $this->senha = $senha;
              $this->imagem = $imagem;

             } 
             
             public function getIdFunc() : int {
              return $this->idFunc;
             }

             public function getRg() : string {
              return $this->rg;
             }

             public function getNome() : string {
              return $this->nome;
             }

             public function getIngresso() : string {
              return $this->dt_ingr;
             }

             public function getSalario() : string {
              return $this->salario;
             }

             public function getIdCargo() : int {
              return $this->idCargo;
             }

             public function getNomeF() : string {
              return $this->nome_fantasia;
             }

             public function getEmail() : string {
              return $this->email;
            }

             public function getSenha() : string {
              return $this->senha;
             }

             public function getImagem() : string {
              return $this->imagem;
             }

             public function getImagemDiretorio() : string {
                return "../Images/usuarios/".$this->imagem;
               }
  
               public function setImagem(string $imagem): void {
                $this->imagem = $imagem;
               }
}

?>