<?php
	$request_url=$_SERVER["REQUEST_URI"];
	
	if ($request_url=='/profile-page-setting.php' && (empty($_SESSION['userdata']))){		
		header("Location: ".BASE_URL);
	}
?>