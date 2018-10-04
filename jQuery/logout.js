$("#logout-button").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();

    $.ajax({
        method: "GET",
        url:"../phpscripts/logout.php",
        success: function(data){
            window.location.replace("http://192.168.122.5");
        }
    })
});