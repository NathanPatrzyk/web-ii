<?php

class ContasReceber
{
    private $id_contasreceber = null;
    private $documento_contasreceber = null;
    private $valor_contasreceber = null;
    private $cliente_contasreceber = null;
    private $status_contasreceber = null;
    private $vencimento_contasreceber = null;

    public function getCliente_contasreceber()
    {
        return $this->cliente_contasreceber;
    }

    public function getDocumento_contasreceber()
    {
        return $this->documento_contasreceber;
    }

    public function getId_contasreceber()
    {
        return $this->id_contasreceber;
    }

    public function getStatus_contasreceber()
    {
        return $this->status_contasreceber;
    }

    public function getValor_contasreceber()
    {
        return $this->valor_contasreceber;
    }

    public function getVencimento_contasreceber()
    {
        return $this->vencimento_contasreceber;
    }

    public function setCliente_contasreceber($cliente_contasreceber)
    {
        $this->cliente_contasreceber = $cliente_contasreceber;
    }

    public function setDocumento_contasreceber($documento_contasreceber)
    {
        $this->documento_contasreceber = $documento_contasreceber;
    }

    public function setId_contasreceber($id_contasreceber)
    {
        $this->id_contasreceber = $id_contasreceber;
    }

    public function setStatus_contasreceber($status_contasreceber)
    {
        $this->status_contasreceber = $status_contasreceber;
    }

    public function setValor_contasreceber($valor_contasreceber)
    {
        $this->valor_contasreceber = $valor_contasreceber;
    }

    public function setVencimento_contasreceber($vencimento_contasreceber)
    {
        $this->vencimento_contasreceber = $vencimento_contasreceber;
    }
}
?>