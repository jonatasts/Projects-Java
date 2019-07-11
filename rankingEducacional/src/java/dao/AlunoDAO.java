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
import model.Aluno;

public class AlunoDAO {

    private IDatabase banco = IDatabase.getDatabase();
    private PreparedStatement preparedStatement;
    private Statement statement;
    private ResultSet resultSet;
    private Connection conexao;

    public AlunoDAO() {
        try {
            conexao = banco.getConnection();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void insert(Aluno aluno) throws SQLException {
        String insertAluno = "INSERT INTO Aluno (matricula, nome, sexo) VALUES (?,?,?)";
        preparedStatement = conexao.prepareStatement(insertAluno);

        try {
            preparedStatement.setInt(1, aluno.getMatricula());
            preparedStatement.setString(2, aluno.getNome());
            preparedStatement.setString(3, aluno.getSexo());
            preparedStatement.execute();
            conexao.close();
        } catch (RuntimeException erro) {
            throw new RuntimeException("Erro insert: " + erro);
        }

    }

    public void update(Aluno aluno) {
        String insertAluno = "UPDATE Aluno SET nome = ? WHERE matricula = ?";

        try {
            preparedStatement = conexao.prepareStatement(insertAluno);
            preparedStatement.setString(1, aluno.getNome());
            preparedStatement.setInt(2, aluno.getMatricula());
            preparedStatement.execute();
            conexao.close();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public ArrayList<Aluno> select() throws SQLException {
        String sql = "SELECT * FROM aluno";
        ArrayList<Aluno> alunos = new ArrayList<>();

        try {
            statement = conexao.createStatement();
            resultSet = statement.executeQuery(sql);

            while (resultSet.next()) {
                Aluno aluno = new Aluno();

                aluno.setMatricula(resultSet.getInt("matricula"));
                aluno.setNome(resultSet.getString("nome"));
                aluno.setSexo(resultSet.getString("sexo"));
                alunos.add(aluno);
            }
        } catch (SQLException ex) {
            Logger.getLogger(AlunoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }

        resultSet.close();
        conexao.close();
        return alunos;
    }

    public ArrayList<Aluno> selectByNome(String nome) throws SQLException {
        String sql = "SELECT * FROM aluno WHERE nome ILIKE '?%'";
        ArrayList<Aluno> alunos = new ArrayList<>();

        try {
            statement = conexao.createStatement();
            resultSet = statement.executeQuery(sql);

            while (resultSet.next()) {
                Aluno aluno = new Aluno();

                aluno.setMatricula(resultSet.getInt("matricula"));
                aluno.setNome(resultSet.getString("nome"));
                aluno.setSexo(resultSet.getString("sexo"));
                alunos.add(aluno);
            }
        } catch (SQLException ex) {
            Logger.getLogger(AlunoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }

        resultSet.close();
        conexao.close();
        return alunos;
    }

    public void delete(int matricula) {
        String sql = "DELETE * FROM aluno WHERE matricula = " + matricula;

        try {
            statement = conexao.createStatement();
            statement.execute(sql);
            statement.close();
            conexao.close();
        } catch (SQLException ex) {
            Logger.getLogger(AlunoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
