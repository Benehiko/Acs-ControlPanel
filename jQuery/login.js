$("#loginForm").on("submit", function(e){
   e.preventDefault();
   e.stopPropagation();

    $.ajax(
        {
            method: "POST",
            url:"../phpscripts/login.php",
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(msg){
                if (msg == "true"){
                    $("#loginForm").trigger('reset');
                    $("#modal-login").modal();
                    setTimeout(function(){
                        window.location.replace("http://192.168.122.5");
                    },2000);
                }else{
                    $("#loginForm").trigger('reset');
                    $("#modal-fail").modal();
                }
            }
        }
    )
});