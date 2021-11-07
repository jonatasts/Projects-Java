<?php

class Ranking
{
    private  $idAluno;
    private  $anoLetivo;
    private  $pontuacao;
    private  $observacao = false;

    function __construct()
    {
    }

    public function getIdAluno()
    {
        return $this->idAluno;
    }

    public function setIdAluno($idAluno)
    {
        $this->idAluno = $idAluno;
    }

    public function getAnoLetivo()
    {
        return $this->anoLetivo;
    }

    public function setAnoLetivo($anoLetivo)
    {
        $this->anoLetivo = $anoLetivo;
    }

    public function getPontuacao()
    {
        return $this->pontuacao;
    }

    public function setPontuacao($pontuacao)
    {
        $this->pontuacao = $pontuacao;
    }

    public function getObservacao()
    {
        return $this->observacao;
    }

    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;
    }
}
