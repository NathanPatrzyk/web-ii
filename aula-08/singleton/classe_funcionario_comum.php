<?php

class Funcionario
{
    private $salario;

    // Construtor com visibilidade padrão Public
    function __construct()
    {
        $this->salario = null;
    }

    // Método para definir um valor
    public function setValue($salario)
    {
        $this->salario = $salario;
    }

    // Método para obter o valor
    public function getValue()
    {
        return $this->salario;
    }

}

?>