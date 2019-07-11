package controllers;

import dao.AlunoDAO;
import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.ArrayList;
import model.Aluno;

public class AlunoController {
    
    public AlunoController() {
    }
    
    public ArrayList<Aluno> listarAlunos() throws SQLException {
        ArrayList<Aluno> alunos;
        IDatabase banco = IDatabase.getDatabase();
        
        try (Connection conexao = banco.getConnection()) {
            AlunoDAO alunoDao = new AlunoDAO();
            alunos = new ArrayList<>();
            alunos = alunoDao.select();
        }    
        return alunos;
    }
}
