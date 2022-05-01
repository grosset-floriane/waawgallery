<?php
    define('MAGIC', "WAAWamazing");
    $uri = $_SERVER['REQUEST_URI'];
    
    if (!isset($_COOKIE['instruction'])) {
        $coockie = false;
        setcookie('instruction', true, time() + 12600, '/');

    } else {
        $coockie = true;
    }


    require  "../classes/InfoPage.php";

    $newPage = new InfoPage("/moare/", $conn);
    $head = $newPage->getHead($newPage->pageData);
    $header = $newPage->getHeader($newPage->pageData);
    $skipLink = $newPage->getSkipLinkToContent();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Moare</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    
    <?php echo $head; ?>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    
    <script>
        var heightWindow = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
        var widthWindow = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
        var screen = <?php if (isset($_GET['screen']) && 
                                ( $_GET['screen'] == '726'|| $_GET['screen'] == '968' || $_GET['screen'] == '1815' ||
                                $_GET['screen'] == '1210' || $_GET['screen'] == '1452' || $_GET['screen'] == '2420' ||
                                $_GET['screen'] == '3025')) { echo $_GET['screen']; } else {echo 'undefined';} ?>;
    
        var currentURL = "<?php echo $uri;?>";
        

        var url = "/moare/";

        if( widthWindow <= 726 && heightWindow < 600 && screen != '726' ) {
            window.location.href = url + "?screen=726";
        } else if ( widthWindow <= 968 && heightWindow < 800 && screen != '968' && (widthWindow > 726 || heightWindow > 600)) {
            // redirection small
            window.location.href = url + "?screen=968";
        } else if ( widthWindow <= 1210 && heightWindow < 1000 && screen != '1210' && (widthWindow > 969 || heightWindow > 800) ) {
            window.location.href = url + "?screen=1210";
        } else if ( widthWindow <= 1452 && heightWindow < 1200 && screen != '1452' && (widthWindow > 1210 || heightWindow > 1000) ) {
            // redirection medium
            window.location.href = url + "?screen=1452";
        } else if ( widthWindow <= 1815 && heightWindow < 1500 && screen != '1815' && (widthWindow > 1452 || heightWindow > 1200) ) {
            window.location.href = url + "?screen=1815";
        } else if ( widthWindow <= 2420 && heightWindow < 2000 && screen != '2420' && (widthWindow > 1815 || heightWindow > 1500) ) {
            window.location.href = url + "?screen=2420";
        } else if ( (widthWindow > 2420 || heightWindow >= 2000) && screen != '3025') {
            // redirection big
            window.location.href = url + "?screen=3025";
            
        }

        

    </script>
    </head>
<body class="index" id="index">
    <?php echo $skipLink;?>
    <?php echo $header;?>

