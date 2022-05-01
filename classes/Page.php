<?php

function str_contains($haystack, $needle) {
    return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}

class Page 
{
    public function getHead($data) {
        if (empty($data)) {return;}

    $title = $data["title"];
    $artworkFolder = $data["artwork_folder"];
    $imageUrl = $data["image"];
    $imageAlt = $data["image_alt"];
    $shortDescription = $data["short_description"];

    $specialHead = $this->getSpecificHead($artworkFolder);

    return "

    
       

        <!-- Mandatory -->
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">

        <!-- FavIcon -->
        <link rel=\"icon\" href=\"/assets/img/favicon.png\" type=\"image/x-icon\">

        <!-- Scripts -->
        <script src=\"/assets/js/menu.js\"></script>

        <!-- SEO META -->
        <meta name=\"author\" content=\"Floriane Grosset\">
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"description\" content=\"$shortDescription\">
        <meta property=\"og:title\" content=\"$title\" />
        <meta property=\"og:url\" content=\"https://waawgallery.com$artworkFolder\" />
        <meta property=\"og:image\" content=\"$imageUrl\" />
        <meta property=\"og:image:alt\" content=\"$imageAlt\" />
        <meta property=\"og:image:width\" content=\"820\" />
        <meta property=\"og:image:height\" content=\"630\" />
        <meta property=\"og:type\" content=\"article\" />
        <meta property=\"og:description\" content=\"$shortDescription\" />
        <meta property=\"og:locale\" content=\"en_US\" />
        <meta property=\"og:site_name\" content=\"WAAW Gallery\" />
        
        <!-- TWITTER CARDS -->
        <meta name=\"twitter:card\" content=\"summary_large_image\">
        <meta name=\"twitter:site\" content=\"@FlosWebdesign\">
        <meta name=\"twitter:creator\" content=\"@FlosWebdesign\">
        <meta name=\"twitter:title\" content=\"$title\">
        <meta name=\"twitter:description\" content=\"$shortDescription\">
        <meta name=\"twitter:image\" content=\"$imageUrl\">
        <meta name=\"twitter:image:alt\" content=\"$imageAlt\">

        <!-- FONT -->
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>    

        <!-- GLOBAL STYLESHEET -->
        <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"" . BASE_URL . "/assets/css/main.css\" />

        <title>$title</title>
        $specialHead


    
    
    ";
    }

    private function getSpecificHead($artworkFolder) {
        switch ($artworkFolder) {
            case "/inabsence/":
                return "
            <!-- STYLES -->
            <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/inabsence/assets/css/main.css\" />
    
            <!-- FONTS -->
            <link href=\"https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&family=Raleway&display=swap\" rel=\"stylesheet\"> 
                "; 
                break;
            case "/oracle/":
                return "
            <!-- STYLES -->
            <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/oracle/assets/css/main.css\" />
            <link rel=\"icon\" href=\" " . BASE_URL . "/oracle/assets/img/favicon.png\" type=\"image/x-icon\">
    
            <!-- FONTS -->
            <link href=\"https://fonts.googleapis.com/css2?family=Raleway&display=swap\" rel=\"stylesheet\"> 
                ";
                break;
            case "/moare/":
                return "
            <!-- STYLES -->
            <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/moare/assets/css/main.css\" />
            <!-- FONTS -->
            <link href=\"https://fonts.googleapis.com/css2?family=Raleway&display=swap\" rel=\"stylesheet\"> 
                ";
                break;
            case "/virtualroom/indoors/":
                return "
            <!-- FONTS --> 
            <link href=\"https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap\" rel=\"stylesheet\"> 
    
            <!-- STYLES -->
            <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\" " . BASE_URL . "/virtualroom/indoors/assets/css/main.css\" />
                ";
                break;
            case "/augur-and-dragon-bones/":
                return "
            <!-- STYLES -->
            <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"" . BASE_URL . "/augur-and-dragon-bones/assets/css/main.css\" />

            <!-- FONTS -->
            <link href=\"https://fonts.googleapis.com/css2?family=Raleway&display=swap\" rel=\"stylesheet\"> 
                ";
            case "/waaw-offline/":
                return "
                <!-- STYLES -->
                <link rel=\"stylesheet\" type=\"text/css\" media=\"screen\" href=\"" . BASE_URL . "/waaw-offline/assets/css/main.css\" />
                <!-- FONTS --> 
                <link href=\"https://fonts.googleapis.com/css2?family=Arimo:wght@400;600&family=Raleway:wght@400;500&display=swap\" rel=\"stylesheet\"> 
                ";
            default:
                return "";
        }
    }

