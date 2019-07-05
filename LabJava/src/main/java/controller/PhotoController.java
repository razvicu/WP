package main.java.controller;

import main.java.model.Authenticator;
import main.java.model.Photo;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class PhotoController extends HttpServlet {
    public PhotoController() {
        super();
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        String url = request.getParameter("url");
        String scoreValue = request.getParameter("score");
        Integer score = 0;
        try {
            score = Integer.parseInt(scoreValue);
        }catch(NumberFormatException e) {
            score = 0;
        }

        updateValue(url, score);

    }

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("application/json");
        List<Photo> photoList = new ArrayList<>();

        String type = request.getParameter("type");
        System.out.println(type);

        if (type.equals("all")) {
            try {
                String sqlQuery = "SELECT * FROM photos";
                Authenticator authenticator = new Authenticator();
                PreparedStatement preparedStatement = authenticator.getConnection().prepareStatement(sqlQuery);
                ResultSet resultSet = preparedStatement.executeQuery();

                while (resultSet.next()) {
                    photoList.add(new Photo(resultSet.getInt(1),
                            resultSet.getInt(2),
                            resultSet.getString(3),
                            resultSet.getInt(4),
                            resultSet.getString(5)
                    ));
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }

            JSONArray jsonArray = null;
            try {
                jsonArray = convertPhotosToJsonArray(photoList);
            } catch (JSONException e) {
                e.printStackTrace();
            }

            PrintWriter out = new PrintWriter(response.getOutputStream());
            out.println(jsonArray != null ? jsonArray.toString() : null);
            out.flush();
        }

        if (type.equals("top")) {
            try {
                Integer number = 0;
                try {
                    number = Integer.parseInt(request.getParameter("number"));
                }catch(NumberFormatException e) {
                    number = 0;
                }

                String sqlQuery = "SELECT * FROM photos ORDER BY votes DESC LIMIT ?";
                Authenticator authenticator = new Authenticator();
                PreparedStatement preparedStatement = authenticator.getConnection().prepareStatement(sqlQuery);
                preparedStatement.setInt(1, number);
                ResultSet resultSet = preparedStatement.executeQuery();

                while (resultSet.next()) {
                    photoList.add(new Photo(resultSet.getInt(1),
                            resultSet.getInt(2),
                            resultSet.getString(3),
                            resultSet.getInt(4),
                            resultSet.getString(5)
                    ));
                }
            } catch (SQLException e) {
                e.printStackTrace();
            }

            JSONArray jsonArray = null;
            try {
                jsonArray = convertPhotosToJsonArray(photoList);
            } catch (JSONException e) {
                e.printStackTrace();
            }

            PrintWriter out = new PrintWriter(response.getOutputStream());
            out.println(jsonArray != null ? jsonArray.toString() : null);
            out.flush();

        }

    }

    private JSONArray convertPhotosToJsonArray(List<Photo> photos) throws JSONException {
        JSONArray jsonArray = new JSONArray();
        for (Photo ph : photos) {
            JSONObject jsonObject = new JSONObject();
            jsonObject.put("id", ph.getId());
            jsonObject.put("username", getUsername(ph.getUserId()));
            jsonObject.put("title", ph.getTitle());
            jsonObject.put("votes", ph.getVotes());
            jsonObject.put("url", ph.getUrl());
            jsonArray.put(jsonObject);
        }
        return jsonArray;
    }



    private String getUsername(int id) {
        try {
            String sqlUsernameQuery = "SELECT username FROM users WHERE id = ?";
            Authenticator authenticator = new Authenticator();
            PreparedStatement preparedStatement = authenticator.getConnection().prepareStatement(sqlUsernameQuery);
            preparedStatement.setInt(1, id);
            ResultSet resultSet = preparedStatement.executeQuery();

            if (resultSet.next()) {
                return resultSet.getString(1);
            }

        }catch(SQLException e) {
            e.printStackTrace();
        }
        return "";
    }

    private Integer getPhotoId(String url) {
        try {
            String sqlQuery = "SELECT id FROM photos WHERE url = ?";
            Authenticator authenticator = new Authenticator();
            PreparedStatement preparedStatement = authenticator.getConnection().prepareStatement(sqlQuery);
            preparedStatement.setString(1, url);
            ResultSet resultSet = preparedStatement.executeQuery();

            if (resultSet.next()) {
                return resultSet.getInt(1);
            }

        }catch(SQLException e) {
            e.printStackTrace();
        }
        return 0;
    }

    private void updateValue(String url, Integer scoreValue) {
        try {
            System.out.println(url);
            System.out.println(scoreValue);
            String sqlQuery = "UPDATE photos SET votes = votes + ? WHERE url = ?";
            Authenticator authenticator = new Authenticator();
            PreparedStatement preparedStatement = authenticator.getConnection().prepareStatement(sqlQuery);
            preparedStatement.setInt(1, scoreValue);
            preparedStatement.setString(2, url);
            preparedStatement.executeUpdate();
        }catch(SQLException e) {
            e.printStackTrace();
        }
    }
}
