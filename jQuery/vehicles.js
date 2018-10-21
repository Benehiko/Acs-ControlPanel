$(function () {

    $('#add-vehicle').on('click', function () {
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8081/db/fleetvehicles',
            data: {
                numberplate: $("#registration").val(),
                username: $("#fleet-user").val()
            },
            success: function (d) {
                alert("New Vehicle Added");
            },
            error: function () {
                alert('Error adding vehicle');
            }
        });
    });

    $('#search-fleet-vehicle').on('click', function () {
        $.ajax({
            type: 'GET',
            url: 'http://localhost:8081/db/fleetvehicle/byNumberplate/' + $("#fleet-numberplate").val(),
            success: function (data) {
                console.log("fleet vehicle search " + data);
            },
            error: function () {
                alert('Error adding Device');
            }
        });
    });

    $('#vehicle-filter').on('click', function () {
        let datefrom = $("#vehicle-from").val();
        let dateto = $("#vehicle-to").val();
        let numberplate = $("#vehicle-numberplate").val();

        let url = "http://localhost:8081/db/vehicles/";
        if ((datefrom != null || datefrom != "") && (dateto != null || datefrom != "") && (numberplate != null || numberplate != "")) {
            url = url + "byDateNumberplate/" + datefrom + "/" + dateto + "/" + numberplate;
        } else if ((datefrom != null || datefrom != "") && (dateto != null || datefrom != "")) {
            url = url + "byDate/" + datefrom + "/" + dateto;
        } else if ((numberplate != null || numberplate != "")) {
            url = url + "byNumberplate/" + numberplate;
        }
        $.ajax({
            type: 'GET',
            url: url,
            success: function (d) {
                console.log("Search for vehicle complete");
            },
            error: function () {
                alert('Error adding user');
            }
        });
    });

});