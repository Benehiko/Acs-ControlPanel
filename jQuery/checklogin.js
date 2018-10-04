$.ajax({
    method: "POST",
    url: "../phpscripts/checklogin.php",
    success: function (msg) {
        console.log(msg);
        if (msg == "LoggedOut") {
            console.log('msg', msg);
            window.location.replace("http://192.168.122.5/login.php");

        }
    }
});
