<?php

class Ranking
{
    private  $idAlunoFator;
    private  $serieEmCurso;
    private  $pontuacao;
    private  $observacao = false;

    function __construct($idAlunoFator, $pontuacao)
    {
        $this->idAluno = $idAlunoFator;
        $this->pontuacao = $pontuacao;
    }

    public function getIdAlunoFator()
    {
        return $this->idAlunoFator;
    }

    public function setIdAlunoFator($idAlunoFator)
    {
        $this->idAlunoFator = $idAlunoFator;
    }

    public function getSerieEmCurso()
    {
        return $this->serieEmCurso;
    }

    public function setSerieEmCurso($serieEmCurso)
    {
        $this->serieEmCurso = $serieEmCurso;
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
