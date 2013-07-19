var xmlHttp3;

function showHint3(str3) {
	if (str3.length==0) {
		document.getElementById("txtHint3").innerHTML="";
		return;
	}
	
	xmlHttp3 = GetXmlHttpObject3();
	
	if( xmlHttp3 == null ) {
		alert( "Browser does not support HTTP Request" );
		return;
	}
	
	var url3 = "getemail.php";
	url3 = url3 + "?q=" + str3;
	url3 = url3 + "&sid=" + Math.random();
	
	xmlHttp3.onreadystatechange = stateChanged3;
	xmlHttp3.open( "GET", url3, true );
	xmlHttp3.send( null );
}

function stateChanged3() {
	if ( xmlHttp3.readyState == 4 || xmlHttp3.readyState == "complete" ) {
		document.getElementById("txtHint3").innerHTML = xmlHttp3.responseText;
	}
} 

function GetXmlHttpObject3() {
	var objXMLHttp3 = null;
	
	if ( window.XMLHttpRequest ) {
		objXMLHttp3 = new XMLHttpRequest();
	}
	else if ( window.ActiveXObject ) {
		objXMLHttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return objXMLHttp3;
}
