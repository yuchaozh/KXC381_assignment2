<?php
//link to the database
$link=@mysql_connect('localhost','root','123456'); 
if(!$link) 
{
	echo( "<br> Unable to connect to the "."database server at this time.</br>");
	exit();
}

//create a database

$sql = "create database b232;";
if (mysql_query($sql))
{
	echo("<br>database created successfully!</br>");
}
else
{
	echo("<br>Erroe creating database: ".mysql_error(). "</br>");
}


//choose the database
if(!@mysql_select_db("b232"))
{
	echo( "<br> Unable to locate the register_info "."database server at this time.</br>");
	exit();
}

//create the users table to store information
$sql = "create table users".
"(".
"username text,".
"password text,".
"email text,".
"age text,".
"sex text,".
"time text,".
"ways text".
");";
if (mysql_query($sql))
{
	echo("<br>users table created successfully!</br>");
}
else
{
	echo("<br>Erroe creating users table: ".mysql_error(). "</br>");
}

//create the users table to store information
$sql = "create table comment".                
"(".
"picID text,".
"author text,".
"content text,".
"time text".
");";
if (mysql_query($sql))
{
	echo("<br>users table created successfully!</br>");
}
else
{
	echo("<br>Erroe creating users table: ".mysql_error(). "</br>");
}

//create the list table to store information
$sql = "create table list".
"(".
"picname text,".
"picID text,".
"picauthor text,".
"time text".
");";
if (mysql_query($sql))
{
	echo("<br>users table created successfully!</br>");
}
else
{
	echo("<br>Erroe creating users table: ".mysql_error(). "</br>");
}

?>