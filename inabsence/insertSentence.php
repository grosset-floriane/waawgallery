<?php
// Insert sentences
// CONNECT to the database
require_once '../../private/accessWAAW.php';

$conn = new mysqli($host, $username, $password, $database);

// Test connection
if($conn->connect_error) {
    die ($conn->connect_error);
}


// check is the user is legit (logged in)
// if a user is already logged in = coockies set and match session -> access granted
if (isset($_COOKIE['user']) && isset($_COOKIE['temptoken'])) {
    // we found both cookies. 
        // check if they are valid (= match the database)
        
        // extract values from cookies
        
        $cookieuser = $_COOKIE['user'];
        $currentUserId = $cookieuser;
        $cookietoken = $_COOKIE['temptoken'];
        
        // connect to database to match the cookie values
        // outsource this later 
        
        // query for both user and temptoken at once
        
        $query = "SELECT * FROM emilie_users WHERE user_id = '$cookieuser' 
                    AND temp_token LIKE '$cookietoken'";
        
        $result = $conn->query($query);
        
        if ($result->num_rows == 1) {
            
            // cookies match exactly one row. user is legit. 

            
            
            
        } else {
            // The coockies are not valid
            // Redirection to the loin page
            header('Location: login.php');
        }
} else {
    // No coockies or not both
    // Redirection to the index.php
    header('Location: login.php');
}

// Insert new sentence
if (isset($_POST['sentence']) && $_POST['sentence'] != "" && isset($_POST['submit']) && $_POST['submit'] == "Send"
    && isset($_POST['userid']) && $_POST['userid'] > 0 && isset($_POST['align']) && ($_POST['align'] == "left" || $_POST['align'] == "right")) {
        $userId = $_POST['userid'];
        if ($userId == $currentUserId) {
            // Check that the user id correspond to a legit user
            $queryUser = "SELECT * FROM emilie_users WHERE user_id = '$userId'";
            $resultUser = $conn->query($queryUser);

            if ($resultUser->num_rows == 1) {
                // found the user
                $sentence = $_POST['sentence'];
                $align = $_POST['align'];
                $currentTime = substr(str_replace('.', '', microtime(true)), 0, 13);
                

                // insert row
                $queryInsert = "INSERT INTO emilie_poemsentences (id, sentence, align, userid, dato) VALUES (NULL, '$sentence', '$align', '$userId', '$currentTime')";
                $resultInsert = $conn->query($queryInsert);
                if ($resultInsert > 0) {
                    // Success
                    $message = "<p class=\"success\">Your sentence has been successfully inserted.</p>";
                } else {
                    $message = "<p class=\"fail\">$sentence - $userId - $currentTime / An error occured. Please contact Floriane Grosset at <a href=\"mailto:fl.grosset@gmail.com\">fl.grosset@gmail.com</a></p>";
                }
            }
        }
        
}

// Update previous sentences
if (isset($_POST['update']) && $_POST['update'] != "" && isset($_POST['submit']) && $_POST['submit'] == "Update"
&& isset($_POST['sentenceid']) && $_POST['sentenceid'] > 0 && isset($_POST['align']) && ($_POST['align'] == 'left' || $_POST['align'] == 'right')) {
    $newSentence = $_POST['update'];
    $sentenceId = $_POST['sentenceid'];
    $align = $_POST['align'];
    $queryUpdate = "UPDATE emilie_poemsentences SET sentence = '$newSentence', align = '$align' WHERE id = '$sentenceId'";
    $result = $conn->query($queryUpdate);
    if ($result > 0) {
        $message = "<p class=\"success\">Sentence successfully updated!</p>";
    } else {
        $message = "<p class=\"fail\">An error occurred.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
    <main >
    <h1>Sentences manager</h1>
        <h2>Insert new sentences</h2>
        <?php if (isset($message)) {
                    echo $message;
            }?>
        <form method="post" action="">
            <label>Sentence:</label>
            <input type="text" name="sentence">
            <select name="align" id="align">
                <option value="left">align left</option>
                <option value="right">align right</option>
            </select>
            <input type="hidden" name="userid" value="<?php echo $currentUserId;?>">
            <input type="submit" value="Send" name="submit">
        </form>

        <h2>Manage your current sentences</h2>
        <?php // Retrieve all the sentences already in the data base

        $querySentences = "SELECT * FROM emilie_poemsentences ORDER BY id";
        $resultSentences = $conn->query("$querySentences");

        if($resultSentences->num_rows > 0) {
            // something found
            echo "<section class=\"conversation\">";
            while ($rowS = $resultSentences->fetch_assoc()) {
                $sentenceId = $rowS['id'];
                $sentence = $rowS['sentence'];
                
                $selectedLeft = "";
                $selectedRight = "";
                if ($rowS['align'] == "left") {
                    $selectedLeft = "selected";
                } else {
                    $selectedRight = "selected";
                }

                $userId = $rowS['userid'];

                $linkEdit = "";
                $formEdit = "";
                $class = "rigth";

                if ($userId == $currentUserId) {
                    $linkEdit = "- <button>Edit Sentence</button>";
                    $formEdit =  "
                            <form method=\"post\" action=\"\">
                            <input type=\"text\" value=\"$sentence\" name=\"update\">
                            <input type=\"hidden\" value=\"$sentenceId\" name=\"sentenceid\">
                            <select name=\"align\" id=\"align\">
                                <option value=\"left\" $selectedLeft>align left</option>
                                <option value=\"right\" $selectedRight>align right</option>
                            </select>
                            <input type=\"submit\" value=\"Update\" name=\"submit\">
                            </form>";
                    $class = "left";
                }

                echo "<div><p class=\"$class\">$sentence $linkEdit</p>
                            $formEdit
                        </div>";
                
                

            }
            echo "</section>";
        }
            // provide a form to update the sentence
        
        
        
        
        ?>

    </main>


    
</body>
</html>
