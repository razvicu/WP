<%--
  Created by IntelliJ IDEA.
  User: redount2k9
  Date: 30.05.2019
  Time: 16:22
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../scripts/jquery.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <title>Upload picture</title>
</head>
<%

%>
<body>
    <div class="container">
        <form method="post" action="/AddPhoto">
            <div class="form-group">
                <input type="hidden" id="username" name="username" value="<%for (Cookie c: request.getCookies()) if (c.getName().equals("username"))
            out.print(c.getValue());%>">
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Url</label>
                <input type="text" id="url" name="url" class="form-control">
            </div>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
</html>
