
<?php

//link to the database
$link=@mysql_connect('localhost','root','123456'); 
if(!$link) 
{
	echo( "<br> Unable to connect to the "."database server at this time.</br>");
	exit();
}


//choose the database
if(!@mysql_select_db("b232"))
{
	echo( "<br> Unable to locate the register_info "."database server at this time.</br>");
	exit();
}

$q=$_GET["q"];
$exist=0;
//check wether the username is already exist
	$result = mysql_query("select * from users");
	while($row = mysql_fetch_array($result))
	{
		if ($q == $row["username"])
		{
			//echo("<br>The username is already exist. Please enter another username!!!</br>");
			$exist=-1;
			break;
		}
		else
		{
			$exist=1;
		}
	}

if ($exist == -1) {
		$response="the username is exist!";
	} else {
		$response="you can use this username!";
	}
	//output the response
	echo $response;


?> 