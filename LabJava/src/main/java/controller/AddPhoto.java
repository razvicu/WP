package main.java.controller;

import main.java.model.Authenticator;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class AddPhoto extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        try {
            String sqlQuery = "INSERT INTO photos(userId, title, votes, url) VALUES (?, ?, ?, ?)";
            Authenticator authenticator = new Authenticator();
            System.out.println(request.getParameter("username"));
            PreparedStatement preparedStatement = authenticator.getConnection().prepareStatement(sqlQuery);
            preparedStatement.setInt(1, getUserId(request.getParameter("username")));
            preparedStatement.setString(2, request.getParameter("title"));
            preparedStatement.setInt(3, 0);
            preparedStatement.setString(4, request.getParameter("url"));
            System.out.println(preparedStatement.toString());
            preparedStatement.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    private Integer getUserId(String username) {
        try {
            String sqlUsernameQuery = "SELECT id FROM users WHERE username = ?";
            Authenticator authenticator = new Authenticator();
            PreparedStatement preparedStatement = authenticator.getConnection().prepareStatement(sqlUsernameQuery);
            preparedStatement.setString(1, username);
            ResultSet resultSet = preparedStatement.executeQuery();

            if (resultSet.next()) {
                return resultSet.getInt(1);
            }

        }catch(SQLException e) {
            e.printStackTrace();
        }
        return -1;
    }
}
