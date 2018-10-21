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

});