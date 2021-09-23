<?php

// CONNECT to the database
require_once '../../private/accessWAAW.php';

$conn = new mysqli($host, $username, $password, $database);

// Test connection
if($conn->connect_error) {
    die ($conn->connect_error);
}


$query = "SELECT * FROM emilie_poemsentences";
$result = $conn->query($query);
if($result->num_rows < 1) {
    // no rows
    // echo error 
    echo "no rows";
    die;
} else {
    echo $result->num_rows;
}

$currentId = $_REQUEST['cn'];
$currentTime = substr(str_replace('.', '', microtime(true)), 0, 13);
$queryUpdate = "UPDATE emilie_currentid SET current_id = '$currentId', current_time_stamp = '$currentTime' WHERE id = 0";
$resultUpdate = $conn->query($queryUpdate);



?>