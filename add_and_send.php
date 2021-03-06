<?php

	session_start();

	require_once __DIR__ . '/db_connect.php';

	$db = new DB_CONNECT();

	

	function alert($msg){

        echo '<script type="text/javascript">alert("' . $msg . '");window.location = "send_notification.php"; </script>';

    }

    

    function prepareGCMAndSend($title,$message,$type){

		$jsonMessage = array();

		$jsonMessage["title"]=$title;

		$jsonMessage["message"]=$message;

		$jsonMessage["type"]=$type;

		$registrationIDs = array();

		$sql = "SELECT * FROM gcm_users;";

		$ref = mysql_query($sql);

		if (mysql_num_rows($ref) > 0){

			while($row = mysql_fetch_assoc($ref))

				$registrationIDs[]=$row["gcm_regid"];

		}

		return sendNotification($jsonMessage,$registrationIDs);

	}

	function sendNotification($jsonMessage,$registrationIDs){

		$apiKey = "AIzaSyC2pnmkewPVU5CCU0O8jHVOGrGvdYgFOhY";

		$url = 'https://android.googleapis.com/gcm/send';

		$result = "";
		$splittedArray = array_chunk($registrationIDs, 1000);
		foreach($splittedArray as $ids){
			$fields = array(

							'registration_ids'  => $ids,

							'data'              => $jsonMessage,

							);
			
			$headers = array( 

								'Authorization: key=' . $apiKey,

								'Content-Type: application/json'

							);

			$ch = curl_init();

			curl_setopt( $ch, CURLOPT_URL, $url );

			curl_setopt( $ch, CURLOPT_POST, true );

			curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);

			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

			$result .= "\n".curl_exec($ch);

			curl_close($ch);
		}

		return $result;

	}

	

	if (!isset($_SESSION["admin"]))

		Header("Location: index.php");

	else if(isset($_POST["title"])&&isset($_POST["message"])&&isset($_POST["type"])){

			$title=mysql_real_escape_string($_POST["title"]);

			$message=mysql_real_escape_string($_POST["message"]);

			$type=mysql_real_escape_string($_POST["type"]);

			$result = mysql_query("INSERT INTO notifications(title,message,type)VALUES('$title','$message','$type')");

			if($result){

				$response=prepareGCMAndSend($_POST["title"],$_POST["message"],$_POST["type"]);

				echo $response;

				alert("Notification send");

			}else

				alert("Fail to send notification");

	}else

		Header("Location: add_notification.php");

?>

