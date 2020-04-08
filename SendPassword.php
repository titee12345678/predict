<html>
<head>
<title>ThaiCreate.Com Tutorials</title>
</head>
<body>
<?php
    $servername = "us-cdbr-iron-east-04.cleardb.net";
    $username = "bbe7a9b2c37b7d";
    $password = "e7c2625f";
    $dbname = "heroku_02daed7a46fa0e7";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn -> set_charset("utf8");
	$sql = "SELECT * FROM user WHERE UserName = '".trim($_POST['txtUsername'])."' 
	OR Email = '".trim($_POST['txtEmail'])."' ";
	$objQuery = mysqli_query($conn ,$sql);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Not Found Username or Email!";
	}
	else
	{
			echo "Your password send successful.<br>Send to mail : ".$objResult["Email"];		

			$strTo = $objResult["txtEmail"];
			$strSubject = "Your Account information username and password.";
			$strHeader = "Content-type: text/html; charset=UTF-8"; // or UTF-8 //
			$strHeader .= "From: webmaster@thaicreate.com\nReply-To: webmaster@thaicreate.com";
			$strMessage = "";
			$strMessage .= "Welcome : ".$objResult["FirstName"]."<br>";
			$strMessage .= "Username : ".$objResult["UserName"]."<br>";
			$strMessage .= "Password : ".$objResult["UserPassword"]."<br>";
			$strMessage .= "=================================<br>";
			$strMessage .= "ThaiCreate.Com<br>";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader); 

	}
	mysql_close();
?>
</body>
</html>