/**
 * Created by c-dub on 2/24/2016.
 */
var tabArray;
var user = 'administrator';
var request;

function setHandlers() {
    // call to function, based on user type, only specific tabs will appear
	showTabs(user);
    // variable for the actual search button (submit input type)
	search = document.getElementById("mainSearchButton");
    // add event handlers: mouse over/out on search button, and click for submitting text value
	search.addEventListener('mouseover', function(event) {
		search.setAttribute("style", "background-color:lightgray; opacity:0.7;");
	}, false);
	search.addEventListener('mouseout', function(event) {
		search.setAttribute("style", "background-color:transparent; opacity:1;");
	}, false);
	search.addEventListener('click', function(event) {
		inquiry = document.getElementById("mainSearch").value;
		if(inquiry !== '' || inquiry !== null) {
            // call on function to process search text
			searchRequest(inquiry)
		} else {
            // no text value in search box, do nothing
			console.log("Nothing in search box");
		}
	}, false);
    // loop through the tab array, add click event listeners to each tab anchor link
	for(var i = 0; i < tabArray.length; i++) {
        //console.log('tab array id is: ' + tabArray[i]);
		t = document.getElementById(tabArray[i]);
		t.addEventListener('click', function(event) {
            // process showing/hiding of all tabs in the tab array
			activateTab(event)
		}, false);
	}
}

function showTabs(username) {
    // depending on user type, there will only be certain tabs showing
	if(username == 'administrator') {
		tabArray = ['iTab', 'oTab', 'fTab', 'sTab', 'eTab'];
	}
	else if(user == 'faculty') {
		tabArray = ['iTab', 'oTab', 'fTab'];
	}
	else if(user == 'student') {
		tabArray = ['iTab', 'sTab'];
	} else {
        // something has gone wrong with the user type input
		tabArray = [];
	}
    // loop through the tab array, get the element by its index (id value), and change its
    //      class to display in css
	for(var i = 0; i < tabArray.length; i++) {
        document.getElementById(tabArray[i]).setAttribute('class', 'linksActive');
	}
}

function activateTab(val) {
    // sender is the actual anchor link itself
    sender = val.target;
    // parent is the parent node of the sender anchor link - parent is a list item in the
    //      tabLinks unordered html list
    parent = sender.parentNode;
    console.log('parentNode is: ' + parent);
    parent.setAttribute('class', 'linksActive');
    parent.setAttribute('style', 'color:#00ff00;');
    //query php with ajax here, and display the content in main div
    activateContent(parent);
    // loop through all tabArray items, deactivate all but the active tab
    for(var i = 0; i < tabArray.length; i++) {
        if(tabArray[i] !== parent.id) {
            deactivateTab(document.getElementById(tabArray[i]));
            deactivateContent(document.getElementById(tabArray[i]));
        }
    }
}

function deactivateTab(val) {
    // set the css class for all inactive tabs to display:none
	val.setAttribute('class', 'linksInactive');
}

function activateContent(val) {
    ajaxObj(val.id);
}

function deactivateContent(val) {
	//console.log("call to DE activate div content on: " + val.id);
}

function searchRequest(text) {
	//console.log("you requested: " + text);
	document.getElementById("mainSearch").value = '';
}







