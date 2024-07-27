<?php
class sessao {
    private $id;
    private $nvars;
    private $sessionSavePath = 'session_data.txt'; // Caminho padrão para salvar a sessão

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
            echo $k . " = " . $v . "/n";
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

    // Novo método para salvar as informações da sessão em um arquivo de texto
    public function saveSessionToFile() {
        $sessionData = '';
        foreach ($_SESSION as $k => $v) {
            $sessionData .= sprintf("%s = %s\n", $k, $v);
        }
        file_put_contents($this->sessionSavePath, $sessionData);
    }

    // Novo método para definir o caminho do arquivo de texto onde os dados da sessão serão salvos
    public function setSessionSavePath($path) {
        $this->sessionSavePath = $path;
    }

    // Novo método para gerar um novo identificador de sessão
    public function regenerateSessionId() {
        session_regenerate_id(TRUE);
        $this->id = session_id();
    }

    // Novo método para forçar a gravação dos dados da sessão atual
    public function saveSession() {
        session_write_close();
        session_start();
    }
}
?>
