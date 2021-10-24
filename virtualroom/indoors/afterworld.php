<?php
    define('MAGIC', "WAAWamazing");

     // connection to the database
     require_once '../../../private/accessWAAW.php';
    
     
     $conn = new mysqli($host, $username, $password, $database);
 
     // Test connection
     if($conn->connect_error) {
         die ($conn->connect_error);
     }

     function isInteger($input){
        return(ctype_digit(strval($input)));
    }


     isset($_GET['question']) ? $question = $_GET['question'] : $question = "" ;
        isset($_GET['mob']) ? $mob = $_GET['mob'] : $mob = null;
     isset($_GET['plus']) ? $plus = $_GET['plus'] : $plus = null;

     $uri = $_SERVER['REQUEST_URI'];


 
     $linkMob = "";
     if ($mob == 'true') {
       if ( (isset($plus) && $plus != 'true') || ( !isInteger($question) && isset($question) ) )  {
            header("Location:?mob=true");
         }

         $linkMob = "&mob=true";
     } else {
        if ( (!isset($plus) || $plus != 'true') && ( !isInteger($question) || !isset($question) ) )  {
            header("Location:?question=1");
         }
     }
      

     
     $questions = array(
        "question1" => "What is the most beautiful thing you have seen, heard of or experienced during the confinement?",
        "question2" => "What is the first thing you want to do when the confinement will be over?",
        "question3" => "Is there an habit you took during the lockdown you want to continue on the \"after\"?",
        "question4" => "How do you see your social life on the in-between?",
        "question5" => "How does society should look like after the corona-virus situation in your opinion?"
     );



    //  send answer to the database
    if (isset($_POST['submit']) && $_POST['submit'] == "sendanswer" &&
        isset($_POST['answer']) && $_POST['answer'] != "" &&
        isset($_POST['questionid']) && isInteger($_POST['questionid']) && $_POST['questionid'] > 0 && $_POST['questionid'] < 6 ) {
            $answer = $_POST['answer'];
            $answer = str_replace("\n","<br>",$answer);
            $answer = strip_tags($answer, '<br>');
            $answer = mysqli_real_escape_string($conn, $answer);
            $questionId = $_POST['questionid'];

            $queryAnswer = "INSERT INTO indoors_answers (question_id, answer)
            VALUES ('$questionId', '$answer')";

            $resultAnswer = $conn->query($queryAnswer);

            if($resultAnswer > 0) {
                header("Location: ?question=$question$linkMob&answer=true");
            }
            

    }
    $message = "";
    if(isset($_GET['answer']) && $_GET['answer'] == 'true') {
        $message = "<p class=\"answer-received\">Your answer is saved!  Thank you to take the time to participate!</p>";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>After world // Indoors</title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.min.css" />
    <script src="../assets/js/menu.js"></script> -->
    <?php 
//     include('/inc/functions.php');
// $ua = getBrowser();
// $browser = $ua['name'];


?>
    <!-- Mandatory -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('inc/head.php'); ?>

    <!-- Styles  -->
    <?php 
    if (isset($browser) && $browser == 'Google Chrome') {
        echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"/assets/css/chrome.css\" />";
    }
    ?>


    <script>
    // This code redirect to url containing screen in GET

    var w = window.innerWidth;
    var screen = "<?php echo $mob; ?>";
    var currentURL = "<?php echo $uri;?>";

    if (w < 800 && screen == "" && currentURL.includes('?') ) {
        // if the viewport < 800px
        // redirect with the get part screen=mob
        window.location.href = currentURL + "&mob=true";
    } else if (w < 800 && screen == "" && !currentURL.includes('?')) {
        window.location.href = currentURL + "?screen=mob";
    } else if (w > 800 && screen == "true") {
        if (currentURL.includes('&mob=true')) {
            var newURL = currentURL.replace('&mob=true',' ');
            window.location.href = newURL;
        } else if (currentURL.includes('?mob=true')) {
            var newURL = currentURL.replace('?mob=true',' ');
            window.location.href = newURL;
        }
        
    }
    </script>
    </head>
    <body class="part5">
<?php include '../../inc/header.php'; ?>


   
   <main>
   <header>
            <h1><img src="assets/img/afterworld/indoorstitle.png" alt="Indoors title" class="title"></h1>
            <h2>After World</h2>
            <h3>Lola Jacrot &<br> Floriane Grosset</h3>
        </header>

        <?php 

        
       
            if(!isset($question) && !isset($plus)) {
                // mobile menu
                echo "
                    <div class=\"device\">
                    <header>
                        <h4>Lola & Floriane <br>
                            <span>Questions</span></h4>
                    </header>
                    <section class=\"afterworld\" id=\"mobile-menu\">";


                $keys = array_keys($questions);

                for($i=0; $i < count($questions); ++$i) {
                    $key = $keys[$i];
                    $questionNumber = $i+1;
                    $questionPrompt = $questions["$key"];
                    $questionPrompt = substr($questionPrompt, 0, 49) . "...";
                    echo "
                    <a href=\"?question=$questionNumber&mob=true\">
                    <div class=\"menu-question\">
                        <img src=\"assets/img/afterworld/". $keys[$i] .".png\" class=\"question-img\">
                        <p>". $questionPrompt ."</p>
                        <img src=\"assets/img/afterworld/arrowright.png\" class=\"right-arrow\">
                    </div>
                    </a>
                    ";
                }

                echo "
                    <a href=\"?plus=true&mob=true\">
                    <div class=\"menu-question\">
                        <img src=\"assets/img/afterworld/plusimage.png\" class=\"question-img\">
                        <p>Bonus content</p>
                        <img src=\"assets/img/afterworld/arrowright.png\" class=\"right-arrow\">
                    </div>
                    </a>
                    ";


                echo "</section>
                </div>
                ";


            } else if (!isset($plus)) {
                echo "<div class=\"device\">";
                if($mob == true) {
                    echo "
                    <header class=\"afterworld\" id=\"header\">
                        <a href=\"?mob=true\">
                            <img src=\"assets/img/afterworld/arrowleft.png\">
                            <img src=\"assets/img/afterworld/question$question.png\" class=\"question-img img-conversation\">

                            <p>Lola & Floriane<br><span class=\"question-number\">Question $question</span></p>
                        </a>
                    </header>
                    ";
                } else {
                    $classQuestion = "";
                    if (isset($question) && isInteger($question)) {
                        $classQuestion = "background-" . $question;
                        $breadcrumb = "Question " . $question;
                    } else {
                        $classQuestion = "background-plus";
                        $breadcrumb = "Bonus content";
                    }
                    echo "
                    <header class=\"afterworld $classQuestion\" id=\"header-desktop\" >";

                    $keys = array_keys($questions);
                    echo "<nav>";
                    for($i=0; $i < count($questions); ++$i) {
                        $key = $keys[$i];
                        $questionNumber = $i+1;
                        $questionPrompt = $questions["$key"];
                        $questionPrompt = substr($questionPrompt, 0, 15) . "...";
                        echo "
                        <a href=\"?question=$questionNumber\">
                             $questionPrompt
                        </a>
                        ";
                    }

                    echo "
                    <a href=\"?plus=true\" class=\"plus-link\">
                        +
                    </a>

                    </nav>
                    <p class=\"breadcrumbs\">Lola & Floriane's questions: $breadcrumb</p>";

                        
                    echo "</header>
                    ";
                }
                
                echo "
            <section class=\"afterworld question-answers\" id=\"question$question\">
            <div class=\"question\">
                <p>" . $questions["question$question"] . "</p>
                $message
                
                
            </div>
            <div class=\"answers\">
            ";

            $query = "SELECT * FROM indoors_answers WHERE question_id = '$question' ORDER BY answer_id DESC";
                $result = $conn->query($query);

                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $answer = $row['answer'];
                        $time = $row['time'];

                        echo "
                        <div class=\"message\"><p>$answer</p></div>
                        ";
                    }
                } else {
                    echo "<p>No answer yet</p>";
                }

                echo "</div>
                </section>";

                echo "<form action=\"?question=$question$linkMob\" method=\"post\">
                    <textarea type=\"text\" name=\"answer\" placeholder=\"Type your answer here\"></textarea>
                    <input type=\"hidden\" name=\"questionid\" value=\"$question\">
                    <button type=\"submit\" name=\"submit\" value=\"sendanswer\"><img src=\"assets/img/afterworld/send.png\"></button>
                </form>";

                echo "</div>";
        
            } else if ( isset($plus) ) {

                echo "<div class=\"device\">";
                if($mob == true) {
                    echo "
                    <header class=\"afterworld\" id=\"header\">
                        <a href=\"?mob=true\">
                            <img src=\"assets/img/afterworld/arrowleft.png\">
                            <img src=\"assets/img/afterworld/plusimage.png\" class=\"question-img img-conversation\">

                            <p>Lola & Floriane<br><span class=\"question-number\">Plus ++</span></p>
                        </a>
                    </header>
                    ";
                } else {

                    $classQuestion = "";
                    if (isset($question) && isInteger($question)) {
                        $classQuestion = "background-" . $question;
                        $breadcrumb = "Question " . $question;
                    } else {
                        $classQuestion = "background-plus";
                        $breadcrumb = "Bonus content";
                    }
                    echo "
                    <header class=\"afterworld $classQuestion\" id=\"header-desktop\" >";

                    $keys = array_keys($questions);
                    echo "<nav>";
                    for($i=0; $i < count($questions); ++$i) {
                        $key = $keys[$i];
                        $questionNumber = $i+1;
                        $questionPrompt = $questions["$key"];
                        $questionPrompt = substr($questionPrompt, 0, 15) . "...";
                        echo "
                        <a href=\"?question=$questionNumber\">
                             $questionPrompt
                        </a>
                        ";
                    }

                    echo "
                    <a href=\"?plus=true\" class=\"plus-link\">
                        +
                    </a>

                    </nav>
                    <p class=\"breadcrumbs\">Lola & Floriane's questions: $breadcrumb</p>
                    ";
                    
                        
                    echo "</header>
                    ";
                }
                
                echo "
            <section class=\"afterworld question-answers\" id=\"plus\">
                    <img src=\"assets/img/afterworld/social-distance.gif\" alt=\"A group of sims separated by social distance\">
                    <img src=\"assets/img/afterworld/sochaule-distanssingue.gif\" alt=\"Zoom on the group of sims\">
                    <img src=\"assets/img/afterworld/les-reseaux.gif\" alt=\"A group of sims in a room on their mobile phone\">
                    
                    ";

            

                echo "
                </section>
                </div>";

            }

            
            
        
        ?>

        
   </main>


    <?php 
    
    $conn->close();
    ?>

   
</body>
</html>