<?php 
// check if the key is there and correct
if (!defined('MAGIC')) { // quotes importantes
    echo "This access is forbidden";
    die; // do not do anything else
} elseif (MAGIC != "WAAWamazing") {
    echo "This access is even more forbidden";
    die;
}

// include('../../inc/functions.php');
// $ua = getBrowser();
// $browser = $ua['name'];


?>
    <!-- Mandatory -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles  -->
    <link rel="stylesheet" type="text/css" media="screen" href="/virtualroom/indoors/assets/css/main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/virtualroom/indoors/assets/css/infostyles.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/virtualroom/indoors/assets/css/headerStyles.css" />
    <?php 
    // if ($browser == 'Google Chrome') {
    //     echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"/assets/css/chrome.css\" />";
    // }
    ?>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 


    <!-- FavIcon -->
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">

    
    <!-- Scripts -->
    <script src="/assets/js/menu.js"></script>
