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
import model.Fator;

public class FatorDAO {

    private IDatabase banco = IDatabase.createDatabase();
    private ResultSet resultSet;
    private PreparedStatement preparedStatement;
    private Statement statement;
    private Connection conexao;

    public FatorDAO() {
        try {
            conexao = banco.getConnection();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoFatorDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList<Fator> select() throws SQLException {
        String sql = "SELECT * FROM fator";
        ArrayList<Fator> fatores = new ArrayList<>();

        preparedStatement = conexao.prepareStatement(sql);
        resultSet = preparedStatement.executeQuery();
        while (resultSet.next()) {
            Fator fator = new Fator();

            fator.setId(resultSet.getString("id"));
            fator.setDescricao(resultSet.getString("descricao"));
            fator.setPeso(resultSet.getInt("peso"));

            fatores.add(fator);
        }

        resultSet.close();
        conexao.close();
        return fatores;
    }
}
