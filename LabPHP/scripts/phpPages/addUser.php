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
    <link rel="stylesheet" href="../css/main.css">
    <script src="jquery.js"></script>
    <script src="main.js"></script>
    <title>Add User</title>
</head>
<body>
<div class="container">
    <form action="../phps/add.php" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" value="" placeholder="Enter password">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="" placeholder="Enter age">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" class="form-control" value="" placeholder="Enter role">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="webpage">Webpage</label>
            <input type="text" name="webpage" class="form-control" value="" placeholder="Enter webpage">
        </div>
        <div class="form-group">
            <div class="col text-center">
                <input type="submit" name="save" class="btn btn-primary"></button>
            </div>
        </div>
    </form>
</div>
</body>
</html>