$.ajax({
    method: "GET",
    url: "../phpscripts/devices.php",
    success: function (data) {
        if (data !== "" || data != null) {
            $("#table-devices").html("<thead><th>Device ID #</th><th>Mac</th><th>Alias</th><th>Location</th><th>User</th></thead><tbody>");
            let obj = JSON.parse(data);
            let devices = JSON.parse(obj["devices"]);
            console.log(devices);
            for (i in devices) {
                console.log(devices[i]);
                let deviceId = devices[i].deviceId;
                let mac = devices[i].mac;
                let alias = devices[i].alias;
                let location = devices[i].deviceLocation;
                let user = devices[i].deviceUser;
                //let button = "<button type='submit' class='btn btn-primary' value='" + deviceId + "' onclick='deleteDevice(this.val())'>Delete Device</button>";
                $("#table-devices").append("<tr><td>" + deviceId + "</td><td>" + mac + "</td><td>" + alias + "</td><td>" + location + "</td><td>" + user + "</td></tr>");//<td>").append(button).append("</td></tr>");
            }
            $("#table-devices").append("</tbody>");
        }

    }
});

$("#add-device").on("click", function (e) {
    e.preventDefault();
    e.stopPropagation();

    $.ajax({
        method: "POST",
        url: "../phpscripts/devices.php",
        data: {
            mac: $("#macaddress").val(),
            alias: $("#alias").val()
        },
        success: function (data) {
            location.reload();
        }
    })
});

function deleteDevice(id) {
    console.log("Delete device id", id);
}