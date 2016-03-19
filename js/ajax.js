function ajaxObj(val) {
    // id from the tab that is currently active. We will add a switch statement and one more
    //  parameter for either list or details. Need to write search queries as well.
    var v = val;
    // try to create the XMLHttpRequest object
    try {
        var request = new XMLHttpRequest();
    } catch(e) {
        console.log("Error creating request object");
    }
    // define an on-the-fly function to handle the JSON that is returned from the server,
    //  as soon as the request object's state changes. As long as readyState is 4 (DONE), and
    //  status is 200(awaiting), we will process the JSON that php gave to us. Again, we
    //  will create a switch statement to deal with active tabs, and list versus detail view
    request.onreadystatechange = function(v) {
        if(request.readyState==4 && request.status==200) {
            // parse the JSON response text that php returns into a javascript object
            var jsonObj = JSON.parse(request.responseText);
            console.log(jsonObj);
            var test = document.getElementById("mainList");
            var text = "<ul>";
            for(var key in jsonObj) {
                if(jsonObj.hasOwnProperty(key)) {
                    //console.log(key + " -> " + jsonObj[key]);
                    text = text + '<li class="listItem"><a href="#">' + jsonObj[key] + "</a></li><br>";
                }
            }
            test.innerHTML = text;
        }
    };
    request.open("GET", "ssi/listView.php?value="+v, true);
    request.send();
}


