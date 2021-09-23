<?php
    define('MAGIC', "WAAWamazing");
    header("Location: https://waawgallery.com");

    // connection to the database
    require_once '../private/accessWAAW.php';

    $conn = new mysqli($host, $username, $password, $database);

    // Test connection
    if($conn->connect_error) {
        die ($conn->connect_error);
    }


    // check if the user has already cookies
    if (isset($_COOKIE['user']) && isset($_COOKIE['temptoken'])) {
        // we found both cookies. 
            // check if they are valid (= match the database)
            
            // extract values from cookies
            
            $cookieuser = $_COOKIE['user'];
            $cookietoken = $_COOKIE['temptoken'];
            
            // connect to database to match the cookie values
            // outsource this later 
            
            // query for both user and temptoken at once
            
            $query = "SELECT * FROM soren_opening_users WHERE userid = $cookieuser 
                        AND temp_token LIKE '$cookietoken'";
            
            $result = $conn->query($query);
            
            if ($result->num_rows == 1) {
                
                // cookies match exactly one row. user exists. 
                // get user name

                while($user = $result->fetch_assoc()) {
                    $userName = $user['user_name'];
                }
                $coockies = true;
                
            } else {
                // The coockies are not valid
                $coockies = false;
            }
    } else {
        // No coockies or not both
        $coockies = false;
    }

