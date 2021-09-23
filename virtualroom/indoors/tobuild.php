<?php
    define('MAGIC', "WAAWamazing");
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Indoors</title>
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

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

    <!-- Styles  -->
    <link rel="stylesheet" type="text/css" media="screen" href="/virtualroom/indoors/assets/css/style.min.css" />
    <?php 
    if ($browser == 'Google Chrome') {
        echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"/assets/css/chrome.css\" />";
    }
    ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">  

    <!-- FavIcon -->
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">

    
    <!-- Scripts -->
    <script src="/assets/js/menu.js"></script>

    <!-- Tracker Clicky (Analytics) -->
    <script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101235170);</script>
    <script async src="//static.getclicky.com/js"></script>
    </head>
    <body class="index">
<?php include '../../inc/header.php'; ?>


    <img src="assets/img/flowerpot.jpg" alt="flower pot in the field" class="flower image">
   
    <main>
        <header>
            <h1><img src="assets/img/indoorstitle.png" alt="Indoors title" class="title"></h1>
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