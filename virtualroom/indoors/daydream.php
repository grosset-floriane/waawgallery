<?php
define('MAGIC', "WAAWamazing");
require  "../../classes/InfoPage.php";

$newPage = new InfoPage("/virtualroom/indoors/", $conn);
$head = $newPage->getHead($newPage->pageData);
$header = $newPage->getHeader($newPage->pageData);
$skipLink = $newPage->getSkipLinkToContent();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Daydream // Indoors</title>
    <?php echo $head; ?> 

</head>
<body class="daydream">
<?php echo $skipLink;?>
    <?php echo $header;?>

   
   <main id="main">
        <header>
            <h1>
                <a href="info.php">
                    <img src="assets/img/indoorstitle.png" aria-label="Indoors title" class="title">
                </a>
            </h1>
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