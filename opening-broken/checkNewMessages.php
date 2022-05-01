<?php

// CONNECT to the database
require_once '../private/accessWAAW.php';

$conn = new mysqli($host, $username, $password, $database);

// Test connection
if($conn->connect_error) {
    die ($conn->connect_error);
}

$lastMessageId = $_POST['lastid'];
$lastMessageId = (int)$lastMessageId;
$presentUser = $_POST['presentuserid'];

$queryNewMessages = "SELECT * FROM soren_opening_messages 
                        INNER JOIN soren_opening_users
                            ON soren_opening_messages.userid = soren_opening_users.userid 
                            WHERE soren_opening_messages.id > $lastMessageId AND NOT soren_opening_messages.userid = '$presentUser' ORDER BY dato";

$resultNewMessages = $conn->query($queryNewMessages);
$newMessages = "";
if ($resultNewMessages->num_rows >= 1) {
    $newMessages = "";
    while($row = $resultNewMessages->fetch_assoc()) {
        $messageId = $message['id'];
        $message = $row['message'];
        $userid = $row['userid'];
        $username = $row['user_name'];
        $color = $row['color'];
        $date = $row['dato'];
        $date = date("d/m/y - G:i:s", $date);

        switch($color) {
            case "blue":
                $colorMessage = "#0000ff";
                break;
            case "yellow":
                $colorMessage = "#fff200";
                break;
            case "red":
                $colorMessage = "#ff0000";
                break;
            default:
                $colorMessage = "#fff200";
                break;
        }

        $message = "
        <div class=\"text-message\">
            <p style=\"color: $colorMessage\">$username: $message<br>
            <span>$date</span>
            </p>
        </div>\n\n";

        $newMessages .= $message;
    }
    

        $numRows = $resultNewMessages->num_rows * 1;
        $newMessages = $numRows . "//" . $newMessages;

        echo $newMessages;

    
}




?>