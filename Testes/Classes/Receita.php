<?php

class Receita {
              private string $nome;
              private int $cozinheiro;
              private int $idRec;
              private string $dt_criacao;
              private int $id_categ;
              private string $modo_preparo;
              private ?int $porcoes;
              private ?int $degustador;
              private ?string $dt_degustacao;
              private ?float $nota_degustacao;
              private string $ind_inedita;
              private string $imagem;
              private int $ativo;


              public function __construct(string $nome, int $cozinheiro, int $idRec, string $dt_criacao,
                                          int $id_categ, string $modo_preparo, ?int $porcoes, ?int $degustador,
                                          ?string $dt_degustacao, ?float $nota_degustacao, string $ind_inedita,
                                          string $imagem, int $ativo ){
                         $this->nome = $nome;
                         $this->cozinheiro = $cozinheiro;
                         $this->idRec = $idRec;   
                         $this->dt_criacao = $dt_criacao;
                         $this->id_categ = $id_categ;
                         $this->modo_preparo = $modo_preparo;
                         $this->porcoes = $porcoes;
                         $this->degustador = $degustador;
                         $this->dt_degustacao = $dt_degustacao;
                         $this->nota_degustacao = $nota_degustacao;
                         $this->ind_inedita = $nota_degustacao;
                         $this->imagem = $imagem;
                         $this->ativo = $ativo;             

              }

              public function getNome(): string{
                            return $this->nome;
              }
              public function getCozinheiro(): int{
                            return $this->cozinheiro;
              }
              public function getIdRec(): int {
                            return $this->idRec;
              }
              public function getDtCriacao(): int {
                            return $this->dt_criacao;
              }
              public function getIdCateg(): int {
                            return $this->id_categ;
              }
              public function getModoPreparo(): string {
                            return $this->modo_preparo;
              }
              public function getPorcoes(): int {
                            return $this->porcoes;
              }
              public function getDegustador(): string {
                            return $this->degustador;
              }
              public function getDtDegustacao(): string {
                            return $this->dt_degustacao;
              }
              public function getNotaDegustacao(): int {
                            return $this->nota_degustacao;
              }
              public function getIndInedita(): string {
                            return $this->ind_inedita;
              }
              public function getImagem(): string {
                            return $this->imagem;
              }
              public function getAtivo() : string {
                            return $this->ativo;
                           }

              
            
}

?>