<script>
    var pixel = 8;
    var heightBackground = 800;
    var widthBackground = 968;
    

    var startPosPattern1 = 0;
    var startPosPattern2 = 0;
    var startPosPattern3 = 0;
    var startPosPattern4 = 0;

    switch( screen !== 'undefined') {
        case screen == '726':
            pixel = 6;
            heightBackground = 600;
            widthBackground = 726;
            startPosPattern1 = 480;
            startPosPattern2 = 390;
            startPosPattern3 = -480;
            startPosPattern4 = -18;
            
            break;
        case screen == '968':
            pixel = 8;
            heightBackground = 800;
            widthBackground = 968;
            startPosPattern1 = 352;
            startPosPattern2 = -780;
            startPosPattern3 = -608;
            startPosPattern4 = 8;
           
            break;
        case screen == '1210':
            pixel = 10;
            heightBackground = 1000;
            widthBackground = 1210;
            startPosPattern1 = -200;
            startPosPattern2 = 490;
            startPosPattern3 = -390;
            startPosPattern4 = 290;

            break;
        case screen == '1452':
            pixel = 12;
            heightBackground = 1200;
            widthBackground = 1452;
            startPosPattern1 = -168;
            startPosPattern2 = -372;
            startPosPattern3 = -984;
            startPosPattern4 = 540;
            
            break;
        case screen == '1815':
            pixel = 15;
            heightBackground = 1500;
            widthBackground = 1815;
            startPosPattern1 = 135;
            startPosPattern2 = 585;
            startPosPattern3 = 1275;
            startPosPattern4 = -420;
            break;
        case screen == '2420':
            pixel = 20;
            heightBackground = 2000;
            widthBackground = 2420;            
            startPosPattern1 = -460;
            startPosPattern2 = -860;
            startPosPattern3 = 1020;
            startPosPattern4 = -1240;
            break;
        default:
            pixel = 25;
            heightBackground = 2500;
            widthBackground = 3025;
            

    }

    

    document.getElementById('index').style.backgroundImage = "url(assets/img/" + screen + "/main_screen_01_" + screen + ".png)";

    

    var heightWindow = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
    var widthWindow = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

    var colorIndex = 0;
    function changeBackgroundColor() {
        colorIndex++;
        if (colorIndex == 3) {
            colorIndex = 0;
        }
        var colorArray = ['#fff200', '#0000ff', '#ff0000'];
        var colorArray2 = ['#ff0000', '#fff200', '#0000ff'];
        document.getElementById('index').style.backgroundColor = colorArray[colorIndex];
        document.getElementById('buttonMenu').style.color = colorArray2[colorIndex];
        document.getElementById('info-icon-path').style.fill = colorArray2[colorIndex];
        document.getElementById('button-menu').style.borderColor = colorArray2[colorIndex];
        document.getElementById('button-menu').style.borderColor = colorArray2[colorIndex];
        document.getElementById('nav').style.color = colorArray2[colorIndex];

        if(document.getElementById('waaw-header').classList.contains('open')) {
            document.getElementById('firstW').style.color = colorArray2[colorIndex];
        }

        var allLink = document.getElementById("nav").getElementsByTagName("a");
        for(var i=0 ; i < allLink.length ; i++) {
            allLink[i].style.color = colorArray2[colorIndex];
        }

        var allLi = document.getElementById("nav").getElementsByTagName("li");
        for(var i=0 ; i < allLi.length ; i++) {
            allLi[i].style.color = colorArray2[colorIndex];
        }
    }

    function changeLogoColor() {
        if(document.getElementById('waaw-header').classList.contains('open')) {
            document.getElementById('firstW').style.color = document.getElementById('button-menu').style.borderColor;
        } else {
            document.getElementById('firstW').style.color = 'transparent';
        }
    }

    document.getElementById('buttonMenu').addEventListener("click", changeLogoColor);


    function goUp() {
        // overlay 2 going UP
        var up = document.getElementById('up');
        var upPosTop = up.offsetTop;
        var heightUp = up.offsetHeight;

        up.style.top  = (upPosTop-pixel)+"px";
        changeBackgroundColor();

        if(upPosTop < -heightUp - 1) {
            var gapToAlign = (heightBackground - heightWindow) % pixel;
            up.style.top = (heightWindow + gapToAlign)+"px";
        }

      
    }

    function goDown() {
        // overlay 1 going DOWN
        var down = document.getElementById('down');
        var downPosTop = down.offsetTop;
        var heightDown = down.offsetHeight;

        down.style.top  = (downPosTop+pixel)+"px";
        changeBackgroundColor();

        if(downPosTop > heightWindow + 1) {
            down.style.top = (-heightDown)+"px";
            
        }
    }

    function goLeft() {
        // overlay 3 going LEFT
        var left = document.getElementById('left');
        var leftPosLeft = left.offsetLeft;
        var widthLeft = left.offsetWidth;

        left.style.left  = (leftPosLeft-pixel)+"px";
        changeBackgroundColor();

        if(leftPosLeft < -widthLeft-1) {
            var gapToAlign = (widthBackground - widthWindow) % pixel;
            left.style.left = (widthWindow + gapToAlign)+"px";
        }
    }

    function goRight() {
        // overlay 4 going RIGHT
        var right = document.getElementById('right');
        var rightPosLeft = right.offsetLeft;
        var widthRight = right.offsetWidth;

        right.style.left  = (rightPosLeft+pixel)+"px";
        changeBackgroundColor();

        if(rightPosLeft > widthWindow+1) {
            right.style.left = (-widthRight)+"px";
        }
    }


    function changeBackground() {
        if(document.getElementById('index').style.backgroundImage.includes('main_screen_01')) {
            document.getElementById('index').style.backgroundImage = "url(assets/img/" + screen + "/main_screen_02_" + screen + ".png)";
        } else {
            document.getElementById('index').style.backgroundImage = "url(assets/img/" + screen + "/main_screen_01_" + screen + ".png)";
        }
        changeBackgroundColor();
    }


    document.onkeydown = detectKey;


    
