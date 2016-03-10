var request;

function inputHandler() {
    var theInput = document.getElementById("un");
    theInput.setAttribute('style', 'background-color:red;');
    theInput.addEventListener('keyup', function() {
        ajaxObj(theInput.value)
    })
}

function ajaxObj(val) {
    console.log("value inputted is: " + val);
    var v = val;
    try {
        request = new XMLHttpRequest();
    } catch(e) {
        console.log("Error creating request object");
    }
    request.onreadystatechange = processResponse;
    request.open('GET', 'processOrder.php?value=' + v);
    request.send();
}

function processResponse() {
    if(request.readyState === XMLHttpRequest.DONE) {
        if(request.status === 200) {
            console.log("response text sent back is: " + request.responseText);
            document.getElementById("orderData").innerHTML = request.responseText;
        } else {
            console.log("error, nothing returned from server");
        }
    }
}