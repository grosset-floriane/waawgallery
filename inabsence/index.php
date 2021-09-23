<?php define('MAGIC', "WAAWamazing");
// Publicly accessible file
// CONNECT to the database
require_once '../../private/accessWAAW.php';

$conn = new mysqli($host, $username, $password, $database);

// Test connection
if($conn->connect_error) {
    die ($conn->connect_error);
}

// // CHECK IF THERE IS ALREADY SOMEONE USING THE MASTER PAGE
// Get the current nb in the master file
$queryCurrentId = "SELECT * FROM emilie_currentid";
$lastSavedTime = $conn->query($queryCurrentId)->fetch_assoc()['current_time_stamp'];
$currentTime = substr(str_replace('.', '', microtime(true)), 0, 13);
if (($currentTime - $lastSavedTime) >= 11000) {
    // No changes made since awhile
    // probably someone nobody looking at the master page
    // redirect towards the master page
    header("Location: main.php");
}

// Get the current nb in the master file
$queryCurrentId = "SELECT * FROM emilie_currentid";
$currentId = $conn->query($queryCurrentId)->fetch_assoc()['current_id'];

$lastTime = $conn->query($queryCurrentId)->fetch_assoc()['current_time_stamp'];


$query = "SELECT * FROM emilie_poemsentences ORDER BY id";
$result = $conn->query($query);
if($result->num_rows < 1) {
    // no rows
    // echo error 
    echo "no rows";
    die;
} else {
    
    $numRows = $result->num_rows;
    $totalDisplayLines = 25; // 25 lines appear on the front page
    $period = 10000; // every 10seconds
    $currentTime = substr(str_replace('.', '', microtime(true)), 0, 13);
    $alreadyDisplayedLines = 1;
    
    if ($currentId >= $totalDisplayLines) {
        // all the lines are from the first set

        $firstId = $currentId - $totalDisplayLines - 10;
        $query = "SELECT * FROM emilie_poemsentences WHERE id <= $currentId AND id >= $firstId ORDER BY id DESC";
        $result = $conn->query($query);
        // third part
        $thirdPart = "";
        while($sentence = $result->fetch_assoc()) {
            

            $calculatedTime = $currentTime - $alreadyDisplayedLines * $period;
            
            if ($sentence['id'] <= $currentId && $alreadyDisplayedLines <= $totalDisplayLines && $sentence['dato'] < $calculatedTime) {
                $text = $sentence['sentence'];
                $align = $sentence['align'];
                $id = $sentence['id'];
                $thirdPart = "<div class=\"$align\">$text</div>" . $thirdPart;
                $alreadyDisplayedLines++;
            }
        }


    } elseif ($currentId < $totalDisplayLines) {
        // a part is numbers from 1 to 25

        
        $query = "SELECT * FROM emilie_poemsentences WHERE id <= $currentId ORDER BY id";
        $result = $conn->query($query);
        // third part
        $thirdPart = "";
        while($sentence = $result->fetch_assoc()) {
            
            if ($sentence['id'] <= $currentId && $alreadyDisplayedLines <= $totalDisplayLines) {
                $text = $sentence['sentence'];
                $align = $sentence['align'];
                $id = $sentence['id'];
                $thirdPart .= "<div class=\"$align\">$text</div>";
                $alreadyDisplayedLines++;
            }
        }

        $sentencesLeft = $totalDisplayLines - $alreadyDisplayedLines;

        // a part is the last numbers to the number of lines before
        // second part 
        $secondPart = "";
        

        $query2 = "SELECT * FROM emilie_poemsentences ORDER BY id DESC LIMIT $sentencesLeft";
        $result2 = $conn->query($query2);

        while($sentence = $result2->fetch_assoc()) {

            $calculatedTime = $currentTime - $alreadyDisplayedLines * $period;
            if ($sentence['dato'] < $calculatedTime && $alreadyDisplayedLines <= $totalDisplayLines) {
                $text = $sentence['sentence'];
                $align = $sentence['align'];
                $id = $sentence['id'];
                $secondPart = "<div class=\"$align\">text</div>" . $secondPart;
                $alreadyDisplayedLines++;

            }
        }
        
        

    }

    
} 

// Get the current nb in the master file

$nextId = $currentId + 1;
if ($nextId > $numRows) {
    $nextId = 1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Inabsence / Emilie Wright</title>
    <?php include 'inc/head.php'; ?>
    


<script>

var nextId = <?php echo $nextId; ?>;
// Reset variables

var n=nextId; // nb in the number of 
var numRows =<?php echo $numRows; ?>;


var currentTime = Date.now();
var waitingTime = (<?php echo $lastTime; ?> + 10000 - currentTime) - 500; // time to wait in millisecond

// Do nothing function (wait)
function waitAndDo() {
    do_line();
    setInterval(do_line, 10000);
}


// function to repeat action
function poem() 
{

window.scrollTo(0, document.body.scrollHeight);

setTimeout(waitAndDo, waitingTime);


}

// function to create the final line
function do_line() {
var main=document.getElementById('main');
 

     // remove one line
main.removeChild(main.firstChild);


 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.numRows = this.responseText;   
            }
        };
        xmlhttp.open("GET", "synchroNumRows.php", true);
        xmlhttp.send();
     

    // If n==0
    if (n === 0) {
        text = '';
        last=document.createElement('div');
        // add the created text to the last div created
        last.appendChild(document.createTextNode(text));
        // place the new div in the main element
        main.appendChild(last);
        n+= 1;
    } else if (n <= numRows) {
        // if n <= totalnumrows
        // get the corresponding sentence
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                text = this.responseText;
                // separate informations
                var array = text.split("\\");
                // get text
                text = array[1];
                // get alignment
                var align = array[0];
                // create a new div 
                last=document.createElement('div');
                // add the created text to the last div created
                if (text == "<br>") {
                    text = "";
                }
                last.appendChild(document.createTextNode(text));
                // add alignment as a class to the div
                last.classList.add(align);
                if (text == "") {
                    var classEmpty = "empty";
                    last.classList.add(classEmpty);
                }
                // place the new div in the main element
                main.appendChild(last);
                window.scrollTo(0, document.body.scrollHeight);
            }
        };
        xmlhttp.open("GET", "accessdatabase.php?x=" + n, true);
        xmlhttp.send(); 

        

        if (n < numRows){
            // if n is not yet the number of rows, add one
            n+=1;
        } else {
            // if n is the number of rows, back to the first sentence
            n=1;
        }

    }


 


}

</script>
</head>

<body onLoad="poem()">
    <?php include '../inc/header.php'; ?>
    <main id="main">

        <?php echo $firstPart . $secondPart . $thirdPart; ?>

    </main>


</body>
    

</html>