package model;

public class AlunoFator {

    private int matriculaAluno;
    private int anoEmCurso;
    private int anoLetivo;
    private int[] fatores = new int[30];

    public AlunoFator() {
    }

    public int getMatriculaAluno() {
        return matriculaAluno;
    }

    public void setMatriculaAluno(int matriculaAluno) {
        this.matriculaAluno = matriculaAluno;
    }

    public int getAnoEmCurso() {
        return anoEmCurso;
    }

    public void setAnoEmCurso(int anoEmCurso) {
        this.anoEmCurso = anoEmCurso;
    }

    public int getAnoLetivo() {
        return anoLetivo;
    }

    public void setAnoLetivo(int anoLetivo) {
        this.anoLetivo = anoLetivo;
    }

    public int getFatores(int posicao) {
        return fatores[posicao];
    }
    
    public int[] getFatores() {
        return fatores;
    }
    
    public void setFatores(int posicao, int fator) {
        this.fatores[posicao] = fator;
    }
    
    public void setFatores(int[] fatores) {
        this.fatores = fatores;
    }

    public int getTamanhoFatores() {
        return this.fatores.length;
    }
}
