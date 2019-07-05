<%--
  Created by IntelliJ IDEA.
  User: redount2k9
  Date: 27.05.2019
  Time: 15:08
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <title>Feed</title>
</head>
<body>
    <div class="container text-center">
        <div id="photos">

        </div>
    </div>
</body>

<script>

    getAllPhotos();

    function getAllPhotos() {
        $.getJSON("PhotoController",
            {
                type: "all"
            },
            function(data) {
                $("#photos").empty();
                for (let i = 0; i < data.length; ++i ) {
                    displayPhoto(data[i], i);
                }
            });
    }

    function getTopPhotos(n) {
        $.getJSON("PhotoController",
            {
                type: "top",
                number: n
            },
            function(data) {
                $("#photos").empty();
                for (let i = 0; i < data.length; ++i)
                    displayPhoto(data[i], i);
            });
    }


    function displayPhoto(photo, id) {
        let jspUsername;
        jspUsername = "<% out.print(request.getSession().getAttribute("username")); %>";
        console.log(jspUsername);
        let divCard = `<div id = "` + id + `" class="card" style="width: 18rem">`;
        let divBody = "<div class=\"card-body\">";
        let bodyTitle = "<h5 class=\"card-title\">" + photo.title + "</h5>";
        let scoreField = "<p> Score: " + photo.votes + "</p>";
        let usernameField = "<p>" + photo.username + "<p>";
        let divVote = "<div>";
        let inputScore = "<input type=\"number\" min=\"1\" max=\"10\" value=\"0\">";
        let disabled = (jspUsername === photo.username) ? "disabled" : "";
        let buttonVote = `<button class="btn btn-primary"` + disabled + ` onclick="submitVote(` + id + `)">Vote</button>`;
        divVote += inputScore;
        divVote += buttonVote;
        divBody += bodyTitle;
        divBody += scoreField;
        divBody += usernameField;
        divBody += divVote;
        let imageCard = "<img src=" + photo.url + ">";
        divCard += imageCard;
        divCard += divBody;
        $("#photos").append(divCard);
    }

    function submitVote(id) {
        let scoreValue = $("#" + id).find("input").val();
        if ( scoreValue > 10 )
            scoreValue = 0;
        let _url = $("#" + id).find("img").attr("src");
        $.ajax(
            {
                type: "POST",
                url: "PhotoController",
                data: {url: _url,
                    score: scoreValue},
                success: function(response) {
                    console.log("Success");
                }
            }
        );
    }

    function submitFilter() {
        let number = $("#topNumber").val();
        getTopPhotos(number);
    }

</script>
</html>
