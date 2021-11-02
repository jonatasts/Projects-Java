<?php

class AlunoFator
{
    private  $matriculaAluno;
    private  $fatorId;
    private  $resposta;

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

    public function getFatorId()
    {
        return $this->fatorId;
    }

    public function setFatorId($fatorId)
    {
        $this->fatorId = $fatorId;
    }

    public function getResposta()
    {
        return $this->resposta;
    }

    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    }
}
