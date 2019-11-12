<%-- 
    Document   : editar_aluno
    Created on : 11/11/2019, 18:36:17
    Author     : Aluno
--%>

<%@page import="model.AlunoFator"%>
<%@page import="dao.AlunoFatorDAO"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
            
            //Verificar a pagina de add aluno fator parar criar a parte de alteração
            //Criar a pagina de remoção e exibir para as duas ações uma tela igual a de sucesso.jsp
            AlunoFatorDAO alunoFatorDAO = new AlunoFatorDAO();
            AlunoFator alunoFator = new AlunoFator();

            alunoFator.setMatriculaAluno(request.getParameter("matricula"));

            if (request.getParameter("btn").equalsIgnoreCase("alterar")) {
                request.getRequestDispatcher("RegistradorController").forward(request, response);
            } else {
                request.getRequestDispatcher("ObtemLucro.jsp").forward(request, response);
            }
        %>
    </body>
</html>
