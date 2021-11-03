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
    <?php

    try {
        //     $redirectURL = "sucesso.jsp";
        //     $matricula = request.getParameter("matricula");
        //     $serieEmCurso = Integer.parseInt(request.getParameter("serie_em_curso"));
        //     $anoLetivo = Integer.parseInt(request.getParameter("ano_letivo"));
        //     $alunoDAO = new AlunoDAO();
        //     $alunoFatorDAO = new AlunoFatorDAO();
        //     $aluno = new Aluno();
        //     $alunoFator = new AlunoFator();
        //     $alunosFatores = [];

        //     for ($i = 0; $i < 30; $i++) {
        //         $alunoFatorIterable = new AlunoFator();

        //         alunoFatorIterable.setMatriculaAluno(matricula);
        //         alunoFatorIterable.setFatorId("fator" + (i + 1));
        //         alunoFatorIterable.setResposta(Integer.parseInt(request.getParameter("fator" + (i + 1))));

        //         alunosFatores.add(alunoFatorIterable);
        //     }

        //     aluno.setMatriculaAluno(matricula);
        //     aluno.setSerieEmCurso(serieEmCurso);
        //     aluno.setAnoLetivo(anoLetivo);
        //     aluno.setObservacao(java.net.URLDecoder.decode(((String[])request.getParameterMap().get("observacao"))[0], "UTF-8"));

        //     alunoDAO.insert(aluno);
        //     alunoFatorDAO.insert(alunosFatores);

        //     request.getRequestDispatcher(redirectURL).forward(request, response);
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
    ?>
</body>

</html>