    public function getSkipLinkToContent() {
        return "
        <div class=\"skip-to-content-link\">
            <a  href=\"#main\">
                Skip to content
            </a>
        </div>
        ";
    }

    public function getHeader($pageData) {
        
$artworkFolder = $pageData["artwork_folder"];
$menu = $this->getMenu($artworkFolder);

return "

    <header id=\"waaw-header\">
        <button onclick=\"togglemenu()\" id=\"buttonMenu\" aria-label=\"Open menu\" aria-expanded=\"false\" aria-controls=\"nav\">
            <svg aria-hidden=\"true\" focusable=\"false\" version=\"1.1\" id=\"info-icon\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
                width=\"22px\" height=\"22px\" viewBox=\"0 0 62.362 62.362\" enable-background=\"new 0 0 62.362 62.362\" xml:space=\"preserve\">
                <path id=\"info-icon-path\" fill-rule=\"evenodd\" clip-rule=\"evenodd\" fill=\"#A8A8A8\" d=\"M31.257,0.389C14.031,0.245,0.02,14.207-0.004,31.334
                    c-0.024,17.089,13.807,31.013,30.819,31.027c17.379,0.015,31-13.566,31.222-30.731C62.247,15.387,49.152,0.539,31.257,0.389z
                    M34.455,49.682c-2.203-0.076-4.412-0.049-6.617-0.012c-1.022,0.017-1.431-0.383-1.427-1.418c0.024-6.567,0.028-13.135-0.002-19.703
                    c-0.005-1.128,0.467-1.491,1.535-1.469c2.205,0.044,4.413,0.049,6.617-0.002c1.106-0.025,1.514,0.407,1.501,1.502
                    c-0.04,3.309-0.014,6.618-0.014,9.927c0,3.159-0.036,6.318,0.02,9.476C36.088,49.177,35.746,49.726,34.455,49.682z M31.108,22.509
                    c-2.863-0.101-5.049-2.412-5.012-5.298c0.038-2.912,2.307-5.134,5.194-5.087c2.776,0.044,5.161,2.526,5.076,5.281
                    C36.279,20.236,33.838,22.605,31.108,22.509z\"/>
            </svg>

            <span aria-hidden=\"true\" focusable=\"false\" class=\"firstW logoletters\" id=\"firstW\">W</span>
            <span aria-hidden=\"true\" focusable=\"false\" class=\"rotatedW logoletters\">W</span>
            <span aria-hidden=\"true\" focusable=\"false\" class=\"lastW logoletters\">W</span>
        </button>

        <nav id=\"nav\">
             $menu
        </nav>

        <noscript>
            <nav>
                $menu
            </nav>

        </noscript>
    </header>";
    }

