<html>
<!-- 
student name: Zhou Yuchao
student id: 143222
-->
<head>
<title>PhotoFun - Home</title>
<script type="text/javascript" src="comment.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
body {
	background-color: #0FF;
}
</style>
</head>
<body>
<h1> Wellcome to PhotoFun</h1>
<div align="center">
  <?php
$title="图片库";
?>
  <?php
session_start();

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

$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$idbuffer=$row["picID"];
		}
mysql_close();


$postid=$idbuffer+1;  //sotre the id of the next picture
$id=0;  //store the the id of the current picture
$tempid=0; //store the tempt of the id
$tempname="";  //store the name of the picture



// user has login
if (isset($_SESSION["authority"]))
{
	echo '欢迎回来:  '.$_SESSION["authority"].'<br />';


	if(!isset($_GET["id"]))  //not set id in the url
	{
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

		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$tempname=$row["picname"];
			$tempid=$row["picID"];
			$tempauthor=$row["picauthor"];
			$temptime=$row["time"];
		}
		mysql_close();

		$picid=$tempid;
		$picname=$tempname;
		$current=$tempid;
		$picauthor=$tempauthor;
		$pictime=$temptime;
		if(is_file("submissions/$picname"))
		{
			echo '<br>'."<IMG SRC=\"submissions/$picname\">";
			echo( "<br> Author: ".$picauthor."</br>");
			echo( "<br> Time: ".$pictime."</br>");
			
		}
		//fclose($fp);
		?>
		<br>
  		<br>
  		<?php
  
		//previous page and next page
		$a=$current-1;
		$b=$current+1;


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

		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$maxname=$row["picname"];
			$maxid=$row["picID"];
		}
		mysql_close();



		if ($b <= $maxid)
		{
			?>
  			<a href="index.php?id=<?php echo $b; ?>">Previous page</a>
  			<?php
		}
		else
		{
			echo "END";
		}
		if ($a >= 1)
		{
		?>
  			<a href="index.php?id=<?php echo $a; ?>">Next page</a>
  			<?php
		}
		else
		{
			echo "END";
		}
		?>
  		</div>
  
  		<!-- Comments and logout -->
  		<hr>
  		<I><font size="2">Comments:</font></I>
  		<p><span id="txtHint4"></span></p>
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
		
		$result = mysql_query("select * from comment where picID = $current;");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			echo $row["author"].':<br>';
			echo $row["time"].'<br>';
			echo $row["content"].'<br><br>';
		}
		mysql_close();
		
		
  		?>
  		<hr>
  		<I><font size="2">You can uplaod your picture here:</font></I>
  
  <!-- upload picture  -->
<form action="index.php" method="post" enctype="multipart/form-data">
  <div>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<label for="usefile">
      <div align="left">Upload a file: </div>
    </label>
	<input type="file" name="userfile" id="userfile"/>
	<input type="submit" value="Submit" name="submit"/>
	<input type="submit" value="Logout" name="logout"/>
	</div>
	</form>
	<I><FONT SIZE="2">(If you want to logout, Please click logout button twice!)</FONT></I>


	<hr>
    <I><FONT SIZE="2">You can make your comments here:</FONT></I>
	<TABLE WIDTH="460" ALIGN="CENTER" VALIGN="TOP">
		<TH COLSPAN="2">
		
		</TH>
        <!--
		<FORM NAME="guestbook" ACTION="index.php?id=<?php //echo $current; ?>" METHOD="POST">
        -->
        
        <FORM NAME="guestbook"  METHOD="POST" >
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP">Username:</TD>
			<TD><INPUT TYPE=text NAME=name id="name"></TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP">Comments:</TD>
			<TD><TEXTAREA NAME=comments id="com" COLS=40 ROWS=6></TEXTAREA>
			<!--<P><INPUT TYPE=submit VALUE=Submit name="submitcomment" id="sub" onSubmit="showHint()" > <INPUT TYPE=Reset VALUE=Reset>-->
            <P><INPUT TYPE="button" VALUE="确认" name="submitcomment" id="sub" onClick="showHint()" >
		</TD>
		</TR>
		</FORM>
	</TABLE>
  

	<?php
	$_SESSION["id"]= $current;
	// logout
	if(isset($_POST["logout"]))	
	{
		unset($_SESSION["authority"]);
		session_destroy();
	}
	
	//submit
	if(isset($_POST["submit"]))
	{	
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


		//读出最近的picID，然后加1
		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$b=$row["picID"];
		}
		$id=$b;
		$id++;
		
		//上传图片link to the file	
		if ($_FILES['userfile']['error'] > 0)
		{
			echo 'Problem: ';
			switch ( $_FILES['userfile']['error'])
			{
				case 1: echo'File exceeded upload_max_filesize';
				break;
				case 2: echo'File exceeded max_file_filesize';
				break;
				case 3: echo'File only partially uploaded';
				break;
				case 4: echo'No file uploaded';
				break;
				case 6: echo'Connot upload file: No temp directory specified';
				break;
				case 7: echo'Uplaod failed: Cannot write to disk';
				break;
			}
			exit;
		}

		//Does the file have the right MIME type?
		if ($_FILES['userfile']['type'] != 'image/jpeg')
		{
			echo'Problem: file is not image..';
			exit;
		}
	
		//put the file where we's like it
		$upfile = '/www/submissions/'.$_FILES['userfile']['name'];

		if(is_uploaded_file($_FILES['userfile']['tmp_name']))
		{
			if(!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile))
			{
				echo'Problem: Could not move file to destination directory';
				exit;
			}
		}
		else
		{
			echo'Probelm: Possible file upload attack. Filename: ';
			echo $_FILES['userfile']['name'];
			exit;
		}
	
		echo'<br><br>File uploaded successful<br><br>';
		
		//remove possible HTML and PHP tags from the file's contents
		$contents= file_get_contents($upfile);
		$contents= strip_tags($contents);
		file_put_contents($_FILES['userfile']['name'], $contents);
		$sql = "insert into list(picname, picID, picauthor, time) values ('".$_FILES['userfile']['name']."','".$id."','".$_SESSION["authority"]."',CURDATE())";
				if (mysql_query($sql))
		{
			echo("<br>Upload complete!</br>");
		}
		else
		{
			echo("<br>Error uploading: ".mysql_error(). "</br>");
		}
		mysql_close();
	}
		
	}
	else  // set id in the url
	{
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

$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			if ($_GET['id'] == $row["picID"])
			{
				$tempname=$row["picname"];
				$tempid=$row["picID"];
				$picauthor=$row["picauthor"];
				$pictime=$row["time"];
				break;
			}
		}
