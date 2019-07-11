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
import model.AlunoFator;

public class AlunoFatorDAO {

    private IDatabase banco = IDatabase.getDatabase();
    private ResultSet resultSet;
    private PreparedStatement preparedStatement;
    private Statement statement;
    private Connection conexao;

    public AlunoFatorDAO() {
        try {
            conexao = banco.getConnection();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoFatorDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
     public void insert(AlunoFator alunoFator) throws SQLException {
        String insertAluno = "INSERT INTO alunofator (matriculaaluno, anoemCurso, anoletivo, pf1, pf2, pf3 , pf4, "
                           + "pf5, pf6, pf7, pf8, pf9, pf10, pf11, pf12, pf13, pf14, pf15, pf16, pf17, pf18, pf19, "
                           + "pf20, pf21, pf22, pf23, pf24, pf25, pf26, pf27, pf28, pf29, pf30) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        preparedStatement = conexao.prepareStatement(insertAluno);

        try {
            preparedStatement.setInt(1, alunoFator.getMatriculaAluno());
            preparedStatement.setInt(2, alunoFator.getAnoEmCurso());
            preparedStatement.setInt(3, alunoFator.getAnoLetivo());
            
            for (int i = 0; i < 30; i++) {
                 preparedStatement.setInt(i+4,alunoFator.getFatores(i));
            }
            
            preparedStatement.execute();
            conexao.close();
        } catch (RuntimeException erro) {
            throw new RuntimeException("Erro insert: " + erro);
        }

    }

    public ArrayList<AlunoFator> select() throws SQLException {
        String sql = "SELECT * FROM alunoFator";
        ArrayList<AlunoFator> alunoFatores = new ArrayList<>();

        try {
            statement = conexao.createStatement();
            resultSet = statement.executeQuery(sql);
            while (resultSet.next()) {
                AlunoFator alunoFator = new AlunoFator();

                alunoFator.setMatriculaAluno(resultSet.getInt("matriculaaluno"));
                alunoFator.setAnoEmCurso(resultSet.getInt("anoEmCurso"));
                alunoFator.setAnoLetivo(resultSet.getInt("anoLetivo"));
                
                for (int i = 0; i < 30; i++) {
                 alunoFator.setFatores(i, (resultSet.getInt(i+3)));
            }
                
                alunoFatores.add(alunoFator);
            }

        } catch (SQLException ex) {
            Logger.getLogger(AlunoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }

        resultSet.close();
        conexao.close();
        return alunoFatores;
    }
}
