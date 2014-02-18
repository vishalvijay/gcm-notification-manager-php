<?php
	session_start();
	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	
	if (!isset($_SESSION["admin"]))
		Header("Location: index.php");
	else{
?>
<html>
	<head>
		<title>Old notifications</title>
	</head>
	<body>
		<center>
			<h2>Old notifications</h2>
			<br/>
			<a href="index.php">Home</a><br/><br/>
		</center>
		<div style="padding-left: 400px;">
<?php
		$sql = "SELECT * FROM notifications";
		$ref = mysql_query($sql);
		if (mysql_num_rows($ref) > 0){
			while($row = mysql_fetch_assoc($ref)){
				echo "<a href=\"show_notifications.php?id=".$row["id"]."&title=".$row["title"]."&message=".$row["message"]."&type=".$row["type"]."&time=".$row["timeofinsertion"]."\">".$row["id"].") ".$row["title"]." (".$row["timeofinsertion"].")</a><br/>";
			}
		}else
			echo "There is no notification to show.<br/>";
	}
?>
	</div>
	</body>
</html>
