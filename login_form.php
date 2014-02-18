<?php
	session_start();
	if (isset($_SESSION["admin"]))
		Header("Location: index.php");
	else{
?>
		<html>
			<head>
				<title>
					Login
				</title>
			</head>
			<body>
				<center>
					<h1>Notification Manager</h1><br/>
					<h2>Admin Login</h2><br/>
					<form action="login.php" method="post">
						<table>
							<tr>
								<td>
									Username : 
								</td>
								<td>
									<input type="text" name="username"/>
								</td>
							</tr>
								<tr>
								<td>
									Password : 
								</td>
								<td>
									<input type="password" name="password"/>
								</td>
							</tr>
							<tr align="center">
								<td colspan="2" >
									<input type="submit" value="Login"/>
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
