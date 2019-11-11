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
            AlunoFatorDAO alunoFatorDAO = new AlunoFatorDAO();
            AlunoFator alunoFator = new AlunoFator();
            
            alunoFator.setMatriculaAluno((request.getParameter("matricula")));
        %>
    </body>
</html>
