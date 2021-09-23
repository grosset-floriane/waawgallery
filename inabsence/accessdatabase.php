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
}


// get the x parameter from URL
$x = $_REQUEST["x"];


$sentence = "";

// lookup all hints from array if $q is different from ""
if ($x !== "") {
    while($entry = $result->fetch_assoc()) {
        if ($x == $entry['id']) {
            $sentence = $entry['sentence'];
            $align = $entry['align'];
        }
    }
    
}

// Output "no sentence" if no hint was found or output correct values
echo $sentence === "" ? "no sentence" : "$align\\$sentence";


?>