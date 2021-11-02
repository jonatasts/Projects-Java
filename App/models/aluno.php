<?php

class Aluno
{
    private  $matriculaAluno;
    private  $serieEmCurso;
    private  $anoLetivo;
    private  $observacao;

    function __construct()
    {
    }

    public function getMatriculaAluno()
    {
        return $this->matriculaAluno;
    }

    public function setMatriculaAluno($matriculaAluno)
    {
        $this->matriculaAluno = $matriculaAluno;
    }

    public function getSerieEmCurso()
    {
        return $this->serieEmCurso;
    }

    public function setSerieEmCurso($serieEmCurso)
    {
        $this->serieEmCurso = $serieEmCurso;
    }

    public function getAnoLetivo()
    {
        return $this->anoLetivo;
    }

    public function setAnoLetivo($anoLetivo)
    {
        $this->anoLetivo = $anoLetivo;
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
