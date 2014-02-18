<?php
	session_start();
	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	
	if (!isset($_SESSION["admin"]))
		Header("Location: index.php");
	else{
		if(isset($_GET["id"])&&isset($_GET["title"])&&isset($_GET["message"])&&isset($_GET["type"])&&isset($_GET["time"])){
?>
<html>
	<head>
		<title>Delete?</title>
		<script type="text/javascript">
			function goBack(){
				window.location = "select_notification.php?pageFor=0";
			}
		</script>
	</head>
	<body>
		<center>
			<h2>Are you sure want to delete this notification?</h2><br/>
			<a href="index.php">Home</a><br/>
			<a href="select_notification.php?pageFor=0">Go back</a><br/><br/>
			<table cellpadding="3" border="1">
				<tr>
					<th>
						Item
					</th>
					<th>
						Content
					</th>
				</tr>
				<tr>
					<td>
						Id
					</td>
					<td>
						<?php echo $_GET["id"];?>
					</td>
				</tr>
				<tr>
					<td>
						Title
					</td>
					<td>
						<?php echo $_GET["title"];?>
					</td>
				</tr>
				<tr>
					<td>
						Message
					</td>
					<td>
						<?php echo $_GET["message"];?>
					</td>
				</tr>
				<tr>
					<td>
						Type
					</td>
					<td>
						<?php echo $_GET["type"]==0?"Notification":"Software update";?>
					</td>
				</tr>
				<tr>
					<td>
						Time
					</td>
					<td>
						<?php echo $_GET["time"]?>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>
<?php
		}else
			Header("Location: select_notification.php?pageFor=0");
	}
?>
