<?php
/**
 * Classe: sessao
 * Esta classe realiza a manipulação de sessões no PHP
 *
 * Atributos:
 * - id : Contém o session id
 * - nvars: Contém o tamanho do Array SESSION
 *
 * Métodos Privativos:
 * - setNVars: Ajusta $this->nvars
 * - setVar: Cria/Altera uma variável de sessão
 *   Parâmetros: var: Variável de sessão
 *   valor: valor a ser armazenado
 * - unsetVar: Elimina uma variável de sessão
 *   Parâmetro: var: Variável a ser eliminada
 * - getVar: Retorna o valor de uma variável de sessão
 *   Parâmetro: var: Nome da variável
 *
 * Métodos Públicos:
 * - __construct: Construtor da classe
 *   Parâmetros: inicia (TRUE ou FALSE), vars (Array com as variáveis e valores)
 * - start: Inicia uma sessão
 * - setVars: Cria/altera uma ou mais variáveis de sessão
 *   Parâmetros: var (nome da variável ou array), valor (valor da variável, "" se for um array)
 * - unSetVars: Elimina uma ou muitas variáveis de sessão
 *   Parâmetros: var (nome da variável ou array)
 * - getVars: Retorna o valor de uma ou mais variáveis de sessão
 *   Parâmetro: var (nome da variável ou array)
 * - getNVars: Retorna o tamanho de SESSION
 * - getId: Retorna o Id da sessão atual
 * - printAll: Imprime a relação de variáveis da sessão
 * - destroy: Exclui a sessão (session_unset, session_destroy), podendo iniciar uma nova
 *   Parâmetros: inicia (TRUE ou FALSE)
 */

class sessao {
    private $id;
    private $nvars;

    function __construct($inicia = FALSE, $vars = NULL) {
        if ($inicia == TRUE) {
            $this->start();
        }
        if ($vars !== NULL) {
            $this->setVars($vars);
        }
    }

    // Métodos privativos da classe
    private function setNVars() {
        $this->nvars = sizeof($_SESSION);
    }

    private function setVar($var, $valor) {
        $_SESSION[$var] = $valor;
        $this->setNVars();
    }

    private function unsetVar($var) {
        unset($_SESSION[$var]);
        $this->setNVars();
    }

    private function getVar($var) {
        if (isset($_SESSION[$var])) {
            return $_SESSION[$var];
        } else {
            return NULL;
        }
    }

    // Métodos públicos
    public function start() {
        session_start();
        $this->id = session_id();
        $this->setNVars();
    }

    public function setVars($var, $valor = "") {
        if (is_array($var)) {
            foreach ($var as $k => $v) {
                $this->setVar($k, $v);
            }
        } else {
            $this->setVar($var, $valor);
        }
    }

    public function unSetVars($var) {
        if (is_array($var)) {
            foreach ($var as $v) {
                $this->unsetVar($v);
            }
        } else {
            $this->unsetVar($var);
        }
    }

    public function getVars($var) {
        if (is_array($var)) {
            foreach ($var as $v) {
                $res[] = $this->getVar($v);
            }
        } else {
            $res = $this->getVar($var);
        }
        return $res;
    }

    public function getNVars() {
        return $this->nvars;
    }

    public function getId() {
        return $this->id;
    }

    public function printAll() {
        foreach ($_SESSION as $k => $v) {
            printf("%s = %s<br/>", $k, $v);
        }
    }

    public function destroy($inicia = FALSE) {
        session_unset();
        session_destroy();
        $this->setNVars();
        $this->id = NULL;
        if ($inicia === TRUE) {
            $this->start();
        }
    }
}
?>
