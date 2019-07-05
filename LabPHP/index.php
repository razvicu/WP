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
    <link rel="stylesheet" href="css/main.css">
    <script src="scripts/jquery.js"></script>
    <script src="scripts/main.js"></script>
    <title>Lab7</title>
</head>
<body>
    <div id="mainContainer" class="container">
        <form class="form-inline md-form form-sm">
            <select class="custom-select" name="filter" id="filterSelect">
                <option value="name">Name</option>
                <option value="role">Role</option>
            </select>
            <input id="searchByNameInput" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
            <i class="fas fa-search" aria-hidden="true" onclick="searchUser()"></i>
        </form>
        <a href="/scripts/phpPages/addUser.php"><button class="btn btn-info floated"><i class="fa fa-plus"></i></button></a>
        <div id="searchHistory">

        </div>
        <div id="content"></div>
    </div>
    <script>
        
    </script>
</body>
</html>