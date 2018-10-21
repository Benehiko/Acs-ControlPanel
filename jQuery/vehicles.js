$('#add-vehicle').on('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    console.log("Adding fleetvehicle: " + $("#fleet-user").val());
    $.ajax({
        type: 'POST',
        url: '../phpscripts/addvehicle.php',
        data: {
            numberplate: $("#registration").val(),
            username: $("#fleet-user").val()
        },
        success: function (d) {
            alert("New Vehicle Added" + d);
        },
        error: function () {
            alert('Error adding vehicle');
        }
    });
});