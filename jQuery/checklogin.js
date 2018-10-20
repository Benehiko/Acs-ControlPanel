$.ajax({
    method: "POST",
    url: "../phpscripts/checklogin.php",
    success: function (msg) {
        if (msg == "LoggedOut") {
            window.location.replace("http://192.168.1.108/login.php");
        }
    }
});
