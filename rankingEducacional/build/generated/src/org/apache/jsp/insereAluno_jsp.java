package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import model.AlunoFator;
import dao.AlunoFatorDAO;
import java.sql.DriverManager;
import java.sql.Connection;

public final class insereAluno_jsp extends org.apache.jasper.runtime.HttpJspBase
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
      out.write("<!DOCTYPE html>\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n");
      out.write("        <title>Insere Aluno</title>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("        ");

            Class.forName("org.postgresql.Driver");
            String url = "jdbc:postgresql://localhost:5432/prototipoEducacional";
            String usuario = "postgres";
            String senha = "000000";
            Connection conexao = DriverManager.getConnection(url, usuario, senha);

            try {
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

            } catch (RuntimeException erro) {
                throw new RuntimeException("Erro insert aluno e fator: " + erro);
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
