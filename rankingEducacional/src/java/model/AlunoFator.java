package model;

public class AlunoFator {

  private String matriculaAluno;
  private String fatorId;
  private boolean resposta;

  public AlunoFator() {}

  public String getMatriculaAluno() {
    return matriculaAluno;
  }

  public void setMatriculaAluno(String matriculaAluno) {
    this.matriculaAluno = matriculaAluno;
  }

  public String getFatorId() {
    return fatorId;
  }

  public void setFatorId(String fatorId) {
    this.fatorId = fatorId;
  }

  public boolean getResposta() {
    return resposta;
  }

  public void setResposta(boolean resposta) {
    this.resposta = resposta;
  }
}
