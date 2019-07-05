<%-- Created by IntelliJ IDEA. --%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="scripts/jquery.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <title></title>
</head>
<body>
<%
  if (request.getSession().getAttribute("username") == null)
    response.sendRedirect("/login.html");
%>
<div class="container">
  <div class="filter">
    <input id="topNumber" type="number" min="1" max="10">
    <button id="submitFilter" class="btn btn-primary" onclick="submitFilter()">Filter</button>
  </div>
  <a class="btn btn-primary" href="components/upload.jsp">Upload</a>
  <div class="float-right">
    <p>Welcome,${username} </p>
    <form action="LogoutController" method="post">
      <button class="btn btn-danger">Log out</button>
    </form>
  </div>
</div>
</body>
</html>