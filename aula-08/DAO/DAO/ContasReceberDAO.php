<?php

class ContasReceberDAO
{
    public static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new ContasReceberDAO();
        }

        return self::$instance;
    }

    public function InsertContasReceber(ContasReceber $ContasReceber)
    {
        global $con;

        $SQL = $con->prepare("INSERT INTO contasreceber (documento_contasreceber, valor_contasreceber, cliente_contasreceber, status_contasreceber, vencimento_contasreceber) VALUES (?, ?, ?, ?, ?)");

        $SQL->bind_param("sdiss", $P1, $P2, $P3, $P4, $P5);

        $P1 = $ContasReceber->getDocumento_contasreceber();
        $P2 = $ContasReceber->getValor_contasreceber();
        $P3 = $ContasReceber->getCliente_contasreceber();
        $P4 = $ContasReceber->getStatus_contasreceber();
        $P5 = $ContasReceber->getVencimento_contasreceber();

        $SQL->execute();

        if ($SQL->affected_rows > 0) {
            return true;
        }
    }

    public function ShowContasReceber(ContasReceber $ContasReceber)
    {
        global $con;

        if ($ContasReceber->getId_contasreceber() == null) {
            $SQL = $con->query("SELECT * FROM contasreceber");
            return $SQL;
        } else {
            $SQL = $con->query("SELECT * FROM contasreceber WHERE id_contasreceber = 
                        '" . $ContasReceber->getId_contasreceber() . "'");
            $rs = $SQL->fetch_array();

            $ContasReceber->setId_contasreceber($rs["id_contasreceber"]);
            $ContasReceber->setDocumento_contasreceber($rs["documento_contasreceber"]);
            $ContasReceber->setCliente_contasreceber($rs["cliente_contasreceber"]);
            $ContasReceber->setValor_contasreceber($rs["valor_contasreceber"]);
            $ContasReceber->setVencimento_contasreceber($rs["vencimento_contasreceber"]);
            $ContasReceber->setStatus_contasreceber($rs["status_contasreceber"]);
        }
    }

    public function ShowClientes(ContasReceber $ContasReceber)
    {
        global $con;

        $SQL = $con->query("SELECT * FROM clientes");

        if ($ContasReceber->getId_contasreceber() == null) {
            while ($registros = $SQL->fetch_array()) {
                $selectList[] = "<option value='" . $registros["id_cliente"] . "'>" . $registros["nome_cliente"] . "</option>";
            }
        } else {
            $id = $ContasReceber->getCliente_contasreceber();

            while ($registros = $SQL->fetch_array()) {
                $elemento = "<option " . ($registros["id_cliente"] == $id ? 'selected="" ' : '') . "value='" . $registros["id_cliente"] . "'>" . $registros["nome_cliente"] . "</option>";
                $selectList[] = $elemento;
            }
        }
        return $selectList;
    }

    public function DeleteContasReceber(ContasReceber $ContasReceber)
    {
        global $con;
        $SQL = $con->prepare("DELETE FROM contasreceber WHERE id_contasreceber = ?");
        $SQL->bind_param("i", $P1);

        $P1 = $ContasReceber->getId_contasreceber();

        $SQL->execute();

        if ($SQL->affected_rows > 0)
            return true;
    }

    public function UpdateContasReceber(ContasReceber $ContasReceber)
    {
        global $con;

        $SQL = $con->prepare("UPDATE contasreceber SET documento_contasreceber = ?,
                        valor_contasreceber = ?, cliente_contasreceber = ?,
                        status_contasreceber = ?, vencimento_contasreceber = ?
                        WHERE id_contasreceber = ?");

        $SQL->bind_param("sdissi", $P1, $P2, $P3, $P4, $P5, $P6);

        $P1 = $ContasReceber->getDocumento_contasreceber();
        $P2 = $ContasReceber->getValor_contasreceber();
        $P3 = $ContasReceber->getCliente_contasreceber();
        $P4 = $ContasReceber->getStatus_contasreceber();
        $P5 = $ContasReceber->getVencimento_contasreceber();
        $P6 = $ContasReceber->getId_contasreceber();

        $SQL->execute();
        if ($SQL->affected_rows > 0)
            return true;
    }
}
?>