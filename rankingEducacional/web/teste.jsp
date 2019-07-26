<%-- 
    Document   : teste
    Created on : 26/06/2019, 15:08:51
    Author     : qt
--%>

<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.PreparedStatement"%>
<%@page import="model.AlunoFator"%>
<%@page import="dao.AlunoFatorDAO"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
//            String matricula = request.getParameter("matricula");
//            int ano_corrente = Integer.parseInt(request.getParameter("ano_corrente"));
//            int ano_letivo = Integer.parseInt(request.getParameter("ano_letivo"));
//            out.println("Matrícula: " + matricula + "<br>");
//            out.println("Ano Corrente: " + ano_corrente + "<br>");
//            out.println("Ano Letivo " + ano_letivo + "° <br>");
//            for (int i = 0; i < 30; i++) {
//                String s = request.getParameter("fator" + (i + 1));
//                out.println("Fator " + (i + 1) + ": " + s + "<br>");
//            }

            Class.forName("org.postgresql.Driver");
            String url = "jdbc:postgresql://localhost:5432/prototipoEducacional";
            String usuario = "postgres";
            String senha = "000000";
            Connection conexao = DriverManager.getConnection(url, usuario, senha);
            
            try{
                AlunoFatorDAO alunoFatorDAO = new AlunoFatorDAO();
                AlunoFator alunoFator = new AlunoFator();
                int[] pontos = new int[30];
                
                for (int i = 0; i < 30; i++) {
                        pontos[i] = Integer.parseInt(request.getParameter("fator" + (i + 1)));
                }
                
                alunoFator.setMatriculaAluno(Integer.parseInt(request.getParameter("matricula")));
                alunoFator.setAnoEmCurso(Integer.parseInt(request.getParameter("ano_corrente")));
                alunoFator.setAnoLetivo(Integer.parseInt(request.getParameter("ano_letivo")));
                alunoFator.setFatores(pontos);
                alunoFatorDAO.insert(alunoFator);
                
            } catch (Exception e) {
                e.printStackTrace();
            }

            try {
                String sql = "SELECT * FROM alunofator";

                PreparedStatement preparedstatementSelect = conexao.prepareStatement(sql);
                ResultSet resultSet = preparedstatementSelect.executeQuery();
                
                out.print("Matricula  | Ano em Curso | Ano Letivo |                      Pontos");
                while (resultSet.next()) {
                %>
                    <p><%= resultSet.getInt("matriculaaluno") + " | " + resultSet.getInt("anoEmCurso") + " | " + resultSet.getString("anoLetivo")
                           + " | " + resultSet.getInt("pf1") +" "+  resultSet.getInt("pf2") +" "+ resultSet.getInt("pf3") +" "+ resultSet.getInt("pf4") 
                           + resultSet.getInt("pf5") +" "+ resultSet.getInt("pf6") +" "+ resultSet.getInt("pf7") +" "+ resultSet.getInt("pf8")
                           + resultSet.getInt("pf9") +" "+ resultSet.getInt("pf10") +" "+ resultSet.getInt("pf11") +" "+ resultSet.getInt("pf12")
                           + resultSet.getInt("pf13") +" "+ resultSet.getInt("pf14") +" "+ resultSet.getInt("pf15") +" "+ resultSet.getInt("pf16")
                           + resultSet.getInt("pf17") +" "+ resultSet.getInt("pf18") +" "+ resultSet.getInt("pf19") +" "+ resultSet.getInt("pf20")
                           + resultSet.getInt("pf21") +" "+ resultSet.getInt("pf22") +" "+ resultSet.getInt("pf23") +" "+ resultSet.getInt("pf24")
                           + resultSet.getInt("pf25") +" "+ resultSet.getInt("pf26") +" "+ resultSet.getInt("pf27") +" "+ resultSet.getInt("pf28")
                           + resultSet.getInt("pf29") +" "+ resultSet.getInt("pf30")%><p>
                <%
                }
                resultSet.close();
            } catch (Exception e) {
                e.printStackTrace();
            }
        %>
        
        
        <%
            // select Ranking do Banco de Dados
            try {
                String sql = "SELECT * FROM ranking ORDER BY pontuacao DESC";

                PreparedStatement preparedstatementSelect = conexao.prepareStatement(sql);
                ResultSet resultSet = preparedstatementSelect.executeQuery();

                out.println("<h1>Ranking Educacional</h1>");
                out.print("<b>Matricula&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;Ano&nbsp;&nbsp;|&nbsp;Pontuacao</br>");
                while (resultSet.next()) {
        %>
                    <p><%= resultSet.getInt("idaluno") + " | " + resultSet.getInt("anoemcurso") + " | " + resultSet.getString("pontuacao")%><p>
            <%
                }
                    resultSet.close();
            } catch (RuntimeException erro) {
                    throw new RuntimeException("Erro select ranking: " + erro);
              }
        %>
    </body>
</html>