mysql_close();

		echo '<br>'."<IMG SRC=\"submissions/$tempname\">";
		echo( "<br> Author: ".$picauthor."</br>");
		echo( "<br> Time: ".$pictime."</br>");
		
	//}

 ?>
  <br>
  <br>
  <?php
  
//previous page and next page
$a=$_GET['id']-1;
$current=$_GET['id'];
$b=$_GET['id']+1;


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

		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$maxname=$row["picname"];
			$maxid=$row["picID"];
		}
		mysql_close();







if ($b <= $maxid)
{
?>
  <a href="index.php?id=<?php echo $b; ?>">Previous page</a>
  <?php
}
else
{
	echo "END";
}
if ($a >= 1)
{
?>
  <a href="index.php?id=<?php echo $a; ?>">Next page</a>
  <?php
}
else
{
	echo "END";
}
?>
  </div>
  <hr>
  <I><FONT SIZE="2">Comments:</FONT></I>
 
  <p><span id="txtHint4"></span></p>
 
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
		
		$result = mysql_query("select * from comment where picID = $current;");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			echo $row["author"].':<br>';
			echo $row["time"].'<br>';
			echo $row["content"].'<br><br>';
		}
		mysql_close();
   
   		
   
   
   
   
   
   
   
   
   
   
  ?>
  <hr>
  <I><FONT SIZE="2">You can uplaod your picture here:</FONT></I>
  
  <!-- upload picture  -->

