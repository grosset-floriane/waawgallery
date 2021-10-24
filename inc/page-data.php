<?php 

require('../../private/accessWAAW.php');
$conn = new mysqli($host, $username, $password, $database);

// Test connection
if($conn->connect_error) {
    die ($conn->connect_error);
}

function getPageData($id = 1) {
    global $conn;
    $query = "SELECT * FROM pages_infos
                    WHERE id = $id";
    $result = $conn->query($query);
    if($result->num_rows < 1) {
        // not fount 
        echo "no rows";
        die;
    } else {
        $data = [];
        while($pageData = $result->fetch_assoc()) {
            array_push($data, $pageData);
        }
    }

    return $data[0];
}