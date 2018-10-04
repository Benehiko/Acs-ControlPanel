$.ajax({
    method: "POST",
    url: "../phpscripts/dashboard.php",
    success: function (data) {

        if (data !== null) {
            let obj = JSON.parse(data);
            $("#device-length").append("<h3>" + obj['devices'].length + "</h3>");
            $("#numberplate-length").append("<h3>" + obj['vehicles'].length + "</h3>");
            $.each(data, function(){
                console.log(this);
            };
            for (d in obj['devices']) {
                let id = obj['devices'][d]['deviceId'];
                let mac = obj['devices'][d]['mac'];
                console.log(mac);
                let userId = obj['devices'][d].deviceUser;
                let location = obj['devices'][d].deviceLocation;
                $("#devices-table tbody").append("<tr><td>" + id + "</td><td>" + mac + "</td><td>" + userId + "</td><td>" + location + "</td></tr>");
            }
            for (v in obj['vehicles']) {
                let id = obj['vehicles'][v].numberplateId;
                let numberplate = obj['vehicles'][v].numberplatestring;
                let timestamp = new Date(obj['vehicles'][v].time);
                $("#vehicles-table tbody").append("<tr><td>" + id + "</td><td>" + numberplate + "</td><td>" + timestamp + "</td></tr>");
            }
        }
    }
})