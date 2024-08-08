<?php

class ContasPagarDAO
{
    public static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new ContasPagarDAO();
        }

        return self::$instance;
    }

    public function InsertContasPagar(ContasPagar $ContasPagar)
    {
        global $con;

        $SQL = $con->prepare("INSERT INTO contaspagar (documento_contaspagar,
            valor_contaspagar, fornecedor_contaspagar, status_contaspagar,
            vencimento_contaspagar) VALUES (?, ?, ?, ?, ?)");

        $SQL->bind_param("sdiss", $P1, $P2, $P3, $P4, $P5);

        $P1 = $ContasPagar->getDocumento_contaspagar();
        $P2 = $ContasPagar->getValor_contaspagar();
        $P3 = $ContasPagar->getFornecedor_contaspagar();
        $P4 = $ContasPagar->getStatus_contaspagar();
        $P5 = $ContasPagar->getVencimento_contaspagar();

        $SQL->execute();

        if ($SQL->affected_rows > 0) {
            return true;
        }
    }

    public function ShowContasPagar(ContasPagar $ContasPagar)
    {
        global $con;

        if ($ContasPagar->getId_contaspagar() == null) {
            $SQL = $con->query("SELECT * FROM contaspagar");
            return $SQL;
        } else {
            $SQL = $con->query("SELECT * FROM contaspagar WHERE id_contaspagar =
                        '" . $ContasPagar->getId_contaspagar() . "'");
            $rs = $SQL->fetch_array();

            $ContasPagar->setId_contaspagar($rs["id_contaspagar"]);
            $ContasPagar->setDocumento_contaspagar($rs["documento_contaspagar"]);
            $ContasPagar->setFornecedor_contaspagar($rs["fornecedor_contaspagar"]);
            $ContasPagar->setValor_contaspagar($rs["valor_contaspagar"]);
            $ContasPagar->setVencimento_contaspagar($rs["vencimento_contaspagar"]);
            $ContasPagar->setStatus_contaspagar($rs["status_contaspagar"]);
        }
    }

    public function ShowFornecedores(ContasPagar $ContasPagar)
    {
        global $con;

        $SQL = $con->query("SELECT * FROM fornecedores");

        if ($ContasPagar->getId_contaspagar() == null) {
            while ($registros = $SQL->fetch_array()) {
                $selectList[] = "<option value='" . $registros["id_fornecedor"] . "'>" . $registros["nome_fornecedor"] . "</option>";
            }
        } else {
            $id = $ContasPagar->getFornecedor_contaspagar();

            while ($registros = $SQL->fetch_array()) {
                //($registros["id_fornecedor"] == $id ? 'selected=""' : '');          ??????
                $elemento = "<option " . ($registros["id_fornecedor"] == $id ? 'selected="" ' : '') . "value='" . $registros["id_fornecedor"] . "'>" . $registros["nome_fornecedor"] . "</option>";
                $selectList[] = $elemento;
            }
        }
        return $selectList;
    }

    public function DeleteContasPagar(ContasPagar $ContasPagar)
    {
        global $con;
        $SQL = $con->prepare("DELETE FROM contaspagar WHERE id_contaspagar = ?");
        $SQL->bind_param("i", $P1);

        $P1 = $ContasPagar->getId_contaspagar();

        $SQL->execute();

        if ($SQL->affected_rows > 0)
            return true;
    }

    public function UpdateContasPagar(ContasPagar $ContasPagar)
    {
        global $con;

        $SQL = $con->prepare("UPDATE contaspagar SET documento_contaspagar = ?,
                        valor_contaspagar = ?, fornecedor_contaspagar = ?,
                        status_contaspagar = ?,  vencimento_contaspagar = ?
                        WHERE id_contaspagar = ?");

        $SQL->bind_param("sdissi", $P1, $P2, $P3, $P4, $P5, $P6);

        $P1 = $ContasPagar->getDocumento_contaspagar();
        $P2 = $ContasPagar->getValor_contaspagar();
        $P3 = $ContasPagar->getFornecedor_contaspagar();
        $P4 = $ContasPagar->getStatus_contaspagar();
        $P5 = $ContasPagar->getVencimento_contaspagar();
        $P6 = $ContasPagar->getId_contaspagar();

        $SQL->execute();
        if ($SQL->affected_rows > 0)
            return true;
    }
}
?>