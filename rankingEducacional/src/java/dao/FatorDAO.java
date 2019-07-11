package dao;

import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import model.Fator;

public class FatorDAO {

    IDatabase banco = IDatabase.getDatabase();
    Connection conexao;

    public FatorDAO(Connection connection) {
        try {
            conexao = banco.getConnection();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoFatorDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList<Fator> select() throws SQLException {
        String sql = "SELECT * FROM fator";
        ArrayList<Fator> fatores = new ArrayList<>();

        ResultSet resultSet;
        try (PreparedStatement statement = conexao.prepareStatement(sql)) {
            resultSet = statement.executeQuery();
            while (resultSet.next()) {
                Fator fator = new Fator();

                fator.setId(resultSet.getString("id"));
                fator.setDescricao(resultSet.getString("descricao"));
                fator.setPeso(resultSet.getInt("peso"));

                fatores.add(fator);
            }
        }
        resultSet.close();
        conexao.close();
        return fatores;
    }
}
