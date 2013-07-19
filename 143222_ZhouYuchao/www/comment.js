var xmlHttp;
var contents;

function showHint() {
	
	contents = document.getElementById("com").value;
	name = document.getElementById("name").value;
	obj = document.getElementById("sub");
	obj.disabled=true;
	if (contents=="") {
		document.getElementById("txtHint4").innerHTML="";
		obj.disabled=false;
		//return;
		return false;
	}
	
	xmlHttp = GetXmlHttpObject();
	
	if( xmlHttp == null ) {
		alert( "Browser does not support HTTP Request" );
		return;
	}
	
	var url = "getcomment.php";
	//url = url + "?q=" + str;
	url = url + "?q=" + contents;
	url = url + "&b=" + name;
	url = url + "&sid=" + Math.random();
	
	//定义句柄语句
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open( "GET", url, true );
	xmlHttp.send( null );
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

function stateChanged() {
	if ( xmlHttp.readyState == 4 || xmlHttp.readyState == "complete" ) {
		document.getElementById("txtHint4").innerHTML = xmlHttp.responseText;
		document.getElementById("sub").disabled=false;
	}
} 

function GetXmlHttpObject() {
	var objXMLHttp = null;
	
	if ( window.XMLHttpRequest ) {
		objXMLHttp = new XMLHttpRequest();
	}
	else if ( window.ActiveXObject ) {
		//创建XMLRPC对象
		objXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return objXMLHttp;
}
