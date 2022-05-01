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
    <title>To Build // Indoors</title>
    <?php echo $head; ?>

 
</head>
<body class="index">
    <?php echo $skipLink;?>
    <?php echo $header;?>
    

    <img src="assets/img/flowerpot.jpg" alt="flower pot in the field" class="flower image">
   
    <main id="main">
        <header>
            <h1>
                <a href="info.php">
                    <img src="assets/img/indoorstitle.png" aria-label="Indoors title" class="title">
                </a>
            </h1>
            <h2>Lola Jacrot & Floriane Grosset</h2>
        </header>
        
        <div class="videos">
            <div class="video" id="lola">
                <iframe src="https://www.youtube.com/embed/LXsWpBPRBas" 
                frameborder="0" 
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>
            </div>

            <div class="video" id="floriane">
            <iframe src="https://player.vimeo.com/video/406805164"
             frameborder="0" 
             allow="autoplay; fullscreen" allowfullscreen></iframe>
             <img src="assets/img/curtain.jpg" alt="looking between the curtains" class="curtain image">
            </div>
        </div>

        <div class="gallery">
            <img src="assets/img/before_the_end.jpg" alt="before the end" class="gallery-image">
            <img src="assets/img/empty_streets.jpg" alt="empty streets" class="gallery-image">
            <img src="assets/img/hard.jpg" alt="hard" class="gallery-image">
            <img src="assets/img/hug_on_the_couch.jpg" alt="hug on the couch" class="gallery-image">
            <img src="assets/img/I_hug_élie.jpg" alt="I hug élie" class="gallery-image">
            <img src="assets/img/I_stab_him.jpg" alt="I stab him" class="gallery-image">
            <img src="assets/img/pizzas.jpg" alt="pizzas" class="gallery-image">
            <img src="assets/img/screens_of_discord.jpg" alt="screens of discord" class="gallery-image">
            <img src="assets/img/soba_coriander.jpg" alt="soba coriander" class="gallery-image">
            <img src="assets/img/zoo.jpg" alt="zoo" class="gallery-image">

        </div>
        
        
    </main>


    
</body>
</html>