<%-- 
    Document   : gerarRanking
    Created on : 05/07/2019, 23:13:53
    Author     : Jhon
--%>

<%@page import="java.util.List"%>
<%@page import="java.util.ArrayList"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="controllers.*"%>
<%@page import="model.*"%>
<%@page import="dao.*"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ranking Educacional</title>
    </head>
    <body>
        <%
            RankingController rankingController = new RankingController();
            RankingDAO rankingDAO = new RankingDAO();
            List<Ranking> ranking = new ArrayList(); 

            rankingController.gerarRanking();
            ranking = rankingController.verificaObservacao(rankingDAO.select());

            try {
                out.println("<h1>Ranking Educacional</h1>");
                out.print("<b>Matricula&nbsp;&nbsp;&nbsp;|&nbsp;Pontuacao</br>");

                for (Ranking rank : ranking) {
                    if (rank.getObservacao()) {
                        out.println("<p>" + rank.toString() + " *" + "</p>");
                    } else {
                        out.println("<p>" + rank.toString() + "</p>");
                    }
                }

            } catch (RuntimeException erro) {
                throw new RuntimeException("Erro gerar ranking: " + erro);
            }

            
            %>
    </body>
</html>
