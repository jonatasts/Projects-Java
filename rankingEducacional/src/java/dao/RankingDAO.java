package dao;

import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.Ranking;

public class RankingDAO {

    IDatabase banco = IDatabase.getDatabase();
    Connection conexao;

    public RankingDAO(Connection connection) {
        try {
            conexao = banco.getConnection();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoFatorDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void insert(ArrayList<Ranking> rankings) throws SQLException {
        String deleteRanking = "DELETE FROM ranking";
        String insertRanking = "INSERT INTO ranking (idaluno, anoemcurso, pontuacao) VALUES (?,?,?);";

        PreparedStatement statement1 = conexao.prepareStatement(deleteRanking);
        PreparedStatement statement2 = conexao.prepareStatement(insertRanking);
        statement1.execute();

        for (Ranking ranking : rankings) {
            statement2.setInt(1, ranking.getIdAluno());
            statement2.setInt(2, ranking.getAnoEmCurso());
            statement2.setInt(3, ranking.getPontuacao());
            statement2.execute();
        }
        conexao.close();
    }

    public ArrayList<Ranking> select() throws SQLException {
        String sql = "SELECT * FROM ranking ORDER BY pontuacao DESC";
        ArrayList<Ranking> rankings = new ArrayList<>();

        ResultSet resultSet;
        try (PreparedStatement statement = conexao.prepareStatement(sql)) {
            resultSet = statement.executeQuery();
            while (resultSet.next()) {
                Ranking ranking = new Ranking();

                ranking.setIdAluno(resultSet.getInt("idaluno"));
                ranking.setAnoEmCurso(resultSet.getInt("anoemcurso"));
                ranking.setPontuacao(resultSet.getInt("pontuacao"));

                rankings.add(ranking);
            }
        }
        resultSet.close();
        conexao.close();
        return rankings;
    }
}
