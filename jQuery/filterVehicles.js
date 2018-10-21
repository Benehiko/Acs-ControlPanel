$("#vehicle-filter").on("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    console.log($("#vehicle-from").val());
    console.log($("#vehicle-to").val());

    $.ajax({
        method: "POST",
        url:"../phpscripts/filterVehicles.php",
        data: {
            datefrom : $("#vehicle-from").val(),
            deteto: $("#vehicle-to").val(),
            numberplate: $("#vehicle-numberplate").val(),
            type: "vehicle"
        },
        success: function(data){
            if (data != null || data != ""){
                console.log(data);
                $("#vehicles-filter-table").html("<thead><th>Numberplate ID #</th><th>Numberplate</th><th>Timestamp</th><tbody>");
                let vehicles = JSON.parse(data);
                let v = JSON.parse(vehicles["vehicles"]);
                for (i in v){
                    console.log(i);
                    let id = v[i].numberplateId;
                    let numberplate = v[i].numberplatestring;
                    let timestamp = new Date(v[i].time);
                    let image = "<button type='submit' class='btn btn-primary' value='"+id+"' onclick='showImage(this.value)'>Show Image</button>";

                    $("#vehicles-filter-table tbody").append("<tr><td>" + id + "</td><td>" + numberplate + "</td><td>" + timestamp + "</td><td>").append(image).append("</td></tr>");
                }
                $("#vehicles-filter-table").append("</tbody>");
            }
        }
    });
});

$("#search-fleet-vehicle").on("click", function(e){
   e.preventDefault();
   e.stopPropagation();

   $.ajax({
       method: "POST",
       url:"../phpscripts/filterVehicles.php",
       data:{
           type: "fleetvehicle",
           numberplate: $("#fleet-numberplate").val()
       },
       success: function(data){
           if (data != null || data !== ""){
               $("#vehicles-filter-table").html("<thead><th>Numberplate</th><th>User</th><tbody>");
               console.log(data);
               let obj = JSON.parse(data);
               let fleetvehicle = JSON.parse(obj["results"]);
               for (o in fleetvehicle){
                   let numberplate = fleetvehicle[o][0].numberplate;
                   let username = fleetvehicle[o][1].username;
                   $("#vehicles-filter-table").append("<tr><td>" + numberplate + "</td><td>" + username + "</td></tr>");
               }
               $("#vehicles-filter-table").append("</tbody>");
           }
       }
   })
});

function showImage(id){
    $.ajax({
        method: "POST",
        url: "../phpscripts/filterVehicles.php",
        data:{
            id: id,
            type: "image"
        },
        success: function(data) {
            if (data !== null) {
                console.log(data);
                var img = new Image();
                img.src = "data:image/jpg;base64," + data;
                let w = window.open("");
                w.document.write(img.outerHTML);
            }
        }
    });
    console.log(id);
}