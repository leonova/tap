<?php
session_start();
$data = array(
                'validated' => 'OK'
                );				
if (!empty($_POST['userdata'])){
	$_SESSION['userdata']=$_POST['userdata'];
	$_SESSION['otherdata']=$_POST['otherdata'];
	$_SESSION['childdata']=$_POST['childdata'];
}else{
	session_destroy();
}
echo json_encode($data);