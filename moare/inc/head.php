<?php 
// check if the key is there and correct
if (!defined('MAGIC')) { // quotes importantes
    echo "This access is forbidden";
    die; // do not do anything else
} elseif (MAGIC != "WAAWamazing") {
    echo "This access is even more forbidden";
    die;
}

include('functions.php');
if ( function_exists('getBrowser' ) ) {
    $ua = getBrowser();
    $browser = $ua['name'];
} else {
    $browser = "Google Chrome";
}




?>
    <!-- Mandatory -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles  -->
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.min.css" />
    <?php 
    if ($browser == 'Google Chrome') {
        echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"/assets/css/chrome.css\" />";
    }
    ?>

    <!-- Fonts -->
    <!-- Fonts <?php  echo $debug;?> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">  

    <!-- FavIcon -->
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">

    
    <!-- Scripts -->
    <script src="/js/menu.js"></script>

    <!-- Tracker Clicky (Analytics) -->
    <script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101235170);</script>
    <script async src="//static.getclicky.com/js"></script>
