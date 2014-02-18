<?php
	session_start();
	if (!isset($_SESSION["admin"]))
		Header("Location: index.php");
	else{
?>
<html>
	<head>
		<title>
			Send notification
		</title>
	<script type="text/javascript">
		function validate(){
			var title=document.forms["addForm"]["title"].value;
			var message=document.forms["addForm"]["message"].value;
			var type=document.forms["addForm"]["type"].value;
			if (title==null || title==""||message==null||message==""||type==null||type==""){
				alert("All feilds are required");
				return false;
			}else
				return true;
		}
	</script>
	</head>
	<body>
		<center>
			<h2>Send notification</h2><br/>
			<a href="index.php">Home</a><br/>
			<form name="addForm" action="add_and_send.php" method="post" onSubmit="return validate()" autocomplete="off">
				<table>
					<tr>
						<td>
							Title :
						</td>
						<td>
							<input type="text" name="title" maxlength="100" size="30"/>
						</td>
					</tr>
					<tr>
						<td>
							Message :
						</td>
						<td>
							<textarea name = "message"rows = "5" cols = "22" maxlength="500"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							Type :
						</td>
						<td>
							<select name="type">
								<option value="0" selected="selected">Notification</option>
								<option value="1">Software update</option>
							</select> 
						</td>
					</tr>
					<tr align="center" >
						<td colspan="2">
							<input type="submit" value="Add notification"/>
						</td>
					</tr>
				</table>
			</form>
		</center>
	</body>
</html>			
<?php
	}
?>
