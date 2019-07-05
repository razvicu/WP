var getUsers;
var editUser;
var getUser;
var searchUser;
var searchHistory = {
    first: "",
    second: ""
};

$(document).ready(function() {
    getUsers = function(_name="", _filter="") {
        $.ajax(
            {
                type: "GET",
                url: "/scripts/phps/getUsers.php",
                data: {name: _name, filter: _filter},
                success: function(response) {
                    try {
                        response = JSON.parse(response);
                        console.log(response);
                        populateTable(response);
                    }catch(error) {
                        console.log(error.message);
                    }
                }, 
                error: function(response) {
                    console.error("Something went wrong while trying to get all users from the database");
                }
            }
        );
    }

    getUser = function(_id) {
        $.ajax(
            {
                type: "GET",
                url: "/scripts/phps/getUser.php",
                data: {id: _id},
                success: function(response) {
                    try {
                        console.log(response);
                        response = JSON.parse(response);
                    }catch(error) {
                        console.log(error.message);
                    }
                    populateForm(response);
                },
                error: function(response) {
                    console.error("Something went wrong while trying to get the user from the database");
                }
            }
        )
    }

    deleteUser = function(_id) {
        $.ajax(
            {
                type: "GET",
                url: "/scripts/phps/delete.php",
                data: {id: _id},
                success: function(response) { 
                    getUsers();
                }
            }
        )
        
    }

    let populateForm = function(response) {
        let nameInput = document.getElementsByName("name")[0];
        let usernameInput = document.getElementsByName("username")[0];
        let passwordInput = document.getElementsByName("password")[0];
        let ageInput = document.getElementsByName("age")[0];
        let roleInput = document.getElementsByName("role")[0];
        let emailInput = document.getElementsByName("email")[0];
        let webpageInput = document.getElementsByName("webpage")[0];

        nameInput.value = response["name"];
        usernameInput.value = response["username"];
        passwordInput.value = response["password"];
        ageInput.value = response["age"];
        roleInput.value = response["role"];
        emailInput.value = response["email"];
        webpageInput.value = response["webpage"];
    }

    let populateTable = function(response) {
        $("#content").empty();
        var usersInfo = "<tbody>";
        for (idx in response) {
            let content = response[idx];
            let userInfo = "<tr>";
            for ( let i = 1; i < content.length; ++i ) {
                let el = content[i];
                let uiElement = "<td>" + el + "</td>";
                userInfo += uiElement;
            }
            userInfo += "<td><a id=\"editButton\" onclick=\"editUser(" + content[0] + ")\" class=\"btn btn-primary\">Edit</a><a id=\"deleteButton\" onclick=\"deleteUser(" + content[0] + ")\" class=\"btn btn-danger\">Delete</a></td>";
            userInfo += "</tr>";
            usersInfo += userInfo;
            //console.log(usersInfo);
        }
        usersInfo += "</tbody>";
        var table = "<div class=\"row justify-content-center\"><table class=\"table\"><thead><tr><th>Name</th><th>Username</th> \
        <th>Password</th><th>Age</th><th>Role</th><th>Email</th><th>Webpage</th><th colspan=\"2\">Action</th></tr></thead>";
        table += usersInfo;
        $("#content").append(table);
        //$("#content").append("</table>");
        //console.log(table);   
    }

    editUser = function(arg) {
        window.open("/scripts/phpPages/updateUser.php?param=" + arg);
    }

    searchUser = function() {
        let text = document.getElementById("searchByNameInput").value;
        let filter = document.getElementById("filterSelect").value;
        if (text.length) {
            searchHistory.second = searchHistory.first;
            searchHistory.first = text;
        }
        $("#searchHistory").empty();
        $("#searchHistory").append("<p>" + searchHistory.first + "</p><p>" + searchHistory.second + "</p>");
        getUsers(text, filter);
    }

    let createTable = function() {
        getUsers();     
    }

    createTable();
});