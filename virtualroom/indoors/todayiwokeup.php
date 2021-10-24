<?php
    define('MAGIC', "WAAWamazing");
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Today I Woke Up. Or Was It Yesterday, I can't Remember. //Indoors</title>
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
    if ( isset($browser) && $browser == 'Google Chrome') {
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
    <body class="part2">
<?php include '../../inc/header.php'; ?>



<img src="assets/img/sky.gif" alt="Sun rise and sunset animation" class="sky image">
   
   <main>
       <header>
           <h1><img src="assets/img/indoorstitle.png" alt="Indoors title" class="title"></h1>
           <h2>Today, I woke up. Or was it yesterday, I can't remember.</h2>
           <h3>Lola Jacrot & Floriane Grosset</h3>
       </header>
       
       <div class="videos">
           <div class="video wokeup" id="lola">
               <iframe src="https://www.youtube.com/embed/5WB9wVTmlw8" 
               frameborder="0" 
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
               allowfullscreen></iframe>
           </div>

           </div>


       <div class="gallery wokeup">
           <img src="assets/img/9h.gif" alt="9h. I fall back asleep. " class="gallery-image left">
           <img src="assets/img/10h.gif" alt="10h. I dreamed of him." class="gallery-image right">
           <img src="assets/img/11h.gif" alt="11h. Floriane asked me to write every hour a thought or an action. " class="gallery-image left">
           <img src="assets/img/12h.gif" alt="12h. the crows are very loud today. " class="gallery-image right">
           <img src="assets/img/13h.gif" alt="13h. we eat parsnip with cajun rice on the balcony. " class="gallery-image left">
           <img src="assets/img/14h.gif" alt="14h. I watch a music live of italo-disco-kraut by Victor. we comments with some random italian words. " class="gallery-image right">
           <img src="assets/img/15h.gif" alt="15h. I listen outside to my playlist music to listen in the sun but it s not." class="gallery-image">
           <img src="assets/img/16h.gif" alt="16h. It's coffee time with homemade haselnut milk. " class="gallery-image right">
           <img src="assets/img/17h.gif" alt="17h. Now there is a lot of sun and I struggle to keep myself and my laptop in the shadow " class="gallery-image">
           <img src="assets/img/18h.gif" alt="18h. My neighboor keeps listening very loud with open window the same 3 songs. Every. Single. Time. At least they're not that bad. " class="gallery-image right">
           <img src="assets/img/19h.gif" alt="19h. We have a family video meeting. We drink a full bottle on cider, I'm slightly drunk. " class="gallery-image">
           <img src="assets/img/20h.gif" alt="20h. The street applause caregivers. We take the laptop outside to show the family. " class="gallery-image right">
           <img src="assets/img/21h.gif" alt="21h. I read my entire lockdown diary to understand how time can pass so fast and slowly at the same time." class="gallery-image">
           <img src="assets/img/22h.gif" alt="22h. I try to recreate the mess of Flo's appartment in the sims. " class="gallery-image right">
           <img src="assets/img/23h.gif" alt="23h. I wish I could feel his skin against mine. " class="gallery-image">
           <img src="assets/img/00h.gif" alt="00h. still talking to him. " class="gallery-image right">
           <img src="assets/img/01h.gif" alt="01h. again. " class="gallery-image">
           <img src="assets/img/02h.gif" alt="02h. now I can go to sleep. " class="gallery-image right">

       </div>
       
       
   </main>


   
</body>
</html>