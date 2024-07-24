<?php

    class funcionario {
            public $codigo;
            public $nome;
            private $salario;

            function getSalario() {
                return $this->salario;
            }

            function setSalario($valor) {
                $this->salario = $valor;
            }
    }


    $funcionarioDoMes = new funcionario();
    echo $funcionarioDoMes->getSalario();


?>