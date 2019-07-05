<?php
session_start();
if (!isset($_SESSION["username"]))
    header('location: pages/login.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="scripts/jquery.js"></script>
    <script src="scripts/main.js"></script>
    <link rel="stylesheet" href="styles/style.css">
    <title>Content</title>
</head>
<body>
<div class="container">
    <div id="welcome">
        Welcome, <?= $_SESSION["username"]; ?>
    </div>
    <div id="btnDiv">
        <form action="controllers/logoutController.php">
            <button class="btn btn-danger"><i class="fa fa-sign-out-alt" aria-hidden="true"></i></button>
        </form>
        <? if ($_SESSION['creator'])
                echo "<form action=\"pages/addContent.php>\"" .
                     "<button class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i></button></form>";
        ?>
    </div>
    <div id="content"></div>
</div>
</body>
<script>
    $(document).ready(function() {
    getAllContent();

    function getAllContent() {
        $.getJSON("controllers/contentController.php",
                  function(data) {
                    $("#content").empty();
                    for (let i = 0; i < data.length; ++i)
                        displayContent(data[i]);
                  });
    }

    var userData;

    function displayContent(content) {
        let userID = "<? echo $_SESSION["id"]; ?>";
        let divCard = `<div class="divCard" id="` + content.ID + `">`;
        let jsDate = new Date(content.Date * 1000).toLocaleString();
        let date = "<h5>" + jsDate +  "</h5>";
        let title = "<h5>" + content.Title + "</h5>";
        let description = "<p>" + content.Description + "</p>";
        let url = "<p>" + content.URL + "</p>";
        let buttonDel = (userID === content.UserID) ? `<button class="btn btn-danger" onclick="deleteContent(` + content.ID + `)">Delete</button>` : "";
        getUser(content.UserID);
        let author = "<p>Posted by " + userData["User"] + "</p>";
        divCard += title;
        divCard += author;
        divCard += date;
        divCard += description;
        divCard += url;
        divCard += buttonDel;
        $("#content").append(divCard);
    }

    getUser = function(_id) {
        $.ajax(
            {
                type: "POST",
                dataType: 'json',
                url: "controllers/userController.php",
                data: { id: _id },
                async: false,
                success: function(data) {
                    userData = data;
                }
            }
        );
    };

    deleteContent = function(_id) {
        console.log(_id);
        $.ajax(
            {
                type: "POST",
                url: "controllers/deleteController.php",
                data: {id: _id},
                success: function(_) {
                    window.location.reload();
                }
            }
        );
    };



    });
</script>
