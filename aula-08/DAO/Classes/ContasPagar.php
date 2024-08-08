<?php

class ContasPagar
{
    private $id_contaspagar = null;
    private $documento_contaspagar = null;
    private $valor_contaspagar = null;
    private $fornecedor_contaspagar = null;
    private $status_contaspagar = null;
    private $vencimento_contaspagar = null;

    public function getDocumento_contaspagar()
    {
        return $this->documento_contaspagar;
    }

    public function getFornecedor_contaspagar()
    {
        return $this->fornecedor_contaspagar;
    }

    public function getId_contaspagar()
    {
        return $this->id_contaspagar;
    }

    public function getStatus_contaspagar()
    {
        return $this->status_contaspagar;
    }

    public function getValor_contaspagar()
    {
        return $this->valor_contaspagar;
    }

    public function getVencimento_contaspagar()
    {
        return $this->vencimento_contaspagar;
    }

    public function setDocumento_contaspagar($documento_contaspagar)
    {
        $this->documento_contaspagar = $documento_contaspagar;
    }

    public function setFornecedor_contaspagar($fornecedor_contaspagar)
    {
        $this->fornecedor_contaspagar = $fornecedor_contaspagar;
    }

    public function setId_contaspagar($id_contaspagar)
    {
        $this->id_contaspagar = $id_contaspagar;
    }

    public function setStatus_contaspagar($status_contaspagar)
    {
        $this->status_contaspagar = $status_contaspagar;
    }

    public function setValor_contaspagar($valor_contaspagar)
    {
        $this->valor_contaspagar = $valor_contaspagar;
    }

    public function setVencimento_contaspagar($vencimento_contaspagar)
    {
        $this->vencimento_contaspagar = $vencimento_contaspagar;
    }
}
?>