// if not create a new persona with random name from books
if ($coockies === false) {
    if(isset($_POST['identification']) && $_POST['identification'] != "" &&
        isset($_POST['submit']) && $_POST['submit'] == "join") {
            $userName = $_POST['identification'];
            $userName = strip_tags($userName); // Remove the HTML tags
            $userName  = mysqli_real_escape_string($conn, $userName); // escape quotes that could break the query
            
            // color 
            $queryColorLastUser = "SELECT * FROM soren_opening_users ORDER BY userid DESC LIMIT 1";
            $resultLastColor = $conn->query($queryColorLastUser);
            $lastColor = $resultLastColor->fetch_assoc()['color'];

            switch($lastColor) {
                case "yellow":
                    $color = "red";
                break;
                case "red":
                    $color = "blue";
                break;
                case "blue":
                    $color = "yellow";
                break;
                default:
                    $color = "yellow";
            break;
            }


            // temptoken
            $temptoken = "";
            $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

            // iterating 24 times = adding one random character each time
            // the value 24 is arbitrary; seems secure enough

            for ($i = 0; $i < 24; $i++) {
                $temptoken .= $characters[rand(0, strlen($characters) - 1)];
            }

            // 1. set a cookie with that string
            setcookie('temptoken', $temptoken, time() + 12600, '/');

            // 2. set the same string in the database in the user row
                    // we know id, name, password; use the id to identify user

            $query = "INSERT INTO soren_opening_users (temp_token, user_name, color) 
                            VALUES ('$temptoken', '$userName', '$color')";

            $result = $conn->query($query);

            if($conn->error) {
                $debug = $query;
            }

            $userid = $conn->insert_id;
            setcookie('user', $userid, time() + 12600, '/');

            $cookieuser = $_COOKIE['user'];
            $cookietoken = $_COOKIE['temptoken'];

            $coockies = true;

        }

}



    // send message to the database
    if ($_POST['message'] != '' && isset($_POST['message']) &&
        $_POST['userid'] != '' && isset($_POST['userid']) &&
        $_POST['submit'] == 'Send' && isset($_POST['submit']) ) {
        // define variables
        $userId = $_POST['userid'];
        $message = $_POST['message'];
        // check if user exists
        $queryUser = "SELECT * FROM soren_opening_users WHERE userid = '$userId'";
        $resultUser = $conn->query($queryUser);
        if ($resultUser->num_rows == 1)  {
        $userName = $resultUser->fetch_assoc()['user_name'];
            // if the user exists then check the message safety
            $message = strip_tags($message); // Remove the HTML tags
            
            $message = mysqli_real_escape_string($conn, $message); // escape quotes that could break the query

            // send it to the database
            if ($message != "") {
                $date = time();
                $queryMessage = "INSERT INTO soren_opening_messages (userid, message, dato) VALUES ('$userId', '$message', '$date')";
                $resultMessage = $conn->query($queryMessage);
                if($resultMessage > 0) {
                    $newIsertedId = $conn->insert_id;
                    $resultDebug = "success";
                    // echo $userName;
                } else {
                    $resultDebug = "something went wrong";
                }
            } 
        } else {
            $resultDebug = "User not found";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include 'inc/head.php';?>
        <title>Opening Room / WAAW Gallery</title>
        <link rel="icon" href="/waawgallery/img/favicon.png" type="image/x-icon">
        <script>
            var presentUser = <?php echo $cookieuser ?>;
            // wait until the page is fully loaded before starting the check script
            window.addEventListener('load', function () {
                checkInterval = setInterval(check, 2000);
            });

            function check() {
                var xmlhttp = new XMLHttpRequest();
                var url = "checkNewMessages.php";
                
                var param = "lastid=" + lastMessageId + "&presentuserid=" + presentUser;
                
                xmlhttp.open("POST",  url, true);
                //Send the proper header information along with the request
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xmlhttp.onreadystatechange = function() {//Call a function when the state changes.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            if ( this.responseText != "") {
                                console.log(this.responseText);
                                var div = document.createElement('div');

                                var newMessages = this.responseText;
                                var array = newMessages.split("//");
                                newMessages = array[1];
                                var nbNewMessages = Number(array[0]);

                                

                                lastMessageId += nbNewMessages;

                                div.innerHTML = newMessages;
                                document.getElementById('chat').appendChild(div);

                                var alert = document.getElementById('alert');
                                alert.classList.add('active');
                            }
                        
                    }
            }
            xmlhttp.send(param);        
        }


        
        </script>
    </head>
    <body  class="opening">
        <main>

            <noscript id="noscript"><p>This page needs JavaScript. <br>Please enable java and reload the page to be with us.</p></noscript>
            <?php 
        if ($coockies === false) {
            echo "
            <div class=\"welcome-message active\" id=\"welcome-message\">
                
                <div>
                    <h1>Welcome to the Virtual Opening</h1>
                    
                    <p>The opening room is the online version of the opening,
                    but here you are engaging in one big conversation. Because 
                    gathering and talking is an important part of art making 
                    culture, you can share your ideas with other visitors, 
                    the artist and the gallery owner. </p>

                    <p>Please enter your name below to continue.</p>
                    <form action=\"\" method=\"POST\" id=\"identificaton-form\">
                        <input type=\"text\" name=\"identification\">

                        <p class=\"tiny-text\">Be aware that we are using cookies 
                        to remember your passage. Therefore if you are leaving the opening 
                        room and come back, you keep the same name.</p>

                        <button name=\"submit\" value=\"join\">Join the conversation</button>
                    </form>
                </div>

                
                
            </div>
            ";
        }
    
    ?>
            
            <h1>Virtual Opening</h1>
            <section class="chat" id="chat" onscroll="detectScroll()">
            
                <?php
                    
                    $queryMessages = "SELECT * FROM soren_opening_messages
                                        INNER JOIN soren_opening_users
                                            ON soren_opening_messages.userid = soren_opening_users.userid
                    ORDER BY dato DESC LIMIT 50 ";
                    $resultMessages = $conn->query($queryMessages);

                    if ($resultMessages->num_rows >= 1) {
                        $allMessage = "";
                        $lastMessageId = "";
                        while($message = $resultMessages->fetch_assoc()) {
                            
                            $messageId = $message['id'];
                            if($lastMessageId == "") {
                                $lastMessageId = $messageId;
                            }

                            $textMessage = $message['message'];
                            $author = $message['user_name'];
                            $date = $message['dato'];
                            $date = date("d/m/y - G:i:s", $date);
                            $authorid = $message['userid'];

                            $color = $message['color'];
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

                            $classSelv = "";
                            if ($authorid == $cookieuser) {
                                $classSelv = "self";
                            }

                            $message = "
                            <div class=\"text-message $classSelv\">
                                <p style=\"color: $colorMessage\">$author: $textMessage<br>
                                <span>$date</span>
                                </p>
                            
                            </div>\n\n";

                            $allMessage = $message . $allMessage;

                            
                        }

                        echo $allMessage;
                    }


                    var_dump($_POST);
                    echo $debug;
                
                ?>

            </section>

            <div id="alert" onclick="scrollDown()">&#8595; Scroll down to see new messages &#8595;</div>

            <section id="message-form">
                <form action="" method="POST">
                    <input type="text" name="message" placeholder="Write a message..." id="message" autocomplete="off" autofocus>
                    <input type="hidden" name="userid" value="<?php if (isset($cookieuser)) {echo $cookieuser;} else {echo $userid;}?>" id="userid">
                    <button type="submit" name="submit" value="Send">Send</button>
                </form>
            </section>

        
        </main>

        <script>
            // scrolldown onload
            var chatSection = document.getElementById('chat');
            chatSection.scrollTo(0, chatSection.scrollHeight);

            var lastMessageId = <?php if (isset($lastMessageId)){ echo $lastMessageId;} ?>;
            var alert = document.getElementById('alert');

            // remove the green label when new messages appear
            function detectScroll() {
                var scrollTop = chatSection.scrollTop + 500;
                if (chatSection.scrollHeight < scrollTop) {
                    alert.classList.remove('active');
                }
            }

            // scroll the chat section to the bottom smoothly
            function scrollDown() {
                chatSection.setAttribute("style", "scroll-behavior: smooth;");
                chatSection.scrollTo(0, chatSection.scrollHeight);
                alert.classList.remove('active');
            }
        </script>
        
    </body>
</html>
