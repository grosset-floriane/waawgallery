<?php 
// check if the key is there and correct
if (!defined('MAGIC')) { // quotes importantes
    echo "This access is forbidden";
    die; // do not do anything else
} elseif (MAGIC != "WAAWamazing") {
    echo "This access is even more forbidden";
    die;
}

$menu = "
<ul>
                <li>
                    <a href=\"/\">
                        Home
                    </a> 
                </li>     
                <li><a href=\"/about.php\">
                        About the 
                        <span class=\"firstW logoletters\">W</span>
                        <span class=\"rotatedW logoletters\">W</span>
                        <span class=\"lastW logoletters\">W</span> 
                        gallery
                    </a>
                </li>
                <li>Virtual Room:
                    <ul>
                        <li>
                            <a href=\"/virtualroom/indoors/info.php\">
                                Indoors // Lola Jacrot & Floriane Grosset 
                            </a>
                        </li>
                    </ul>
                </li>
                <li>Archive:
                    <ul>
                        <li>
                            <a href=\"/augur-and-dragon-bones/info.php\">
                                Augur & Dragon Bones // Sandy Kalydjian
                            </a>
                        </li>
                        <li>
                            <a href=\"/moare/info.php\">
                                Moare // Soren Krag
                            </a>
                        </li>
                        <li>
                            <a href=\"/oracle/info.php\">
                                Bibliomancy Oracle // Lucila Mayol
                            </a>
                        </li>
                        <li>
                            <a href=\"/inabsence/info.php\">
                                Inabsence // Emilie Wright
                            </a>
                        </li>
                    </ul>
                </li>    
            </ul>
";


?>

<header id="waaw-header">
        <button onclick="togglemenu()" id="buttonMenu">
            <svg version="1.1" id="info-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="22px" height="22px" viewBox="0 0 62.362 62.362" enable-background="new 0 0 62.362 62.362" xml:space="preserve">
                <path id="info-icon-path" fill-rule="evenodd" clip-rule="evenodd" fill="#A8A8A8" d="M31.257,0.389C14.031,0.245,0.02,14.207-0.004,31.334
                    c-0.024,17.089,13.807,31.013,30.819,31.027c17.379,0.015,31-13.566,31.222-30.731C62.247,15.387,49.152,0.539,31.257,0.389z
                    M34.455,49.682c-2.203-0.076-4.412-0.049-6.617-0.012c-1.022,0.017-1.431-0.383-1.427-1.418c0.024-6.567,0.028-13.135-0.002-19.703
                    c-0.005-1.128,0.467-1.491,1.535-1.469c2.205,0.044,4.413,0.049,6.617-0.002c1.106-0.025,1.514,0.407,1.501,1.502
                    c-0.04,3.309-0.014,6.618-0.014,9.927c0,3.159-0.036,6.318,0.02,9.476C36.088,49.177,35.746,49.726,34.455,49.682z M31.108,22.509
                    c-2.863-0.101-5.049-2.412-5.012-5.298c0.038-2.912,2.307-5.134,5.194-5.087c2.776,0.044,5.161,2.526,5.076,5.281
                    C36.279,20.236,33.838,22.605,31.108,22.509z"/>
            </svg>

            <span class="firstW logoletters" id="firstW">W</span>
            <span class="rotatedW logoletters">W</span>
            <span class="lastW logoletters">W</span>
        </button>

        <nav id="nav">
            <?php echo $menu;?>
        </nav>

        <noscript>
            <nav>
                <?php echo $menu;?>
            </nav>

        </noscript>
    </header>