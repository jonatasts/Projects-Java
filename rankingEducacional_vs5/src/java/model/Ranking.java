package model;

public class Ranking {
    private String idAluno;
    private int anoEmCurso;
    private int pontuacao;
    private boolean observacao = false;

    public Ranking() {
    }

    public Ranking(String idAluno, int pontuacao) {
        this.idAluno = idAluno;
        this.pontuacao = pontuacao;
    }

    public String getIdAluno() {
        return idAluno;
    }

    public void setIdAluno(String idAluno) {
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
