<?php

class Cliente
{
    private $nome;
    private $cidade;

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }
}