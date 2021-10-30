package model;

public class AlunoFator {

  private String matriculaAluno;
  private int anoEmCurso;
  private int anoLetivo;
  private String observacao;

  public Alunor() {}

  public String getMatriculaAluno() {
    return matriculaAluno;
  }

  public void setMatriculaAluno(String matriculaAluno) {
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

  public String getObservacao() {
    return observacao;
  }

  public void setObservacao(String observacao) {
    this.observacao = observacao;
  }
}
