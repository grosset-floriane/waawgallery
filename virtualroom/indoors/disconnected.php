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

<!-- Fotorama -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
    <script type="text/javascript" src="/js/vendors/jquery/jquery.js"></script>
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
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

    <!-- FavIcon -->
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">

    
    <!-- Scripts -->
    <script src="/waawgallery/assets/js/menu.js"></script>

    

    <!-- Tracker Clicky (Analytics) -->
    <script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101235170);</script>
    <script async src="//static.getclicky.com/js"></script>
    </head>
<body class="part4">
<?php include '../../inc/header.php'; ?>

   
    <main>
        <header>
            <h1>Indoors</h1>
            <h2>DISCONNECTED</h2>
            <h3>Lola Jacrot & Floriane Grosset</h3>
        </header>

        
        <section class="diconnected-section windows right first" id="">
            <img src="assets/img/windows/1.jpg" alt="View from window 1"/>
        </section>

        <section class="diconnected-section" id="letterlola">
            <a href="assets/img/letterlola/letterlola1.png" title="Click to open the image in a new tab" target="_BLANK"><img src="assets/img/letterlola/letterlola1.png" alt="Letter from Lola to Floriane first part" /></a>
            <a href="assets/img/letterlola/letterlola2.png" title="Click to open the image in a new tab" target="_BLANK"><img src="assets/img/letterlola/letterlola2.png" alt="Letter from Lola to Floriane second part" /></a>
            <p><a href="lolaletter.php">See the digital text of Lola's letter</a></p>
        </section>

        

        <section class="diconnected-section windows" id="">
            <img src="assets/img/windows/2.jpg" alt="View from window 2" />
        </section>

        <section class="diconnected-section" id="drawings">
            <img src="assets/img/drawings/flo-trees.jpg" alt="Pencil drawing of trees 'Is a city tree a domesticated tree?'" />
            <img src="assets/img/drawings/flo-fences.jpg" alt="Pencil drawing of fences 'Is security a constraint to our choices?'" />
            <img src="assets/img/drawings/flo-signage.jpg" alt="Pencil drawing of signage 'Do cats and dogs understand signage?'" />

        </section>
        

        <section class="diconnected-section windows right" id="">
            <img src="assets/img/windows/3.jpg" alt="View from window 3" />
        </section>

        <section class="diconnected-section" id="squaretexts">
            <img src="assets/img/squaretexts/artopenings.jpg" alt="Text in square about art openings" />
            <img src="assets/img/squaretexts/bergennerdschool.jpg" alt="Text in square about Bergen nerd school" />
            <img src="assets/img/squaretexts/café.jpg" alt="Text in square about working in cafés" />
            <img src="assets/img/squaretexts/cinematek.jpg" alt="Text in square about Bergen Cinemateket" />
            <img src="assets/img/squaretexts/libraries.jpg" alt="Text in square about libraries" />
            <img src="assets/img/squaretexts/norwegianhugs.jpg" alt="Text in square about the Norwegian hug" />
        </section>

        <section class="diconnected-section windows" id="">
            <img src="assets/img/windows/4.jpg" alt="View from window 4" />
        </section>

        <section class="diconnected-section" id="letterflo">
            <img src="assets/img/letterflo/corridor.jpg" />
            <div class="letterflo">
            <a href="assets/img/letterflo/letterflo1.jpg" title="Click to open the image in a new tab" target="_BLANK"><img src="assets/img/letterflo/letterflo1.jpg" /></a>
            <a href="assets/img/letterflo/letterflo2.jpg" title="Click to open the image in a new tab" target="_BLANK"><img src="assets/img/letterflo/letterflo2.jpg" /></a>
            <p><a href="floletter.php">See the digital text of Floriane's letter</a></p>
            </div>
        </section>

        <section class="diconnected-section windows right" id="">
            <img src="assets/img/windows/5.jpg" alt="View from window 5" />
        </section>


        <section class="diconnected-section" id="walkers">
            <div class="gauche_accueil fotorama" data-nav="thumbs" data-click="true"  data-height="100%">
                    <img class="img" src="assets/img/walkers/1L.jpg" alt="Walker going to the left" />
                    <img class="img" src="assets/img/walkers/2L.jpg" alt="Walker going to the left" />
                    <img class="img" src="assets/img/walkers/3L.jpg" alt="Walker going to the left" />
                    <img class="img" src="assets/img/walkers/4L.jpg" alt="Walker going to the left" />
                    <img class="img" src="assets/img/walkers/5L.jpg" alt="Walker going to the left" />
                    <img class="img" src="assets/img/walkers/6L.jpg" alt="Walker going to the left" />
                    <img class="img" src="assets/img/walkers/7L.jpg" alt="Walker going to the left" />
                    <!--<img class="img" src="assets/img/walkers/8L.jpg" />
                    <img class="img" src="assets/img/walkers/9L.jpg" />
                    <img class="img" src="assets/img/walkers/10L.jpg" />
                    <img class="img" src="assets/img/walkers/11L.jpg" />
                    <img class="img" src="assets/img/walkers/12L.jpg" />
                    <img class="img" src="assets/img/walkers/13L.jpg" />-->
                </div>

                <div class="gauche_accueil fotorama" data-nav="thumbs" data-click="true"  data-height="100%">
                    <img class="img" src="assets/img/walkers/1R.jpg" alt="Walker going to the right" />
                    <img class="img" src="assets/img/walkers/2R.jpg" alt="Walker going to the right" />
                    <img class="img" src="assets/img/walkers/3R.jpg" alt="Walker going to the right" />
                    <img class="img" src="assets/img/walkers/4R.jpg" alt="Walker going to the right" />
                    <img class="img" src="assets/img/walkers/5R.jpg" alt="Walker going to the right" />
                    <img class="img" src="assets/img/walkers/6R.jpg" alt="Walker going to the right" />
                    <img class="img" src="assets/img/walkers/7R.jpg" alt="Walker going to the right" />
                </div>
        </section>
    </main>


    
</body>
</html>