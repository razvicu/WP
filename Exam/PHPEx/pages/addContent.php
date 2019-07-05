<?
session_start();
if ($_SESSION["creator"] != 1)
    header('location: ../index.php');
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
    <script src="../scripts/jquery.js"></script>
    <title>Add content</title>
</head>
<body>
<div class="container">
    Welcome, <?= $_SESSION['username']; ?>
    <h3>Add content</h3>
    <div id="content1">
        <div class="form-group">
            <label for="title"></label>
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="description"></label>
            <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
            <label for="url"></label>
            <input type="text" name="url" class="form-control" placeholder="Url">
        </div>
    </div>
    <div id="btnDiv" class="form-group">
        <div class="col text-center">
            <input type="submit" name="save" value="Save" id="saveBtn" class="btn btn-primary">
        </div>
    </div>
    <div style="float: right">
        <button class="btn btn-info"><i class="fa fa-plus"></i></button>
    </div>
</div>
</body>
<script>
    let id = 1;
    var wrapperArray = [];
    $(".btn-info").click(() => {
        $("#btnDiv").before("<div class=\"content" + (++id) + "\">" + "<div class=\"form-group\">\n" +
            "<label for=\"title\"></label>\n" +
            "<input type=\"text\" name=\"title\" class=\"form-control\" placeholder=\"Title\">\n" +
            "</div>\n" +
            "<div class=\"form-group\">\n" +
            "<label for=\"description\"></label>\n" +
            "<textarea type=\"text\" name=\"description\" class=\"form-control\" placeholder=\"Description\"></textarea>\n" +
            "</div>\n" +
            "<div class=\"form-group\">\n" +
            "<label for=\"url\"></label>\n" +
            "<input type=\"text\" name=\"url\" class=\"form-control\" placeholder=\"Url\">\n" +
            "</div></div>");
    });

    $("#saveBtn").click(() => {
        wrapperArray = [];
        let titleInputs = document.getElementsByName("title");
        let descriptionInputs = document.getElementsByName("description");
        let urlInputs = document.getElementsByName("url");
        let titleArray = [], descriptionArray = [], urlArray = [];
        for (let i = 0; i < titleInputs.length; ++i) {
            titleArray.push(titleInputs[i].value);
            descriptionArray.push(descriptionInputs[i].value);
            urlArray.push(urlInputs[i].value);
        }
        wrapperArray.push(titleArray);
        wrapperArray.push(descriptionArray);
        wrapperArray.push(urlArray);
        console.log(wrapperArray);
        $.ajax({
            type: "POST",
            url: "../controllers/addController.php",
            data:
            {
                array: wrapperArray
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
</script>
