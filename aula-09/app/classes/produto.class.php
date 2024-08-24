<?php

class Produto
{
    private $descricao;
    private $valor;

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor): self
    {
        $this->valor = $valor;

        return $this;
    }
}