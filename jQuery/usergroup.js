$.ajax({
    method: "GET",
    url: "../phpscripts/usergroup.php",
    success: function (data) {
        if (data != null || data !== "") {
            $("#table-usergroup").html("<thead><th>Group Name</th><th>Group Level</th></thead><tbody>");
            console.log(data);
            let obj = JSON.parse(data);
            let usergroup = JSON.parse(obj["usergroups"]);
            console.log(usergroup);
            for (i in usergroup) {
                let id = usergroup[i].usergroupId;
                let name = usergroup[i].name;
                let level = usergroup[i].level;
                $("#table-usergroup").append("<tr><td>" + name + "</td><td>" + level + "</td></tr>");
                $("#usergroup-selection").append("<option value='"+id+"'>"+name+" | "+ level + "</option>");
            }
            $("#table-usergroup").append("</tbody>");
        }
    }
});

$("#add-usergroup").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    $.ajax({
        method: "POST",
        url: "../phpscripts/usergroup.php",
        data: {
            name: $("#usergroup-name").val(),
            level: $("#usergroup-level").val()
        },
        success: function (data) {
            if (data != null && data !== ""){
                if (data == 1){
                    location.reload();
                }
                console.log(data);
            }
        }
    });
});

function removeGroup(id){
    e.preventDefault();
    e.stopPropagation();

    $.ajax({

    })
}