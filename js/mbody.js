/**
 * @author mike silberg
 */

var screens = new Object();
var raddr = "http://localhost/public_html/uprototype/";

function changeScreen(hideScr, showScr){
	hideScr.hide();
	showScr.show();
}
$("div.screens").empty().html('<img src="http://localhost/public_html/uprototype/graphics/loader.gif">');
$(document).ready(function(){
	var atClick = false;
	var loggedIn = false;
	var notAtClick;
	if ("start" in screens){ loggedIn = true }
	$(document).click(function(){
		atClick = true;
		clearTimeout(notAtClick);
		notAtClick = setTimeout(function(){atClick = false},30000);
	});
	setInterval(function(){ if (loggedIn && !atClick){ window.location = raddr + "?logout" } },120000);
	if (window.history) {
		window.history.forward(1);
	}
});
