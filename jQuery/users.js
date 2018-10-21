function loadfleetUser() {
    $.ajax({
        method: "GET",
        url: "../phpscripts/getusers.php",
        success: function (data) {
            if (data != null || data != " ") {
                $("#fleet-user").html("");
                console.log("Data from getUsers: " + data);
                let tmp = JSON.parse(data);
                let users = JSON.parse(tmp["users"]);
                for (u in users) {
                    $("#fleet-user").append("<option selected='selected' value=" + users[u].id + ">" + users[u].username + "</option>");
                }
            }
        }
    });
}

$("#add-user").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    $.ajax({
        method: "POST",
        url: "../phpscripts/adduser.php",
        data: {
            username: $("#username").val(),
            firstname: $("#firstname").val(),
            lastname: $("#lastname").val(),
            password: $("#password").val(),
            usergroup: $("#usergroup").val(),
            auth: $("#auth").val()
        },
        success: function (data) {
            if (data["success"] == "true") {
                console.log("User created");
            }
            console.log(data);
        }
    })
});

$("#search-user").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    $.ajax({
        method: "POST",
        url: "../phpscripts/getusers.php",
        data: {
            username: $("#search-username").val(),
            firstname: $("#search-firstname").val(),
            lastname: $("#search-lastname").val()
        },
        success: function (data) {
            let obj = JSON.parse(data);
            let user = JSON.parse(obj[0]);

            for (i in user) {
                let id = user[i].userId;
                let firstname = user[i].firstname;
                let lastname = user[i].lastname;
                let username = user[i].username;
                let usergroup = user[i].usergroup;
                //$("#sear")
            }
        }
    });
});