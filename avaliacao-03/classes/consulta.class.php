<?php

class consulta extends bd
{
    protected $res = NULL;
    protected $sql = "";
    protected $dados = array();
    protected $tipo_res = 0; // 0 - array, 1 - objeto
    protected $num_rows = -1;
    private $atual = -1;

    function __construct($bdtype = "mysqli", $srv = "", $port = "", $bd = "", $usr = "", $pwd = "", $extras = "", $sql = "")
    {
        parent::__construct($bdtype, $srv, $port, $bd, $usr, $pwd, $extras);
        if ($sql != "") {
            $this->executa($sql);
        }
    }

    private function moveponteiro($ponteiro)
    {
        switch ($this->bdtype) {
            case 0:
                //$r = mysql_data_seek($this->res, $ponteiro);
                break;
            case 1:
                $r = pg_result_seek($this->res, $ponteiro);
                break;
            case 2:
                $r = $this->res->data_seek($ponteiro);
                break;
        }
        if ($r !== FALSE) {
            $this->atual = $ponteiro;
            return TRUE;
        } else {
            return FALSE;
        }
    }

    protected function setAffectedRows()
    {
        switch ($this->bdtype) {
            case 0:
                //$this->affected_rows = mysql_affected_rows($this->connection);
                break;
            case 1:
                $this->affected_rows = pg_affected_rows($this->res);
                break;
            case 2:
                $this->affected_rows = $this->connection->affected_rows;
                break;
        }
    }

    protected function setNumRows()
    {
        if ($this->res == NULL) {
            return FALSE;
        }
        switch ($this->bdtype) {
            case 0:
                //$this->num_rows = mysql_num_rows($this->res);
                break;
            case 1:
                $this->num_rows = pg_num_rows($this->res);
                break;
            case 2:
                $this->num_rows = $this->res->num_rows;
                break;
        }
    }

    protected function preenche()
    {
        if ($this->res == NULL || $this->num_rows <= 0) {
            return FALSE;
        }
        switch ($this->bdtype) {
            case 0:
                // if($this->tipo_res == 0) {
                //     $this->dados = mysql_fetch_array($this->res);
                // } else {
                //     $this->dados = mysql_fetch_object($this->res);
                // }
                break;
            case 1:
                if ($this->tipo_res == 0) {
                    $this->dados = pg_fetch_array($this->res);
                } else {
                    $this->dados = pg_fetch_object($this->res);
                }
                break;
            case 2:
                if ($this->tipo_res == 0) {
                    $this->dados = $this->res->fetch_array(MYSQLI_BOTH);
                } else {
                    $this->dados = $this->res->fetch_object();
                }
                break;
        }
        if ($this->dados !== FALSE) {
            $this->atual++;
            if ($this->atual > $this->num_rows - 1) {
                $this->atual = $this->num_rows - 1;
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function setTipo($tipo)
    {
        if ($tipo == 0 || $tipo == 1) {
            $this->tipo_res = $tipo;
        } else {
            return FALSE;
        }
    }

    public function setSQL($sql)
    {
        $this->sql = $sql;
    }

    public function getSQL()
    {
        return $this->sql;
    }

    public function getAtual()
    {
        return $this->atual;
    }

    public function executa($sql = "", $tipo_res = NULL)
    {
        if ($this->connection === NULL) {
            return FALSE;
        }
        if ($sql != "") {
            $this->setSQL($sql);
        }
        if ($this->sql == "" || $this->sql == NULL) {
            return FALSE;
        }
        switch ($this->bdtype) {
            case 0:
                //$this->res = @mysql_query($this->sql, $this->connection);
                break;
            case 1:
                $this->res = @pg_query($this->connection, $this->sql);
                break;
            case 2:
                $this->res = $this->connection->query($this->sql);
                break;
        }
        if ($this->res !== FALSE) {
            if ($tipo_res != NULL) {
                $this->setTipo($tipo_res);
            }
            $tipo = strtolower(substr($this->sql, 0, strpos($this->sql, " ")));
            if ($tipo == "select" || $tipo == "describe" || $tipo == "show" || $tipo == "explain") {
                $this->setNumRows();
                $this->primeiro();
            } else {
                $this->setAffectedRows();
            }
        } else {
            return FALSE;
        }
    }

    public function getNumRows()
    {
        return $this->num_rows;
    }

    public function primeiro()
    {
        if ($this->res == NULL || $this->num_rows <= 0) {
            return FALSE;
        }
        if ($this->moveponteiro(0) === FALSE) {
            return FALSE;
        }
    }

    public function ultimo()
    {
        if ($this->res == NULL || $this->num_rows <= 0) {
            return FALSE;
        }
        if ($this->moveponteiro($this->num_rows - 1) === FALSE) {
            return FALSE;
        }
    }

    public function proximo()
    {
        if ($this->res == NULL || $this->atual >= $this->num_rows) {
            return FALSE;
        }
        if ($this->moveponteiro($this->atual + 1) === FALSE) {
            return FALSE;
        }
    }

    public function anterior()
    {
        if ($this->res == NULL || $this->atual <= 0) {
            return FALSE;
        }
        if ($this->moveponteiro($this->atual - 1) === FALSE) {
            return FALSE;
        }
    }

    public function navega($reg)
    {
        if ($reg < 0 || $reg >= $this->num_rows) {
            return FALSE;
        }
        if ($this->moveponteiro($reg) === FALSE) {
            return FALSE;
        }
    }

    public function getDados()
    {
        if ($this->preenche() === FALSE) {
            return FALSE;
        }
        if (is_array($this->dados) || is_object($this->dados)) {
            return $this->dados;
        } else {
            return FALSE;
        }
    }
}
