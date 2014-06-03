<?php
session_start();
$data = array(
                'validated' => 'OK'
                );				
if (!empty($_POST['userdata'])){
	$_SESSION['userdata']=$_POST['userdata'];
}else{
	session_destroy();
}
echo json_encode($data);