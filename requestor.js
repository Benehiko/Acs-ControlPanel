// Sending a receiving data in JSON format using GET method
const element = document.querySelector('form');
element.addEventListener('submit', event => {
    event.preventDefault();
    // actual logic, e.g. validate the form
    console.log('Form submission cancelled.');
});

function request() {

    let url = "http://104.40.251.46:8081/OcrRest/webapi/db/1/getImages/limit/10";
    $.ajax({
        type: "GET",
        dataType: "json",
        url: url,
        success: function (data) {
            let resultset = $("#resultset");

            let results = data.results;
            for (var d in results) {
                //console.log(results.length);
                for (var v in results[d].device) {

                    let vehicles = results[d].device[v].Vehicles;
                    for (var t in vehicles){
                        //console.log(vehicles[t]);
                        try {
                            resultset.append("<tr><td>" + results[d].device[v].device + "</td><td>" + vehicles[t].plate + "</td><td><img src='data:image/jpeg;base64," + vehicles[t].image + "' width='400px' height='380px'/></td><td>" + vehicles[t].timestamp + "</td><td>" + vehicles[t].batchid + "</td></tr>");
                        }catch (e) {
                            console.log(e);
                        }
                    }

                }
            }
        }
    });
}