package main.java.model;

import java.sql.*;

public class Authenticator {
    private PreparedStatement preparedStatement;
    private Connection connection;

    public Authenticator() {
        connect();
    }

    private void connect() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/voting", "root", "");
        } catch(Exception e) {
            System.out.println("Connection error: " + e.getMessage());
            e.printStackTrace();
        }
    }

    public Connection getConnection() {
        if ( connection == null )
            connect();
        return connection;
    }

    public boolean authenticate(String username, String password) {
        ResultSet rs;
        boolean result = false;
        System.out.println(username + " " + password);
        try {
            preparedStatement = connection.prepareStatement("SELECT * FROM users WHERE username = ?");
            preparedStatement.setString(1, username);
            rs = preparedStatement.executeQuery();
            if (rs.next() && rs.getString("password").equals(password))
                result = true;
            rs.close();
        }catch(SQLException e) {
            e.printStackTrace();
        }
        return result;
    }
}
