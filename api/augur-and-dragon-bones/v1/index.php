<?php
$requestMethod = $_SERVER["REQUEST_METHOD"];
include('AugurAndDragonBones.php');
$api = new AugurAndDragonBones();
switch($requestMethod) {
	case 'GET':
		$api->getAugurAndDragonBonesData();
		break;
	default:
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}
?>