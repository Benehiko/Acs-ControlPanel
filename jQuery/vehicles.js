$(function () {

    $('#add-vehicle').on('click', function () {
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            type: 'POST',
            url: '../phpscripts/addvehicle.php',
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
});