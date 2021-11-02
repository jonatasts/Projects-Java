<!-- <%@page import="java.io.PrintStream"%>
<%@page import="java.util.ArrayList"%>
<%@page import="model.Aluno"%>
<%@page import="model.AlunoFator"%>
<%@page import="dao.AlunoFatorDAO"%>
<%@page import="dao.AlunoDAO"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%> -->
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" />
    <meta charset="utf-8">
    <title>Insere Aluno</title>
</head>

<body>
    <!-- try {
                String redirectURL = "sucesso.jsp";
                String matricula = request.getParameter("matricula");
                int serieEmCurso = Integer.parseInt(request.getParameter("serie_em_curso"));
                int anoLetivo = Integer.parseInt(request.getParameter("ano_letivo"));
                AlunoDAO alunoDAO = new AlunoDAO();
                AlunoFatorDAO alunoFatorDAO = new AlunoFatorDAO();
                Aluno aluno = new Aluno();
                AlunoFator alunoFator = new AlunoFator();
                ArrayList<AlunoFator> alunosFatores = new ArrayList<AlunoFator>();

                for (int i = 0; i < 30; i++) {
                    AlunoFator alunoFatorIterable = new AlunoFator();

                    alunoFatorIterable.setMatriculaAluno(matricula);
                    alunoFatorIterable.setFatorId("fator" + (i + 1));
                    alunoFatorIterable.setResposta(Integer.parseInt(request.getParameter("fator" + (i + 1))));

                    alunosFatores.add(alunoFatorIterable);
                }
                
                aluno.setMatriculaAluno(matricula);
                aluno.setSerieEmCurso(serieEmCurso);
                aluno.setAnoLetivo(anoLetivo);
                aluno.setObservacao(java.net.URLDecoder.decode(((String[])request.getParameterMap().get("observacao"))[0], "UTF-8"));
                
                alunoDAO.insert(aluno);
                alunoFatorDAO.insert(alunosFatores);
                
                request.getRequestDispatcher(redirectURL).forward(request, response);
            } catch (RuntimeException erro) {
                throw new RuntimeException("Erro insert aluno e fator: " + erro);
            } -->
</body>

</html>