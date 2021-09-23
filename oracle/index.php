<?php
    define('MAGIC', "WAAWamazing");
    
?>

<?php
if ($_POST['submit'] == "Ask" && strpos($_POST['question'], '?') && $_POST['question'] != $_POST['previous']) {
    $question = $_POST['question'];
    $question = strip_tags($question);
    

    $data = file_get_contents('http://oracle.sedb.no/oracle');
    $data = json_decode($data);
    if (empty($data)) {
        $err = "empty array";
    }
    $answer = $data[0];
    $author = $data[1];
    $bookTitle = $data[2];

    $currentDate = date("d/m/y - G:i:s");

    $myfile = fopen("record.txt", "a+") or die("Unable to open file!");
    $txt = "
T: $currentDate
Q: $question
A: $answer
$bookTitle, $author
\n\n
    ";
    fwrite($myfile, $txt);
    fclose($myfile);

} elseif ($_POST['submit'] == "Ask" && strpos($_POST['question'], '?') && $_POST['question'] == $_POST['previous']) {
    $message = "<p class=\"message\">Please enter a different question.</p>";
} elseif ($_POST['submit'] == "Ask") {
    $message = "<p class=\"message\">Please enter a question below to get an answer (don't forget the question mark).</p>";
    $question = $_POST['question'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Bibliomancy Oracle</title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.min.css" />
    <script src="../assets/js/menu.js"></script> -->
    <?php include 'inc/head.php';?>
    </head>
<body class="index">
<?php include '../inc/header.php'; 
echo $err;
?>
    

    <main>
        <header>
            <img src="assets/img/bibliomancyTitle.gif" class="title-oracle" id="title" alt="Bibliomancy Oracle blinky title">
            <a href="credits.php"><img src="assets/img/logo1.gif" class="logo-oracle" alt="Open book with glittered eye"></a>
        </header>
        <?php 
                if ($message) {
                    echo $message;
                }
            ?>
        <form action="#form" method="POST" id="form">
            <input type="hidden" name="previous" value="<?php if ($question) {echo $question;}?>">
            <input type="search" name="question" id="" placeholder="Type your question here" value="<?php if ($question) {echo $question;}?>" autocomplete="off">
            <button type="submit" name="submit" value="Ask">Ask</button>
        </form>

        <?php if ($answer && $author && $bookTitle) {
            echo "
                <blockquote id=\"quote\">
                    <p>$answer</p>
                    <p class=\"book-info\"><span class=\"title\">$bookTitle</span>, <span class=\"author\">$author</span></p>
                </blockquote>
            ";

        } ?>

        
    </main>


    
</body>
</html>