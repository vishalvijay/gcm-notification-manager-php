<?php
	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	$response= array();
	if(isset($_POST["android_id"])&&isset($_POST["gcm_regid"])){
		$android_id=mysql_real_escape_string($_POST["android_id"]);
		$gcm_regid=mysql_real_escape_string($_POST["gcm_regid"]);
		$result = mysql_query("INSERT INTO gcm_users(android_id,gcm_regid)VALUES('$android_id','$gcm_regid') ON DUPLICATE KEY UPDATE gcm_regid = '$gcm_regid';");
		if($result){
			http_response_code(200);
			$response["result"]="success";
		}else{
			http_response_code(403);
			$response["result"]="fail";
		}
	}else{
		http_response_code(401);
		$response["result"]="access_denied";
	}
	echo json_encode($response);
?>
