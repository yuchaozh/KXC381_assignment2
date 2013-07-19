<?php
session_start();
	
	
	$q=$_GET["q"];
	$b1=$_GET["b"];
	$response=$q;
	
	$time=@date("H-m-d");
	
	echo $b1.":<br>";
	echo $time."<br>";
	echo $response."<br>";
	
	
	
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
	
	$sql = "insert into comment(picID, author, content, time) values ('".$_SESSION["id"]."','".$b1."','".$response."',CURDATE())";
		if (mysql_query($sql))
		{
			//echo("<br>comment complete!</br>");
		}
		else
		{
			//echo("<br>Erroe comment: ".mysql_error(). "</br>");
		}

?> 
