<?php
	session_start();
	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	function totalUser(){
		$sql = "SELECT count(*) FROM gcm_users";
		$ref = mysql_query($sql);
		if (mysql_num_rows($ref) > 0&&$row = mysql_fetch_assoc($ref))	
			return $row["count(*)"];
		return "0";
    }
	if (!isset($_SESSION["admin"]))
		Header("Location: login_form.php");
	else{
?>
<html>
	<head>
		<title>
			Welcome VTU Life Admin
		</title>
	</head>
	<body>
		<center>
			<h1>Notification Manager</h1><br/>
			<h2>Welcome Admin</h2><br/>
			<h3>Total registerd user : <?php echo totalUser();?></h3></br/>
			<a href="index.php">Home</a><br/>
			<a href="send_notification.php">Send notification</a><br/>
			<a href="select_notification.php">Old notification</a><br/>
			<a href="logout.php">Logout</a>
		</center>
	</body>
</html>
<?php
	}
?>
