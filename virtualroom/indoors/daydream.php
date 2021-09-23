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
    <body class="part2 part3">
<?php include '../../inc/header.php'; ?>


   
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