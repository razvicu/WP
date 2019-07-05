<?php
    session_start();
    if (!isset($_SESSION["username"]))
        header('location: pages/login.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <script src="scripts/jquery.js"></script>
    <script src="main.js"></script>
</head>
<body>
    <div class="container">
        <div id="welcome">
            Welcome, <? echo $_SESSION["username"]; ?>
        </div>

        <div id="lvl1">
            <h3 class="text-center">Level 1</h3>
        </div>

        <div id="lvl2">
            <h3 class="text-center">Level 2</h3>
        </div>

        <div id="lvl3">
            <h3 class="text-center">Level 3</h3>
        </div>

        <div id="lvl4">
            <h3 class="text-center">Level 4</h3>
        </div>

        <div id="lvl5">
            <h3 class="text-center">Level 5</h3>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        getAllTests = function() {
            for (i = 1; i < 6; ++i)
                getTests(i);
        };

        getTests = function(_lvl = 1) {
            $.ajax(
                {
                    type: "GET",
                    url: "controllers/testController.php",
                    data:
                        {
                            level: _lvl
                        },
                    success: function (response) {
                        try {
                            response = JSON.parse(response);
                            console.log(response);
                            populateDiv(response, _lvl);
                        } catch (error) {
                            console.log(error.message);
                        }
                    }
                }
            );
        };

        populateDiv = function(response, lvl) {
            let container = "<div class=\"container\"><div class=\"row\">";
            for (i = 0; i < response.length; ++i) {
                console.log(response[i]);
                console.log(response[i][1]);
                let card = "<div class=\"col-sm\" onclick=openQuestions(" + response[i][0] + ")><h4>" + response[i][1] + "</h4></div>";
                container += card;
            }
            $("#lvl" + lvl).append(container);
        };

        openQuestions = function(id) {
           window.location.href= "http://localhost:8080/pages/questions.php?id=" + id;
        };

        getAllTests();
    })

</script>