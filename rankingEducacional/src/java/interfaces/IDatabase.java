package interfaces;

import database.PostgresDatabase;
import java.sql.Connection;
import java.sql.SQLException;

public abstract class IDatabase {
    public static IDatabase createDatabase(){
        return PostgresDatabase.getInstance();
    }
    
    public abstract Connection getConnection() throws SQLException;
}
