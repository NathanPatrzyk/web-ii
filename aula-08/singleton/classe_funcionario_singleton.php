<?php

class Funcionario
{
    private static $instance = null;

    private $salario;

    // Construtor privado para evitar instância direta
    private function __construct()
    {
        $this->salario = null;
    }

    // Método para obter a instância única
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Funcionario();
        }
        return self::$instance;
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

    // Clone e wakeup são privados para prevenir cópias da instância Singleton
    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}

?>