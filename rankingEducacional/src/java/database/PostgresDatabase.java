package database;

import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class PostgresDatabase extends IDatabase {

    private static PostgresDatabase instance = null;

    private PostgresDatabase() {
    }

    public static PostgresDatabase getInstance() {
        if (instance == null) {
            instance = new PostgresDatabase();
        }
        return instance;
    }

    @Override
    public Connection getConnection() throws SQLException {
        try {
            Class.forName("org.postgresql.Driver");
            String url = "jdbc:postgresql://localhost:5432/rankingeducacional";
            String usuario = "postgres";
            String senha = "000000";
            return DriverManager.getConnection(url, usuario, senha);
        } catch (ClassNotFoundException | SQLException erro) {
            throw new RuntimeException("Erro de conexao: " + erro);
        }
    }
}