    public function getMenu($artworkFolder) {
        $activeIndoors= "";
        $activeMoare = "";
        $activeOracle = "";
        $activeAugur = "";
        $activeInabsence = "";
        $activeHome = "";
        $activeAbout = "";

        switch($pageData["artwork_folder"]) {
            case "/virtualroom/indoors/":
                $activeIndoors = "class=\"active\"";
                break;
            case "/moare/":
                $activeMoare = "class=\"active\"";
                break;
            case "/oracle/":
                $activeOracle = "class=\"active\"";
                break;
            case "/augur-and-dragon-bones/":
                $activeAugur = "class=\"active\"";
                break;
            case "/inabsence/":
                $activeInabsence = "class=\"active\"";
                break;
            case "/waaw-offline/":
                if(str_contains($url, 'about.php')) {
                    $activeAbout = "class=\"active\"";
                } else if ($url === '/') {
                    $activeHome = "class=\"active\"";
                }
                break;
            default:
                break;
        }



        $menu = "
            <ul>
                <li>
                    <a href=\"/\" $activeHome>
                        Home
                    </a> 
                </li>     
                <li><a href=\"/about.php\" $activeAbout>
                        About the 
                        <span class=\"firstW logoletters\">W</span>
                        <span class=\"rotatedW logoletters\">W</span>
                        <span class=\"lastW logoletters\">W</span> 
                        gallery
                    </a>
                </li>
                <li><span class=\"menu-title\">Virtual Room:</span>
                    <ul>
                        <li>
                            <a href=\"/virtualroom/indoors/info.php\" $activeIndoors>
                                Indoors // Lola Jacrot & Floriane Grosset 
                            </a>
                        </li>
                    </ul>
                </li>
                <li><span class=\"menu-title\">Archive:</span>
                    <ul>
                        <li>
                            <a href=\"/augur-and-dragon-bones/info.php\" $activeAugur>
                                Augur & Dragon Bones // Sandy Kalydjian
                            </a>
                        </li>
                        <li>
                            <a href=\"/moare/info.php\" $activeMoare>
                                Moare // Soren Krag
                            </a>
                        </li>
                        <li>
                            <a href=\"/oracle/info.php\" $activeOracle>
                                Bibliomancy Oracle // Lucila Mayol
                            </a>
                        </li>
                        <li>
                            <a href=\"/inabsence/info.php\" $activeInabsence>
                                Inabsence // Emilie Wright
                            </a>
                        </li>
                    </ul>
                </li>    
            </ul>
";


return "

    <header id=\"waaw-header\">
        <button onclick=\"togglemenu()\" id=\"buttonMenu\">
            <svg version=\"1.1\" id=\"info-icon\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
                width=\"22px\" height=\"22px\" viewBox=\"0 0 62.362 62.362\" enable-background=\"new 0 0 62.362 62.362\" xml:space=\"preserve\">
                <path id=\"info-icon-path\" fill-rule=\"evenodd\" clip-rule=\"evenodd\" fill=\"#A8A8A8\" d=\"M31.257,0.389C14.031,0.245,0.02,14.207-0.004,31.334
                    c-0.024,17.089,13.807,31.013,30.819,31.027c17.379,0.015,31-13.566,31.222-30.731C62.247,15.387,49.152,0.539,31.257,0.389z
                    M34.455,49.682c-2.203-0.076-4.412-0.049-6.617-0.012c-1.022,0.017-1.431-0.383-1.427-1.418c0.024-6.567,0.028-13.135-0.002-19.703
                    c-0.005-1.128,0.467-1.491,1.535-1.469c2.205,0.044,4.413,0.049,6.617-0.002c1.106-0.025,1.514,0.407,1.501,1.502
                    c-0.04,3.309-0.014,6.618-0.014,9.927c0,3.159-0.036,6.318,0.02,9.476C36.088,49.177,35.746,49.726,34.455,49.682z M31.108,22.509
                    c-2.863-0.101-5.049-2.412-5.012-5.298c0.038-2.912,2.307-5.134,5.194-5.087c2.776,0.044,5.161,2.526,5.076,5.281
                    C36.279,20.236,33.838,22.605,31.108,22.509z\"/>
            </svg>

            <span class=\"firstW logoletters\" id=\"firstW\">W</span>
            <span class=\"rotatedW logoletters\">W</span>
            <span class=\"lastW logoletters\">W</span>
        </button>

        <nav id=\"nav\">
             $menu
        </nav>

        <noscript>
            <nav>
                $menu
            </nav>

        </noscript>
    </header>";
    }

