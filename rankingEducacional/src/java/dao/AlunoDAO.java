package dao;

import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import model.Aluno;

public class AlunoDAO {

  private IDatabase banco = IDatabase.createDatabase();
  private ResultSet resultSet;
  private PreparedStatement preparedStatement;
  private Statement statement;
  private Connection conexao;

  public AlunoDAO() throws SQLException {
    try {
      conexao = banco.getConnection();
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro conexão com banco em AlunoDAO: " + erro);
    }
  }

  public void insert(Aluno aluno) throws SQLException {
    String insertAluno =
      "INSERT INTO aluno (matricula, serie_em_curso, ano_letivo, observacao) VALUES (?,?,?,?)";

    preparedStatement = conexao.prepareStatement(insertAluno);

    try {
      preparedStatement.setString(1, aluno.getMatriculaAluno());
      preparedStatement.setInt(2, aluno.getSerieEmCurso());
      preparedStatement.setInt(3, aluno.getAnoLetivo());
      preparedStatement.setString(4, aluno.getObservacao());

      preparedStatement.execute();
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro insert: " + erro);
    }
  }

  public ArrayList<Aluno> select() throws SQLException {
    String sql = "SELECT * FROM aluno";
    ArrayList<Aluno> alunos = new ArrayList<>();

    try {
      preparedStatement = conexao.prepareStatement(sql);
      resultSet = preparedStatement.executeQuery();

      while (resultSet.next()) {
        Aluno aluno = new Aluno();

        aluno.setMatriculaAluno(resultSet.getString("matricula"));
        aluno.setSerieEmCurso(resultSet.getInt("serie_em_curso"));
        aluno.setAnoLetivo(resultSet.getInt("ano_letivo"));
        aluno.setObservacao(resultSet.getString("observacao"));

        alunos.add(aluno);
      }
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro select: " + erro);
    }

    resultSet.close();
    conexao.close();
    return alunos;
  }

  public Aluno selectAlunoByMatricula(String matricula) throws SQLException {
    String sql = "SELECT * FROM aluno WHERE matricula = ?";
    int pontuacao = 0;
    Aluno aluno = new Aluno();

    try {
      preparedStatement = conexao.prepareStatement(sql);
      preparedStatement.setString(1, matricula);
      resultSet = preparedStatement.executeQuery();

      if (resultSet.next()) {
        aluno.setMatriculaAluno(resultSet.getString("matricula"));
        aluno.setSerieEmCurso(resultSet.getInt("serie_em_curso"));
        aluno.setAnoLetivo(resultSet.getInt("ano_letivo"));
        aluno.setObservacao(resultSet.getString("observacao"));
      }
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro select by matricula: " + erro);
    }

    resultSet.close();
    conexao.close();
    return aluno;
  }

  public void update(Aluno aluno) throws SQLException {
    String updateAluno =
      "UPDATE aluno SET serie_em_curso = ?, ano_letivo = ?, observacao = ? WHERE matricula = ?";

    preparedStatement = conexao.prepareStatement(updateAluno);

    try {
      preparedStatement.setInt(1, aluno.getSerieEmCurso());
      preparedStatement.setInt(2, aluno.getAnoLetivo());
      preparedStatement.setString(3, aluno.getObservacao());

      preparedStatement.setString(34, aluno.getMatriculaAluno());

      preparedStatement.execute();
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro update: " + erro);
    }
  }

  public void delete(String matricula) throws SQLException {
    String deleteAlunoRanking = "DELETE FROM ranking WHERE id_aluno = ?";
    String deleteAluno = "DELETE FROM aluno WHERE matricula = ?";
    PreparedStatement preparedStmt;

    try {
      preparedStmt = conexao.prepareStatement(deleteAlunoRanking);
      preparedStmt.setString(1, matricula);
      preparedStmt.execute();

      preparedStatement = conexao.prepareStatement(deleteAluno);
      preparedStatement.setString(1, matricula);
      preparedStatement.execute();

      conexao.close();
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro Delete: " + erro);
    }
  }
}
