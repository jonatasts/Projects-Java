package model;

public class Ranking {

  private String idAlunoFator;
  private int serieEmCurso;
  private int pontuacao;
  private boolean observacao = false;

  public Ranking() {}

  public Ranking(String idAlunoFator, int pontuacao) {
    this.idAluno = idAlunoFator;
    this.pontuacao = pontuacao;
  }

  public String getIdAlunoFator() {
    return idAlunoFator;
  }

  public void setIdAlunoFator(String idAlunoFator) {
    this.idAlunoFator = idAlunoFator;
  }

  public int getSerieEmCurso() {
    return serieEmCurso;
  }

  public void setSerieEmCurso(int serieEmCurso) {
    this.serieEmCurso = serieEmCurso;
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
