package dao;

import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.Ranking;

public class RankingDAO {

    private IDatabase banco = IDatabase.createDatabase();
    private PreparedStatement preparedStatement;
    private Statement statement;
    private ResultSet resultSet;
    private Connection conexao;

    public RankingDAO() {
        try {
            conexao = banco.getConnection();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoFatorDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void insert(ArrayList<Ranking> rankings) throws SQLException {
        String limparRanking = "DELETE FROM ranking";
        String insertRanking = "INSERT INTO ranking (idaluno, anoemcurso, pontuacao) VALUES (?,?,?);";

        preparedStatement = conexao.prepareStatement(limparRanking);
        PreparedStatement preparedStatement2 = conexao.prepareStatement(insertRanking);
        preparedStatement.execute();

        for (Ranking ranking : rankings) {
            preparedStatement2.setString(1, ranking.getIdAluno());
            preparedStatement2.setInt(2, ranking.getAnoEmCurso());
            preparedStatement2.setInt(3, ranking.getPontuacao());
            preparedStatement2.execute();
        }
        conexao.close();
    }

    public ArrayList<Ranking> select() throws SQLException {
        String sql = "SELECT * FROM ranking ORDER BY pontuacao DESC";
        ArrayList<Ranking> rankings = new ArrayList<>();

        preparedStatement = conexao.prepareStatement(sql);
        resultSet = preparedStatement.executeQuery();

        while (resultSet.next()) {
            Ranking ranking = new Ranking();

            ranking.setIdAluno(resultSet.getString("idaluno"));
            ranking.setAnoEmCurso(resultSet.getInt("anoemcurso"));
            ranking.setPontuacao(resultSet.getInt("pontuacao"));

            rankings.add(ranking);
        }

        resultSet.close();
        conexao.close();
        return rankings;
    }

    public int selectPontuacaoByMatricula(String matricula) throws SQLException {
        String sql = "SELECT pontuacao FROM ranking WHERE idaluno = '"+ matricula +"'";
        int pontuacao = 0;

        try {
            statement = conexao.createStatement();
            resultSet = statement.executeQuery(sql);

            if(resultSet.next()) {
                pontuacao = resultSet.getInt("pontuacao");
            }

        } catch (SQLException ex) {
            Logger.getLogger(RankingDAO.class.getName()).log(Level.SEVERE, null, ex);
        }

        //resultSet.close();
        conexao.close();
        return pontuacao;
    }

}
