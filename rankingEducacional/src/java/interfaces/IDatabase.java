package interfaces;

import database.PostgresDatabase;
import java.sql.Connection;
import java.sql.SQLException;

public abstract class IDatabase {
    public static IDatabase getDatabase(){
        return PostgresDatabase.getInstance();
    }
    
    public abstract Connection getConnection() throws SQLException;
}