    public function getLogo() {
        return "    <svg viewBox=\"0 0 238.97 103.211\"  xmlns=\"http://www.w3.org/2000/svg\" width=\"238.97\" height=\"103.211\" xml:space=\"preserve\"><title>WAAW Gallery - Web-Based Art Gallery</title><path d=\"M29.693 2.075h5.478l8.3 20.916 8.383-20.916h5.561L47.124 27.224l11.288 26.643L79.742 1.66h6.309L61.067 60.59h-5.146L43.555 31.457 31.104 60.59h-5.063L1.142 1.66h6.225L28.78 53.867l11.205-26.643L29.693 2.075zM179.843 2.075h5.478l8.301 20.916 8.383-20.916h5.561l-10.291 25.149 11.287 26.643L229.893 1.66h6.307l-24.982 58.93h-5.146l-12.366-29.133-12.45 29.133h-5.063l-24.9-58.93h6.225l21.414 52.207 11.205-26.643-10.294-25.149zM132.774 59.583h-5.478l-8.301-20.916-8.383 20.916h-5.561l10.291-25.149-11.285-26.642-21.332 52.207h-6.307L101.4 1.068h5.146l12.366 29.133 12.45-29.133h5.063l24.9 58.93H155.1L133.688 7.792l-11.205 26.643 10.291 25.148zM6.586 89.588h1.221l1.85 4.662 1.868-4.662h1.24l-2.294 5.605 2.516 5.938 4.755-11.636h1.406L13.58 102.63h-1.147l-2.757-6.494L6.9 102.63H5.772L.222 89.495h1.387l4.773 11.636 2.498-5.938-2.294-5.605zM29.822 101.483v1.147h-8.825V89.496h8.658v1.147h-7.363v4.736h6.419v1.091h-6.419v5.014h7.53zM42.143 99.245c0 .494-.099.947-.296 1.36-.197.414-.462.771-.795 1.073s-.722.537-1.166.703-.919.25-1.424.25h-6.198V89.496h6.327c.456 0 .869.099 1.239.296s.685.453.944.768c.259.314.459.672.601 1.073.142.401.213.805.213 1.211 0 .666-.167 1.274-.5 1.822a3.09 3.09 0 0 1-1.388 1.23c.752.222 1.347.635 1.785 1.239.438.605.658 1.308.658 2.11zm-8.584-8.621v4.847h4.514c.32 0 .62-.067.897-.203a2.28 2.28 0 0 0 .712-.537 2.54 2.54 0 0 0 .629-1.684c0-.333-.052-.647-.157-.943s-.253-.552-.444-.768a2.25 2.25 0 0 0-.675-.518 1.87 1.87 0 0 0-.851-.194h-4.625zm7.289 8.399c0-.321-.056-.632-.167-.935a2.442 2.442 0 0 0-1.194-1.35 1.94 1.94 0 0 0-.897-.213h-5.032v4.977h4.903c.333 0 .644-.068.934-.204.29-.136.542-.317.758-.546.216-.228.385-.493.509-.795.124-.302.186-.613.186-.934zM44.141 98.172v-1.166h5.402v1.166h-5.402zM62.271 99.245c0 .494-.099.947-.296 1.36-.197.414-.462.771-.795 1.073s-.722.537-1.166.703-.919.25-1.424.25h-6.198V89.496h6.327c.456 0 .869.099 1.239.296s.685.453.944.768c.259.314.459.672.601 1.073.142.401.213.805.213 1.211 0 .666-.167 1.274-.5 1.822a3.09 3.09 0 0 1-1.388 1.23c.752.222 1.347.635 1.785 1.239.438.605.658 1.308.658 2.11zm-8.584-8.621v4.847h4.514c.32 0 .62-.067.897-.203a2.28 2.28 0 0 0 .712-.537 2.54 2.54 0 0 0 .629-1.684c0-.333-.052-.647-.157-.943s-.253-.552-.444-.768a2.25 2.25 0 0 0-.675-.518 1.87 1.87 0 0 0-.851-.194h-4.625zm7.289 8.399c0-.321-.056-.632-.167-.935a2.442 2.442 0 0 0-1.194-1.35 1.94 1.94 0 0 0-.897-.213h-5.032v4.977h4.903c.333 0 .644-.068.934-.204.29-.136.542-.317.758-.546.216-.228.385-.493.509-.795.124-.302.186-.613.186-.934zM68.505 89.496h1.092l5.458 13.135h-1.37l-1.702-4.107h-5.901l-1.684 4.107h-1.387l5.494-13.135zm3.182 8.01-2.646-6.494-2.683 6.494h5.329zM84.416 91.956c-.37-.419-.863-.759-1.48-1.018-.616-.259-1.319-.389-2.108-.389-1.16 0-2.005.219-2.535.657-.53.438-.795 1.033-.795 1.785 0 .395.07.719.213.971.142.253.36.472.656.657.296.185.676.346 1.138.481.463.136 1.009.271 1.638.407a17.54 17.54 0 0 1 1.896.5 5.476 5.476 0 0 1 1.435.694c.395.277.696.614.906 1.008.209.395.314.888.314 1.48 0 .604-.117 1.128-.352 1.572a3.142 3.142 0 0 1-.98 1.11c-.42.296-.919.515-1.499.657a8.001 8.001 0 0 1-1.905.212c-2.035 0-3.792-.635-5.272-1.905l.647-1.055c.234.247.515.481.842.703s.69.416 1.092.583c.4.167.829.296 1.286.389.456.093.937.139 1.442.139 1.048 0 1.865-.188 2.451-.564.586-.376.879-.947.879-1.711 0-.407-.083-.749-.25-1.027a2.157 2.157 0 0 0-.749-.721c-.333-.204-.746-.379-1.239-.527s-1.067-.296-1.721-.444c-.69-.16-1.295-.327-1.813-.5a4.816 4.816 0 0 1-1.313-.648c-.358-.259-.627-.57-.806-.934s-.268-.811-.268-1.341c0-.604.113-1.144.342-1.619.229-.475.552-.87.972-1.184.419-.314.912-.555 1.479-.721s1.196-.25 1.888-.25c.875 0 1.655.133 2.34.398s1.305.638 1.859 1.119l-.63 1.036zM96.792 101.483v1.147h-8.824V89.496h8.658v1.147h-7.363v4.736h6.42v1.091h-6.42v5.014h7.529zM99.234 102.63V89.496h4.459c1.048 0 1.964.173 2.747.518a5.595 5.595 0 0 1 1.961 1.406c.523.592.918 1.286 1.184 2.081s.397 1.644.397 2.544c0 .999-.147 1.902-.443 2.71a5.872 5.872 0 0 1-1.268 2.072c-.549.573-1.209 1.018-1.979 1.332s-1.637.472-2.599.472h-4.459zm9.454-6.586c0-.789-.11-1.514-.333-2.174-.222-.66-.545-1.23-.971-1.711s-.947-.854-1.563-1.119c-.617-.265-1.326-.397-2.127-.397h-3.164v10.841h3.164c.813 0 1.532-.139 2.154-.417a4.353 4.353 0 0 0 1.563-1.147c.419-.487.737-1.061.953-1.72s.324-1.379.324-2.156zM120.677 89.496h1.091l5.458 13.135h-1.369l-1.702-4.107h-5.901l-1.684 4.107h-1.388l5.495-13.135zm3.181 8.01-2.646-6.494-2.683 6.494h5.329zM129.112 102.63V89.496h5.55c.567 0 1.089.12 1.563.36.475.241.885.555 1.23.944.345.388.613.83.805 1.323.19.493.286.993.286 1.499 0 .481-.07.94-.212 1.378-.143.438-.34.833-.593 1.184s-.558.647-.915.888c-.358.24-.759.404-1.203.49l3.22 5.069h-1.462l-3.09-4.847h-3.885v4.847h-1.294zm1.295-5.994h4.292c.382 0 .73-.083 1.045-.25s.583-.392.806-.675c.222-.284.395-.604.518-.962s.185-.734.185-1.128a3.175 3.175 0 0 0-.786-2.091 2.728 2.728 0 0 0-.851-.647 2.307 2.307 0 0 0-1.027-.24h-4.181v5.993zM150.313 90.643h-4.681v11.988h-1.295V90.643h-4.681v-1.147h10.656v1.147zM165.964 100.707c-1.221 1.344-2.627 2.016-4.218 2.016-.888 0-1.705-.191-2.451-.573s-1.394-.888-1.942-1.517-.978-1.341-1.286-2.137-.462-1.612-.462-2.451c0-.875.15-1.714.453-2.516a6.723 6.723 0 0 1 1.267-2.118 6.223 6.223 0 0 1 1.925-1.461 5.41 5.41 0 0 1 2.423-.546c.642 0 1.228.071 1.758.213s1.002.339 1.415.592c.413.253.771.555 1.073.907.302.352.558.737.768 1.156l-.999.666c-.432-.814-.993-1.412-1.684-1.794s-1.474-.574-2.35-.574c-.728 0-1.385.154-1.97.462-.586.309-1.086.719-1.499 1.23s-.73 1.098-.952 1.757a6.34 6.34 0 0 0-.333 2.044c0 .74.126 1.443.379 2.109s.602 1.249 1.045 1.748c.444.5.965.897 1.563 1.193s1.249.444 1.952.444c.752 0 1.471-.175 2.155-.527s1.341-.91 1.97-1.674v-2.183h-2.923v-.999h4.015v6.457h-1.092v-1.924zM173.79 89.496h1.091l5.458 13.135h-1.369l-1.702-4.107h-5.901l-1.684 4.107h-1.388l5.495-13.135zm3.182 8.01-2.646-6.494-2.683 6.494h5.329zM182.226 102.63V89.496h1.295v11.988h7.585v1.147h-8.88zM193.011 102.63V89.496h1.295v11.988h7.585v1.147h-8.88zM212.62 101.483v1.147h-8.824V89.496h8.658v1.147h-7.363v4.736h6.42v1.091h-6.42v5.014h7.529zM215.063 102.63V89.496h5.55c.567 0 1.089.12 1.563.36.475.241.885.555 1.23.944.345.388.613.83.805 1.323.19.493.286.993.286 1.499 0 .481-.07.94-.212 1.378-.143.438-.34.833-.593 1.184s-.558.647-.915.888c-.358.24-.759.404-1.203.49l3.22 5.069h-1.462l-3.09-4.847h-3.885v4.847h-1.294zm1.294-5.994h4.292c.382 0 .73-.083 1.045-.25s.583-.392.806-.675c.222-.284.395-.604.518-.962s.185-.734.185-1.128a3.175 3.175 0 0 0-.786-2.091 2.728 2.728 0 0 0-.851-.647 2.307 2.307 0 0 0-1.027-.24h-4.181v5.993zM226.791 89.496l4.292 7.067 4.329-7.067h1.405l-5.087 8.251v4.884h-1.295V97.71l-5.069-8.214h1.425z\"/></svg>
";
    }



    public function getFooter() {
        return "
                <footer>
                    <hr>
                    <p>Follow us: <a href=\"https://www.facebook.com/WAAWgallery/\" target=\"_BLANK\">Facebook</a> / <a href=\"https://www.instagram.com/waawgallery/\" target=\"_BLANK\">Instagram</a> / <a href=\"about.php#newsletter\">Newsletter</a></p>
                    <p>© 2020 WAAW All Rights Reserved with the exception of the pictures that belong to their author.<br>
                        Graphic Identity & Web Design by <a href=\"http://florianegrosset.com\" target=\"_BLANK\">Floriane Grosset</a></p>
                </footer>

            </body>
        </html>
        ";
    }
}