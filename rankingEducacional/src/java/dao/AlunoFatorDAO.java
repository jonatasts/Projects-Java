package dao;

import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import model.AlunoFator;

public class AlunoFatorDAO {

  private IDatabase banco = IDatabase.createDatabase();
  private ResultSet resultSet;
  private PreparedStatement preparedStatement;
  private Statement statement;
  private Connection conexao;

  public AlunoFatorDAO() throws SQLException {
    try {
      conexao = banco.getConnection();
    } catch (RuntimeException erro) {
      throw new RuntimeException(
        "Erro conexão com banco em AlunoFatorDAO: " + erro
      );
    }
  }

  public void insert(ArrayList<AlunoFator> alunosFatores) throws SQLException {
    String insertAlunoFator =
      "INSERT INTO aluno_fator (aluno_id, fator_id, resposta) 
       VALUES (?,?,?), (?,?,?), (?,?,?), (?,?,?), (?,?,?),
       (?,?,?), (?,?,?), (?,?,?), (?,?,?), (?,?,?),
       (?,?,?), (?,?,?), (?,?,?), (?,?,?), (?,?,?),
       (?,?,?), (?,?,?), (?,?,?), (?,?,?), (?,?,?),
       (?,?,?), (?,?,?), (?,?,?), (?,?,?), (?,?,?),
       (?,?,?), (?,?,?), (?,?,?), (?,?,?), (?,?,?);";

    preparedStatement = conexao.prepareStatement(insertAlunoFator);

    try {
      int value = 1;

      for (int i = 0; i < 30; i++) {
        int positionAlunoId = value;
        int positionFatorId = value + 1;
        int positionPontuacao = value + 2;

        preparedStatement.setString(
          positionAlunoId,
          alunosFatores[0].getMatriculaAluno()
        );
        preparedStatement.setString(
          positionFatorId,
          alunosFatores[i].getFatorId()
        );
        preparedStatement.setInt(
          positionPontuacao,
          alunosFatores[i].getResposta()
        );

        value += 2;
      }

      preparedStatement.execute();
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro insert: " + erro);
    }
  }

  public ArrayList<AlunoFator> select() throws SQLException {
    String sql = "SELECT * FROM aluno_fator";
    ArrayList<AlunoFator> alunoFatores = new ArrayList<>();

    try {
      preparedStatement = conexao.prepareStatement(sql);
      resultSet = preparedStatement.executeQuery();

      while (resultSet.next()) {
        AlunoFator alunoFator = new AlunoFator();

        alunoFator.setMatriculaAluno(resultSet.getString("aluno_id"));
        alunoFator.setFatorId(resultSet.getString("fator_id"));
        alunoFator.setResposta(resultSet.getInt("resposta"));

        alunoFatores.add(alunoFator);
      }
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro select: " + erro);
    }

    resultSet.close();
    conexao.close();
    return alunoFatores;
  }

  public AlunoFator selectAlunoFatorByMatricula(String matricula)
    throws SQLException {
    String sql = "SELECT * FROM aluno_fator WHERE aluno_id = ?";
    int pontuacao = 0;
    AlunoFator alunoFator = new AlunoFator();

    try {
      preparedStatement = conexao.prepareStatement(sql);
      preparedStatement.setString(1, matricula);
      resultSet = preparedStatement.executeQuery();

      if (resultSet.next()) {
        alunoFator.setMatriculaAluno(resultSet.getString("aluno_id"));
        alunoFator.setFatorId(resultSet.getString("fator_id"));
        alunoFator.setResposta(resultSet.getInt("resposta"));
      }
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro select by matricula: " + erro);
    }

    //resultSet.close();
    conexao.close();
    return alunoFator;
  }

  public void update(AlunoFator alunoFator) throws SQLException {
    String updateAlunoFator =
      "UPDATE aluno_fator SET fator_id = ?, resposta = ? WHERE aluno_id = ?";

    preparedStatement = conexao.prepareStatement(updateAlunoFator);

    try {
      preparedStatement.setString(1, alunoFator.getFatorId());
      preparedStatement.setInt(2, alunoFator.getResposta());

      preparedStatement.setString(3, alunoFator.getMatriculaAluno());

      preparedStatement.execute();
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro update: " + erro);
    }
  }

  public void delete(String matricula) throws SQLException {
    String deleteAlunoFatorRanking =
      "DELETE FROM ranking WHERE id_aluno_fator = ?";
    String deleteAlunoFator = "DELETE FROM aluno_fator WHERE aluno_id = ?";
    PreparedStatement preparedStmt;

    try {
      preparedStmt = conexao.prepareStatement(deleteAlunoFatorRanking);
      preparedStmt.setString(1, matricula);
      preparedStmt.execute();

      preparedStatement = conexao.prepareStatement(deleteAlunoFator);
      preparedStatement.setString(1, matricula);
      preparedStatement.execute();

      conexao.close();
    } catch (RuntimeException erro) {
      throw new RuntimeException("Erro Delete: " + erro);
    }
  }
}
