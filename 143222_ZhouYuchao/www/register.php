<html>
<head>
<title>PhotoFun - Register</title>
<script type="text/javascript" src="check.js"></script>
<script type="text/javascript" src="checkemail.js"></script>
<script type="text/javascript" src="checkpassword.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
body {
	background-color: #0FF;
}
</style>
</head>
<body>
<h1><center>PhotoFun - Share your photoes</center></h1>
<hr>
<I>You can create a new account in this page.</I>
<?php
$title="首页";
?>
<!-- Redister form -->
<form action="register.php" method="post">
<p>
<label for="username">Username: </label>
<input type="text" name="username" id="txt1" onKeyUp="showHint(this.value)"> <span id="txtHint"></span>
   <br>
<label for="password">Password: </label>
<input type="password" name="password" id="txt2" onKeyUp="showHint2(this.value)"> <span id="txtHint2"></span>
<br>
<label for="checkpassword">Password check:  </label>
<input type="password" name="checkpassword">
<br>
<label for="email">Email address:</label>
<input type="text" name="email" id="txt3" onKeyUp="showHint3(this.value)"> <span id="txtHint3"></span>
<br>
<label for="age">Age:</label>
<input type="text" name="age"> 
   <br>
Please choose your denger: 
<input type="radio" name="sex" value="Male"> Male
<input type="radio" name="sex" value="Female"> Female<br>
How many years do you take photoes:
<input type="checkbox" name="time" value="One"> One Year
<input type="checkbox" name="time" value="Two"> Two Year
<input type="checkbox" name="time" value="Three"> Three Year<br>

<td>How do you get to know PhotoFun: </td>
<tr>
<td><select name="ways" size=4 multiple>
<option value="1" selected>TV advertising</option>
<option value="2">Friends' recommend</option>
<option value="3">Phone directory</option>
<option value="4">Leaflet</option>
</select>
</td>
</tr>
<br>
<br>
<input type="submit" value="Submit me" name="submit"><input type="reset">
</p>
</form>

<?php
$resiter=0;
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



//submit the register informaion
$register=1;
if(isset($_POST["submit"]))
{
	//retrieve the information from the form
	$username=$_POST["username"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$age=$_POST["age"];
	$sex=$_POST["sex"];
	$time=$_POST["time"];
	$ways=$_POST["ways"];

	//check wether the username is already exist
	$result = mysql_query("select * from users");
	while($row = mysql_fetch_array($result))
	{
		if ($username == $row["username"])
		{
			echo("<br>The username is already exist. Please enter another username!!!</br>");
			$register=-1;
			break;
		}
		else
		{
			$register=1;
		}
	}

	if ($register == 1)
	{
		//insert the information into the table
		$sql = "insert into users(username, password, email, age, sex, time, ways) values ('".$username."','".$password."','".$email."','".$age."','".$sex."','".$time."','".$ways."')";
		if (mysql_query($sql))
		{
			echo("<br>Register complete!</br>");
		}
		else
		{
			echo("<br>Erroe adding submitted: ".mysql_error(). "</br>");
		}
	}
}

//output the information
$result = mysql_query("select * from users");
while($row = mysql_fetch_array($result))
{
	//echo("<br>".$row["username"].$row["password"].$row["email"].$row["age"].$row["sex"]
	//.$row["time"].$row["ways"]."</br>");
}

mysql_close();

?>


<?php
include("footer.inc");
?>
</body>
</html>