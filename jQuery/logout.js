$("#logout-button").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();

    $.ajax({
        method: "GET",
        url:"../phpscripts/logout.php",
        success: function(data){
            window.location.replace("http://178.128.139.92");
        }
    })
});