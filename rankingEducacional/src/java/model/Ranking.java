package model;

public class Ranking {
    private int idAluno;
    private int anoEmCurso;
    private int pontuacao;
    private boolean observacao;

    public Ranking() {
    }

    public Ranking(int idAluno, int pontuacao) {
        this.idAluno = idAluno;
        this.pontuacao = pontuacao;
    }

    public int getIdAluno() {
        return idAluno;
    }

    public void setIdAluno(int idAluno) {
        this.idAluno = idAluno;
    }

    public int getAnoEmCurso() {
        return anoEmCurso;
    }

    public void setAnoEmCurso(int anoEmCurso) {
        this.anoEmCurso = anoEmCurso;
    }
    
    public int getPontuacao() {
        return pontuacao;
    }

    public void setPontuacao(int pontuacao) {
        this.pontuacao = pontuacao;
    }

    public boolean getObservacao() {
        return observacao;
    }

    public void setObservacao(boolean observacao) {
        this.observacao = observacao;
    }
    
    @Override
    public String toString() {
        return "" + idAluno + " |  " + pontuacao; 
    }
}
