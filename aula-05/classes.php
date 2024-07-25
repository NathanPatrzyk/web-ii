<?php

class funcionario
{
    const SOBRENOME2 = "SILVA";
    public static $SOBRENOME = "SILVA";
    public $codigo;
    public $nome;
    private $salario;

    function getSalario()
    {
        return $this->salario;
    }

    function setSalario($valor)
    {
        $this->salario = $valor;
    }
}

$funcionarioDoMes = new funcionario();
$funcionarioDoMes->setSalario("1000");

echo $funcionarioDoMes->getSalario();
echo $funcionarioDoMes::SOBRENOME2;
echo $funcionarioDoMes::$SOBRENOME;
