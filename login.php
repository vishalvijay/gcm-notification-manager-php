<?php	
	session_start();
	
	if(isset($_POST["username"])&&isset($_POST["password"])){

		if("admin"===$_POST["username"]&&"d033e22ae348aeb5660fc2140aec35850c4da997"===sha1($_POST["password"])){
			Header("Location: index.php");
			$_SESSION["admin"]= $_POST["username"];
		}
		else
		{
?>
<html>
	<head>
		<title>
			Login
		</title>
	</head>
	<body>
		<center>
			<h2>Access denied</h2><br/>
			<a href="index.php">Home</a><br/>
			Wrong username or password.<br/>
		</center>
	</body>
</html>
<?php	
		}
	}else{
		session_unset();
		session_destroy();
		Header("Location: index.php");
	}	
?>
