var xmlHttp2;

function showHint2(str2) {
	if (str2.length==0) {
		document.getElementById("txtHint2").innerHTML="";
		return;
	}
	
	xmlHttp2 = GetXmlHttpObject2();
	
	if( xmlHttp2== null ) {
		alert( "Browser does not support HTTP Request" );
		return;
	}
	
	var url2 = "getpassword.php";
	url2 = url2 + "?q=" + str2;
	url2 = url2 + "&sid=" + Math.random();
	
	xmlHttp2.onreadystatechange = stateChanged2;
	xmlHttp2.open( "GET", url2, true );
	xmlHttp2.send( null );
}

function stateChanged2() {
	if ( xmlHttp2.readyState == 4 || xmlHttp2.readyState == "complete" ) {
		document.getElementById("txtHint2").innerHTML = xmlHttp2.responseText;
	}
} 

function GetXmlHttpObject2() {
	var objXMLHttp2 = null;
	
	if ( window.XMLHttpRequest ) {
		objXMLHttp2 = new XMLHttpRequest();
	}
	else if ( window.ActiveXObject ) {
		objXMLHttp2 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return objXMLHttp2;
}
