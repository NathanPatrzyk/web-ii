<?php

abstract class bd
{
    protected $bd = "mysqli"; //mysql, mysqli, postgresql
    protected $bdtype = 0;
    protected $affected_rows = 0;
    protected $connection = NULL;
    protected $servidor = "localhost";
    protected $bdname = NULL;
    protected $usuario = "root";
    protected $senha = "";
    protected $porta = NULL;
    protected $extras = NULL;
    protected $last_error = -1;

    //abstract protected function setAffected_rows();

    function __construct($bdtype = "mysqli", $srv = "", $port = "", $bd = "", $usr = "", $pwd = "", $extras = "")
    {
        $bdtype = strtolower($bdtype);
        if ($bdtype != "mysql" && $bdtype != "postgresql" && $bdtype != "mysqli") {
            return FALSE;
        }
        $this->bd = $bdtype;

        switch ($this->bd) {
            case 'mysql':
                $this->bdtype = 0;
                break;
            case 'postgresql':
                $this->bdtype = 1;
                break;
            case 'mysqli':
                $this->bdtype = 2;
                break;
        }
        if ($srv != "") {
            // banco, usuario devem ser informados tb...
            if ($bd == "" || $usr == "") {
                $r = $this->conecta($srv, $port, $bd, $usr, $pwd, $extras);
                if ($r == FALSE) {
                    return FALSE;
                }
            }
        }
    }

    public function conecta($srv = "", $port = "", $bd = "", $usr = "", $pwd = "", $extras = "")
    {
        if ($this->connection !== NULL) {
            return FALSE;
        }
        if ($srv != "") {
            // banco, usuario devem ser informados tb...
            if ($bd == "" || $usr == "") {
                $this->setServidor($srv);
                $this->setPorta($port);
                $this->setbd($bd);
                $this->setUsuario($usr);
                $this->setSenha($pwd);
                $this->setExtras($extras);
            }
        }
        if ($this->bdtype === NULL || $this->servidor == NULL || $this->bdname == NULL) {
            return FALSE;
        } else {
            switch ($this->bdtype) {
                case 0: // mysql     DEPRECATED/REMOVIDO NO PHP 7
                    // if(is_int($this->porta)) {
                    //     $s = "($this->servidor):($this->porta)";
                    // } else {
                    //     $s = $this->servidor;
                    // }
                    // if($this->extras!=NULL) {
                    //     $this->connection = @mysql_connect($s, $this->usuario, $this->senha, TRUE, $this->extras);
                    // } else {
                    //     $this->connection = @mysql_connect($s, $this->usuario, $this->senha);
                    // }
                    // if($this->connection!==FALSE) {
                    //     // seleciona o BD
                    //     $r = @mysql_select_db($this->bdname, $this->connection);
                    //     if($r===FALSE) {
                    //         $this->last_error = mysql_error($this->connection);
                    //         return FALSE;
                    //     }
                    // } else {
                    //     $this->connection = NULL;
                    //     return FALSE;
                    // }
                    return FALSE;
                    break;
                case 1: // postgresql
                    $strcon = "host=$this->servidor ";
                    $strcon .= "dbname=$this->bdname ";
                    $strcon .= "user=$this->usuario ";
                    if ($this->senha != NULL && $this->senha != "") {
                        $strcon .= "password=$this->senha ";
                    }
                    if (is_int($this->porta)) {
                        $strcon .= "port=$this->porta ";
                    }
                    if ($this->extras != NULL) {
                        $strcon .= "options=$this->extras ";
                    }
                    $this->connection = @pg_connect($strcon);
                    if (!$this->connection) {
                        $this->connection = NULL;
                        return FALSE;
                    }
                    break;
                case 2: // mysqli
                    $this->connection = new mysqli($this->servidor, $this->usuario, $this->senha, $this->bdname, $this->porta);
                    if ($this->connection->connect_errno) {
                        $this->last_error = mysqli_connect_error();
                        return FALSE;
                    }
                    break;
            }
        }
        return TRUE;
    }

    public function setServidor($srv)
    {
        $this->servidor = $srv;
    }

    public function setPorta($port)
    {
        $this->porta = $port;
    }

    public function setbd($bd)
    {
        $this->bdname = $bd;
    }

    public function setUsuario($usr)
    {
        $this->usuario = $usr;
    }

    public function setSenha($pwd)
    {
        $this->senha = $pwd;
    }

    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    public function printBD()
    {
        return array(
            "tipo banco" => $this->bd,
            "servidor" => $this->servidor,
            "porta" => $this->porta,
            "banco" => $this->bdname,
            "usuario" => $this->usuario,
            "extras" => $this->extras
        );
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function getaAffectedRows()
    {
        return $this->affected_rows;
    }

    public function getLastError()
    {
        return $this->last_error;
    }

    public function close()
    {
        if ($this->connection === NULL) {
            return FALSE;
        }
        switch ($this->bdtype) {
            case 0:
                //@mysql_close($this->connection);
                break;
            case 1:
                @pg_close($this->connection);
                break;
            case 2:
                $this->connection->close();
                break;
        }
    }
}