<form action="index.php" method="post" enctype="multipart/form-data">
  <div>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<label for="usefile">
      <div align="left">Upload a file: </div>
    </label>
	<input type="file" name="userfile" id="userfile"/>
	<input type="submit" value="Submit" name="submit"/>
	<input type="submit" value="Logout" name="logout"/>
	</div>
	</form>
	<I><FONT SIZE="2">(You may notice a slight delay while we upload your file.)</FONT></I>


	<hr>
    <I><FONT SIZE="2">You can make your comments here:</FONT></I>
	<TABLE WIDTH="460" ALIGN="CENTER" VALIGN="TOP">
		<TH COLSPAN="2">
		
		</TH>
		        <!--
		<FORM NAME="guestbook" ACTION="index.php?id=<?php //echo $current; ?>" METHOD="POST">
        -->
        <FORM NAME="guestbook"  METHOD="POST" >
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP">Username:</TD>
			<TD><INPUT TYPE=text NAME=name id="name"></TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP">Comments:</TD>
			<TD><TEXTAREA NAME=comments id="com" COLS=40 ROWS=6></TEXTAREA>
			<!--<P><INPUT TYPE=submit VALUE=Submit name="submitcomment" onSubmit="showHint()"> <INPUT TYPE=Reset VALUE=Reset>-->
            <P><INPUT TYPE="button" VALUE="确认" name="submitcomment" id="sub" onClick="showHint()" >
		</TD>
		</TR>
		</FORM>
	</TABLE>
      



	<?php
	$_SESSION["id"]= $current;
	// logout
	if(isset($_POST["logout"]))	
	{
		unset($_SESSION["authority"]);
		session_destroy();
	}
	
	//submit
	if(isset($_POST["submit"]))
	{	
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


		//读出最近的picID，然后加1
		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$b=$row["picID"];
		}
		$id=$b;
		$id++;
		
		//上传图片link to the file	
		if ($_FILES['userfile']['error'] > 0)
		{
			echo 'Problem: ';
			switch ( $_FILES['userfile']['error'])
			{
				case 1: echo'File exceeded upload_max_filesize';
				break;
				case 2: echo'File exceeded max_file_filesize';
				break;
				case 3: echo'File only partially uploaded';
				break;
				case 4: echo'No file uploaded';
				break;
				case 6: echo'Connot upload file: No temp directory specified';
				break;
				case 7: echo'Uplaod failed: Cannot write to disk';
				break;
			}
			exit;
		}

		//Does the file have the right MIME type?
		if ($_FILES['userfile']['type'] != 'image/jpeg')
		{
			echo'Problem: file is not image..';
			exit;
		}
	
		//put the file where we's like it
		$upfile = '/www/submissions/'.$_FILES['userfile']['name'];

		if(is_uploaded_file($_FILES['userfile']['tmp_name']))
		{
			if(!move_uploaded_file($_FILES['userfile']['tmp_name'],$upfile))
			{
				echo'Problem: Could not move file to destination directory';
				exit;
			}
		}
		else
		{
			echo'Probelm: Possible file upload attack. Filename: ';
			echo $_FILES['userfile']['name'];
			exit;
		}
	
		echo'<br><br>File uploaded successful<br><br>';
		
		//remove possible HTML and PHP tags from the file's contents
		$contents= file_get_contents($upfile);
		$contents= strip_tags($contents);
		file_put_contents($_FILES['userfile']['name'], $contents);
		
			
		//insert the information into the table
		$sql = "insert into list(picname, picID, picauthor, time) values ('".$_FILES['userfile']['name']."','".$id."','".$_SESSION["authority"]."',CURDATE())";
		if (mysql_query($sql))
		{
			echo("<br>Upload complete!</br>");
		}
		else
		{
			echo("<br>Error uploading: ".mysql_error(). "</br>");
		}
		mysql_close();
	}
	
	
	
}
}
else  //user is not login
{
	if(isset($_GET["id"]))  // set id in the url
	{
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

		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			if ($_GET['id'] == $row["picID"])
			{
				//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
				$tempname=$row["picname"];
				$tempid=$row["picID"];
				$picauthor=$row["picauthor"];
				$pictime=$row["time"];
				break;
			}
		}
		mysql_close();

		echo '<br>'."<IMG SRC=\"submissions/$tempname\">";
		echo( "<br> Author: ".$picauthor."</br>");
		echo( "<br> Time: ".$pictime."</br>");
		
	$a=$_GET['id']-1;
	$b=$_GET['id']+1;
	$current=$_GET['id'];
	
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

		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			$maxname=$row["picname"];
			$maxid=$row["picID"];
		}
		mysql_close();


    ?>
    <br>
    <?php
	if ($b <= $maxid)
	{	
		?>
		<a href="index.php?id=<?php echo $b; ?>">Privious page</a>
		<?php
	}
	else
	{
		echo "END";
	}
	if ($a >= 1)
	{
		?>
		<a href="index.php?id=<?php echo $a; ?>">Next page</a>
		<?php
	}
	else
	{
		echo "END";
	}

	
	?>
	</div>
<hr>
  <I><FONT SIZE="2">Comments:</FONT></I>
  <p><span id="txtHint4"></span></p>
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
		
		$result = mysql_query("select * from comment where picID = $current;");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			echo $row["author"].':<br>';
			echo $row["time"].'<br>';
			echo $row["content"].'<br><br>';
		}
		mysql_close();
		
		
	}
	else  // not set id in the url
	{
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

		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$tempname=$row["picname"];
			$tempid=$row["picID"];
			$tempauthor=$row["picauthor"];
			$temptime=$row["time"];
		}
		mysql_close();

		$picid=$tempid;
		$picname=$tempname;
		$picauthor=$tempauthor;
		$pictime=$temptime;
		if(is_file("submissions/$picname"))
		{
			echo '<br>'."<IMG SRC=\"submissions/$picname\">";
			echo( "<br> Author: ".$picauthor."</br>");
			echo( "<br> Time: ".$pictime."</br>");
		}
	//fclose($fp);
	
	?>
	<br>
<?php
	$a=$tempid-1;
	$b=$tempid+1;
	$current=$tempid;
	
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

		$result = mysql_query("select * from list");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			$maxname=$row["picname"];
			$maxid=$row["picID"];
		}
		mysql_close();
	
	
	
	if ($b <= $maxid)
	{	
	?>
		<a href="index.php?id=<?php echo $b; ?>">Privious page</a>
	<?php
	}
	else
	{
		echo "END";
	}
	if ($a >= 1)
	{
	?>
		<a href="index.php?id=<?php echo $a; ?>">Next page</a>
	<?php
	}
	else
	{
		echo "END";
	}
	?>
	</div>
	<hr>
  <I><FONT SIZE="2">Comments:</FONT></I>
<p><span id="txtHint4"></span></p>
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
		
		$result = mysql_query("select * from comment where picID = $current;");
		while($row = mysql_fetch_array($result))
		{
			//echo("<br>".$row["picname"].$row["picID"].$row["picauthor"].$row["time"]."</br>");
			echo $row["author"].':<br>';
			echo $row["time"].'<br>';
			echo $row["content"].'<br><br>';
		}
		mysql_close();
}
}
?>

<?php
include("footer.inc");
?>
</body>
</html>