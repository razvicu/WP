package controller;

import model.Authenticator;

import javax.servlet.ServletException;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;

public class LoginController extends HttpServlet {

    public LoginController() {
        super();
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws IOException {
        String username = request.getParameter("username");
        String password = request.getParameter("password");
        Cookie cookie = new Cookie("username", username);

        Authenticator authenticator = new Authenticator();
        boolean result = authenticator.authenticate(username, password);
        response.addCookie(cookie);
        if (result) {
            request.getSession().setAttribute("username", username);
            response.sendRedirect("/index.jsp");
            return;
        }
        response.sendRedirect("/login.html?error=invalidUser");
    }
}