/**
 * Created by c-dub on 2/24/2016.
 */
var tabArray;
var contentArray;
var user = 'administrator';

function setHandlers() {
	showTabs(user);
	console.log("tab array length is: " + tabArray.length);
	search = document.getElementById("mainSearchButton");
	search.addEventListener('mouseover', function(event) {
		search.setAttribute("style", "background-color:lightgray; opacity:0.7;");
	}, false);
	search.addEventListener('mouseout', function(event) {
		search.setAttribute("style", "background-color:transparent; opacity:1;");
	}, false);
	search.addEventListener('click', function(event) {
		inquiry = document.getElementById("mainSearch").value;
		if(inquiry !== '') {
			searchRequest(inquiry)
		} else {
			console.log("Nothing in search box");
		}
	}, false);
	for(var i = 0; i < tabArray.length; i++) {
		t = document.getElementById(tabArray[i]);
		t.addEventListener('click', function(event) {
			activateTab(event)
		}, false);
	}
}

function showTabs(user) {
	console.log("user passed in is: " + user);
	if(user == 'administrator') {
		tabArray = ['iTab', 'oTab', 'fTab', 'sTab'];
		contentArray = ['iMain', 'oMain', 'fMain', 'sMain'];
	} else if(user == 'faculty') {
		tabArray = ['iTab', 'oTab', 'fTab'];
		contentArray = ['iMain', 'oMain', 'fMain'];
	} else if(user == 'student') {
		tabArray = ['iTab', 'sTab'];
		contentArray = ['iMain', 'sMain'];
	} else {
		tabArray = [];
	}
	for(var i = 0; i < tabArray.length; i++) {
		document.getElementById(tabArray[i]).setAttribute('class', 'linksActive');
		document.getElementById(contentArray[i].setAttribute('style', 'display:none;'));
	}
}

function activateTab(val) {
		sender = val.target;
		parent = sender.parentNode;
		parent.setAttribute('class', 'linksActive');
		activateContent(parent);
		for(var i = 0; i < tabArray.length; i++) {
			if(tabArray[i] !== parent.id) {
				deactivateTab(document.getElementById(tabArray[i]));
				deactivateContent(document.getElementById(tabArray[i]));
			}
		}
	return false;
}

function deactivateTab(val) {
	val.setAttribute('class', 'linksInactive');
}

function activateContent(val) {
	console.log("call to activate div content on: " + val.id);
}

function deactivateContent(val) {
	console.log("call to DE activate div content on: " + val.id);
}

function searchRequest(text) {
	console.log("you requested: " + text);
	document.getElementById("mainSearch").value = '';
}