function detectKey(e) {
    e = e || window.event;


    if (e.keyCode == '38') {
        // up arrow
        // up.style.top  = (upPosTop-pixel)+"px";
        goUp();
        // if(posTop == -heightDownUp - 10) {
        //     document.getElementById('downup').style.top = (heightWindow+1)+"px";
        // }
    }
    else if (e.keyCode == '40') {
        // down arrow
        // down.style.top  = (downPosTop+pixel)+"px";
        goDown();
        // if(posTop == heightWindow+10) {
        //     document.getElementById('downup').style.top = (-heightDownUp-1)+"px";
        // }
    }
    else if (e.keyCode == '37') {
       // left arrow
        // left.style.left  = (leftPosLeft-pixel)+"px";
        goLeft();

        // if(posLeft == -widthLeftRight-10) {
        //     document.getElementById('leftright').style.left = (widthWindow+1)+"px";
        // }
    }
    else if (e.keyCode == '39') {
       // right arrow
        // right.style.left  = (rightPosLeft+pixel)+"px";
        goRight();
        // if(posLeft == widthWindow+10) {
        //     document.getElementById('leftright').style.left = (-widthLeftRight-1)+"px";
        // }
    }
    else if (e.keyCode == '66') {
        changeBackground();
    }
}

function toggletouchNavButton() {
    document.getElementById('touch-navigation-list').classList.toggle('open');
    document.getElementById('touch-navigation').classList.toggle('open');
    const touchNavButton = document.getElementById('button-menu');
    touchNavButton.classList.toggle('open');
    if (touchNavButton.classList.contains('open')) {
        touchNavButton.ariaLabel = 'Hide touch navigation';
        touchNavButton.ariaExpanded = 'true';
    } else {
        touchNavButton.ariaLabel = 'Show touch navigation';
        touchNavButton.ariaExpanded = 'false';
    }
    
}


</script>


    <?php 
    if($coockie === false) {
        echo "
        <script>
            function closeinstruction() {
                document.getElementById('instructions').style.display = \"none\";
            }
        </script>
        <div id=\"instructions\" onclick=\"closeinstruction()\">
            <h2>Instructions</h2>
            <p>The overlays can be moved either by using 
            your keyboard arrows or by the buttons in the 
            navigation located at the bottom right of your
             screen.</p>
    
            <p>The background can be shifted by pressing 
            the <span>B</span> key of your keyboard, or by clicking 
            the <span>⇄</span> button on the bottom right navigation.</p>
    
            <p>Click anywhere on this box to make it disappear.</p>
        
        
        </div>
        ";
    }
    
    
    
    ?>

    <main id="main">
        <?php 
            $screen = $_GET['screen'];
                echo "<img aria-hidden=\"true\" focusable=\"false\" src=\"assets/img/$screen/overlay_01_down_$screen.png\" id=\"down\">
                <img aria-hidden=\"true\" focusable=\"false\" src=\"assets/img/$screen/overlay_02_up_$screen.png\" id=\"up\">
                <img aria-hidden=\"true\" focusable=\"false\" src=\"assets/img/$screen/overlay_03_left_$screen.png\" id=\"left\">
                <img aria-hidden=\"true\" focusable=\"false\" src=\"assets/img/$screen/overlay_04_right_$screen.png\" id=\"right\">";
            
        ?>

        <nav id="touch-navigation">
            <button type="button" name="button-menu" id="button-menu" aria-label="Open touch navigation" aria-expanded="false" aria-control="touch-navigation-list"  onclick="toggletouchNavButton()">Touch Nav</button>
            <ul id="touch-navigation-list">
                <li><button type="button" name="button-left"  onclick="goLeft()" id="button-left" aria-label="move pattern 1 to the left" alt="move one pattern to the left">&#8592;</button></li>
                <li>
                    <button type="button" name="button-up" onclick="goUp()" id="button-up" aria-label="move pattern 2 up" alt="move one pattern up">&#8593;</button>
                </li>
                <li><button type="button" name="button-down"  onclick="goDown()" id="button-down" aria-label="move pattern 3 down" alt="move one pattern down">&#8595;</button></li>
                <li><button type="button" name="button-right" onclick="goRight()" id="button-right" aria-label="move pattern 4 to the right" alt="move one pattern to the right">&#8594;</button></li>
                <li><button type="button" name="button-background" onclick="changeBackground()" id="button-background" aria-label="change the background pattern" alt="change the background pattern">&#8644;</button></li>

            </ul>
        </nav>
    
    </main>

    <script>
    var left = document.getElementById('left');
    var right = document.getElementById('right');
    var up = document.getElementById('up');
    var down = document.getElementById('down');

    down.style.top = startPosPattern1 +"px";
    up.style.top = startPosPattern2 +"px";
    left.style.left = startPosPattern3 +"px";
    right.style.left = startPosPattern4 +"px";


    </script>


    
</body>
</html>