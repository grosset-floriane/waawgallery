<?php
define('MAGIC', "WAAWamazing");
require  "../../classes/InfoPage.php";

$newPage = new InfoPage("/virtualroom/indoors/", $conn);
$head = $newPage->getHead($newPage->pageData);
$header = $newPage->getHeader($newPage->pageData);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Daydream // Indoors</title>
    <?php echo $head; ?> 

</head>
<body class="daydream">
    <?php echo $header;?>

   
   <main>
        <header>
            <h1><img src="assets/img/indoorstitle.png" alt="Indoors title" class="title"></h1>
            <h2>Daydream</h2>
            <h3>Lola Jacrot & Floriane Grosset</h3>
        </header>


       
        <div class="videos">
            <div class="video daydream" id="lola">
            <iframe src="https://www.youtube.com/embed/adBXVCokZsQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            </div>
        
        <iframe class="daydream" src="https://waawgallery.com/virtualroom/indoors/daydream3.html"></iframe>
        
   </main>


   
</body>
</html>