<?php


function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'], ''
    );
  }
  
  define("BASE_URL",  url());


function printHeader($data) {
    if (empty($data)) {return;}

    $title = $data["title"];
    $artworkFolder = $data["artwork_folder"];
    $imageUrl = $data["image"];
    $imageAlt = $data["image_alt"];
    $shortDescription = $data["short_description"];

    $specialHead = getHead($artworkFolder);

    echo "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <?php include 'inc/head.php';?>

        <!-- Mandatory -->
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">

        <!-- FavIcon -->
        <link rel=\"icon\" href=\"/img/favicon.png\" type=\"image/x-icon\">

        <!-- Scripts -->
        <script src=\"/assets/js/menu.js\"></script>

        <!-- SEO META -->
        <meta name=\"author\" content=\"Floriane Grosset\">
        <meta name=\"robots\" content=\"index, follow\">
        <meta property=\"og:title\" content=\"$title\" />
        <meta property=\"og:url\" content=\"https://waawgallery.com$artworkFolder\" />
        <meta property=\"og:image\" content=\"$imageUrl\" />
        <meta property=\"og:image:alt\" content=\"$imageAlt\" />
        <meta property=\"og:image:width\" content=\"820\" />
        <meta property=\"og:image:height\" content=\"630\" />
        <meta property=\"og:type\" content=\"article\" />
        <meta property=\"og:description\" content=\"$shortDescription\" />
        <meta property=\"og:locale\" content=\"en_US\" />
        
        <!-- Twitter cards -->
        <meta name=\"twitter:card\" content=\"summary_large_image\">
        <meta name=\"twitter:site\" content=\"@FlosWebdesign\">
        <meta name=\"twitter:creator\" content=\"@FlosWebdesign\">
        <meta name=\"twitter:title\" content=\"$title\">
        <meta name=\"twitter:description\" content=\"$shortDescription\">
        <meta name=\"twitter:image\" content=\"$imageUrl\">
        <meta name=\"twitter:image:alt\" content=\"$imageAlt\">


        <title>$title</title>
        $specialHead


    
    </head>
    ";
}



function getHead($artworkFolder) {
    switch ($artworkFolder) {
        case "/inabsence/":
            return "
        <!-- STYLES -->
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/inabsence/assets/css/style.min.css\" />

        <!-- FONTS -->
        <link href=\"https://fonts.googleapis.com/css?family=Raleway&display=swap\" rel=\"stylesheet\"> 
        <link href=\"https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap\" rel=\"stylesheet\"> 
            "; 
            break;
        case "/oracle/":
            return "
        <!-- STYLES -->
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/oracle/assets/css/style.min.css\" />

        <!-- FONTS -->
        <link href=\"https://fonts.googleapis.com/css?family=Raleway&display=swap\" rel=\"stylesheet\">  
        <link rel=\"icon\" href=\" " . BASE_URL . "/oracle/assets/img/favicon.png\" type=\"image/x-icon\">
            ";
            break;
        case "/moare/":
            return "
        <!-- STYLES -->
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/moare/assets/css/style.min.css\" />

        <!-- FONTS -->
        <link href=\"https://fonts.googleapis.com/css?family=Raleway&display=swap\" rel=\"stylesheet\">  
            ";
            break;
        case "/virtualroom/indoors/":
            return "
        <!-- FONTS -->
        <link href=\"https://fonts.googleapis.com/css?family=Raleway&display=swap\" rel=\"stylesheet\">  
        <link href=\"https://fonts.googleapis.com/css2?family=Roboto&display=swap\" rel=\"stylesheet\"> 

        <!-- STYLES -->
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/virtualroom/indoors/assets/css/main.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/virtualroom/indoors/assets/css/infostyles.css\" />
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/virtualroom/indoors/assets/css/headerStyles.css\" />
            ";
            break;
        case "/augur-and-dragon-bones/":
            return "
        <!-- STYLES -->
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"" . BASE_URL . "/augur-and-dragon-bones/assets/css/style.min.css\" />

        <!-- FONTS -->
        <link href=\"https://fonts.googleapis.com/css?family=Raleway&display=swap\" rel=\"stylesheet\">  
            ";
        default:
            return "";
    }

}


?>