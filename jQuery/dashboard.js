$.ajax({
    method: "POST",
    url: "../phpscripts/dashboard.php",
    success: function (data) {

        if (data !== null) {
            let obj = JSON.parse(data);
            let devices = JSON.parse(obj['devices']);
            let vehicles = JSON.parse(obj['vehicles']);

            $("#device-length").append("<h3>" + devices.length + "</h3>");
            $("#numberplate-length").append("<h3>" + vehicles.length + "</h3>");

            for (d in devices) {
                let id = devices[d]['deviceId'];
                let mac = devices[d]['mac'];
                let userId = devices[d].deviceUser;
                let location = devices[d].deviceLocation;
                $("#devices-table tbody").append("<tr><td>" + id + "</td><td>" + mac + "</td><td>" + userId + "</td><td>" + location + "</td></tr>");
            }
            for (v in vehicles) {
                let id = vehicles[v].numberplateId;
                let numberplate = vehicles[v].numberplatestring;
                let timestamp = new Date(vehicles[v].time);
                $("#vehicles-table tbody").append("<tr><td>" + id + "</td><td>" + numberplate + "</td><td>" + timestamp + "</td></tr>");
            }
        }
    }
})