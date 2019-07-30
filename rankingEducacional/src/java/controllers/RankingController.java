package controllers;

import dao.RankingDAO;
import java.sql.SQLException;
import java.util.ArrayList;
import model.AlunoFator;
import model.Fator;
import model.Ranking;

public class RankingController {

    public RankingController() {
    }

    public void gerarRanking() throws SQLException {
        AlunoFatorController AlunoFatorController = new AlunoFatorController();
        FatorController fatorController = new FatorController();
        ArrayList<Ranking> rankings = new ArrayList();

        ArrayList<AlunoFator> alunoFatores = AlunoFatorController.listarPontuacaoAluno();
        ArrayList<Fator> fatoresBanco = fatorController.listarFatores();

        for (AlunoFator alunoFator : alunoFatores) {
            rankings.add(calculaPontuacao(new Ranking(), alunoFator, fatoresBanco));
        }
        inserirRankingBanco(rankings);
    }

    private Ranking calculaPontuacao(Ranking ranking, AlunoFator alunoFator, ArrayList<Fator> fatoresBanco) throws SQLException {
        int resultado = 0;
        int[] pontosPontuacao = alunoFator.getFatores();

        for (int i = 0; i < pontosPontuacao.length; i++) {
            if (pontosPontuacao[i] > 0) {
                resultado += fatoresBanco.get(i).getPeso();
            }
        }

        ranking.setIdAluno(alunoFator.getMatriculaAluno());
        ranking.setAnoEmCurso(alunoFator.getAnoEmCurso());
        ranking.setPontuacao(resultado);
        return ranking;
    }

    private void inserirRankingBanco(ArrayList<Ranking> rankings) throws SQLException {
        RankingDAO rankingDAO = new RankingDAO();
        rankingDAO.insert(rankings);
    }

    public ArrayList<Ranking> verificaObservacao(ArrayList<Ranking> rankingBanco) throws SQLException {
        AlunoFatorController AlunoFatorController = new AlunoFatorController();
        ArrayList<AlunoFator> alunoFatores = new ArrayList();
        ArrayList<Ranking> rankings = new ArrayList();
        
        alunoFatores = AlunoFatorController.listarPontuacaoAluno();

        for (Ranking ranking : rankingBanco) {
            rankings.add(insereObservacao(ranking, alunoFatores));
        }
        return rankings;
    }

    private Ranking insereObservacao(Ranking ranking, ArrayList<AlunoFator> alunoFatores) {
        int[] pontos;
        for (AlunoFator alunoFator : alunoFatores) {
            if (ranking.getIdAluno() == (alunoFator.getMatriculaAluno())) {
                pontos = alunoFator.getFatores();
                for (int i = 0; i < pontos.length; i++) {
                    if (pontos[i] < 0) {
                        ranking.setObservacao(true);
                        break;
                    }
                }
                break;
            }
        }
        return ranking;
    }

}
