package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import java.util.ArrayList;
import java.sql.ResultSet;
import java.sql.PreparedStatement;
import controllers.*;
import model.*;
import dao.*;
import java.sql.DriverManager;
import java.sql.Connection;

public final class gerarRanking_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html;charset=UTF-8");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <title>Ranking Educacional</title>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("        ");

            Class.forName("org.postgresql.Driver");
            String url = "jdbc:postgresql://localhost:5432/prototipoEducacional";
            String usuario = "postgres";
            String senha = "000000";
            Connection conexao = DriverManager.getConnection(url, usuario, senha);

            RankingController rankingController = new RankingController();
            RankingDAO rankingDAO = new RankingDAO(conexao);
            ArrayList ranking = new ArrayList<>();

            rankingController.gerarRanking();
            ranking = rankingController.verificaObservacao(rankingDAO.select());

            try {
                out.println("<h1>Ranking Educacional</h1>");
                out.print("<b>Matricula&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;Ano&nbsp;&nbsp;|&nbsp;Pontuacao</b>");

                for (Object rk : ranking) {
                    Ranking rank = (Ranking) rk;
                    if (rank.getObservacao()) {
                        out.println(rank.toString() + " *");
                    } else {
                        out.println(rank.toString());
                    }
                }

            } catch (RuntimeException erro) {
                throw new RuntimeException("Erro gerar ranking: " + erro);
            }

            
            
      out.write("\n");
      out.write("    </body>\n");
      out.write("</html>\n");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
