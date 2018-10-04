$(function () {

    var $registration = $('#registration');
    var $color = $('#color');
    var $model = $('#model');

    var $macAddress = $('#macaddress');
    var $gateNo = $('#gateno');

    var $id = $('#id');
    var $name = $('#name');
    var $surname = $('#surname');


    $('#add-vehicle').on('click', function () {

        var vehicle = {
            registration: $registration.val(),
            color: $color.val(),
            model: $model.val()
        };

        $.ajax({
            type: 'POST',
            url: '',
            data: vehicle,
            success: function (newVehicle) {
                $vehicles.append('<li>registration: ' + newVehicle.registration + ', color: ' + newVehicle.color + ', model: ' + newVehicle.model + '</li>');
            },
            error: function () {
                alert('Error adding vehicle');
            }
        });
    });

    $('#add-device').on('click', function () {

        var device = {
            macAddress: $macAddress.val(),
            gateNo: $gateNo.val(),
        };

        $.ajax({
            type: 'POST',
            url: '',
            data: device,
            success: function (newDevice) {
                $devices.append('<li>mac Address: ' + newDevice.macAddress + ', gateno: ' + newDevice.gateNo + '</li>');
            },
            error: function () {
                alert('Error adding Device');
            }
        });
    });

    $('#add-user').on('click', function () {

        var user = {
            id: $id.val(),
            name: $name.val(),
            surname: $surname.val()
        };

        $.ajax({
            type: 'POST',
            url: '',
            data: user,

            success: function (newUser) {

                $users.append('<li>id: ' + newUser.id + ', name: ' + newUser.name + ', surname: ' + newUser.surname + '</li>');
            },
            error: function () {
                alert('Error adding user');
            }
        });
    });

});