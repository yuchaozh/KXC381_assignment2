<?php
$title="login";
?>
<style type="text/css">
body {
	background-color: #0FF;
}
</style>

<!-- Login form -->
<form action="login.php" method="post">
<p>
<label for="username">Username: </label>
<input type="text" name="username"><br>
<label for="password">Password: </label>
<input type="text" name="password"><br>
<input type="submit" value="Submit me" name="submit"><input type="reset">
</p>
</form>

<?php
session_start();
//$fp=fopen("data/users.txt","r");
$login=0;


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

//submit the login informaion
if(isset($_POST["submit"]))
{
	//retrieve the information from the form
	$username=$_POST["username"];
	$password=$_POST["password"];

	//check wether the username is already exist
	$result = mysql_query("select * from users");
	while($row = mysql_fetch_array($result))
	{
		if (($username == $row["username"]) &&($password == $row["password"]))
		{
			$login=1; 
			$_SESSION["authority"]=$_POST['username'];
			echo $_SESSION["authority"];
		   	echo 'Login In Successfully.<br><a //href="index.php" target="_blank">Click here to go back to the home page.</a>  <br>';
			break;
		}
		else
		{
			$login=-1;
		}
	}
		if ( $login==-1 )
			echo "Login Error!<br> Please create a new account first!<br>";
}

$result = mysql_query("select * from users");
while($row = mysql_fetch_array($result))
{
	//echo("<br>".$row["username"].$row["password"]."</br>");
}


mysql_close();


?>
<?php
include("footer.inc");
?>
