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




?>