package controllers;

import dao.AlunoFatorDAO;
import interfaces.IDatabase;
import java.sql.Connection;
import java.sql.SQLException;
import java.util.ArrayList;
import model.AlunoFator;

public class AlunoFatorController {

    public AlunoFatorController() {
    }
    
    public ArrayList<AlunoFator> listarPontuacaoAluno() throws SQLException {
        ArrayList<AlunoFator> alunoFatores;
        
            AlunoFatorDAO alunoFatorDAO = new AlunoFatorDAO();
            alunoFatores = new ArrayList();
            alunoFatores = alunoFatorDAO.select();

            return alunoFatores;
    }
}
