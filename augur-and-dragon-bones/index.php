<?php
    define('MAGIC', "WAAWamazing");
    $uri = $_SERVER['REQUEST_URI'];
   


    // CONNECT to the database
require_once '../../private/accessWAAW.php';

$conn = new mysqli($host, $username, $password, $database);

// Test connection
if($conn->connect_error) {
    die ($conn->connect_error);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Augur And Dragon Bones <?php echo $_GET['screen'];?></title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    
    <?php include '../inc/head.php';?>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    
    <script>


    </script>
    </head>
<body class="index" id="index">
<?php include '../inc/header.php'; ?>

<?php

$queryVideo = "SELECT * FROM sandy_media WHERE media_type = 'video' ORDER BY RAND()";
$resultVideo = $conn->query($queryVideo);

if ($resultVideo->num_rows > 0) {
    $time = 0;
    $remaining = 100;
    $videoArray = [];
    while($rowVideo = $resultVideo->fetch_assoc()) {

        $array = [];
        $id = $rowVideo['id'];
        $url = $rowVideo['url'];
        $duration = $rowVideo['duration'];
        $mediaType = $rowVideo['media_type'];
        $alt = $rowVideo['alt'];
        

        if ($time < 100 && $remaining >= $duration) {
            $array = ['id' => $id, 'url' => $url, 'duration' => $duration, 'mediaType' => $mediaType, 'alt' => $alt];
            array_push($videoArray, $array);
            $time += $duration; 
            $remaining -= $duration;
        } elseif ($time == 100) {
            break;
        }
    }
}

$querySound = "SELECT * FROM sandy_media WHERE media_type = 'sound' ORDER BY RAND()";
$resultSound = $conn->query($querySound);

if ($resultSound->num_rows > 0) {
    $time = 0;
    $remaining = 100;
    $soundArray = [];
    while($rowSound = $resultSound->fetch_assoc()) {

        $array = [];
        $id = $rowSound['id'];
        $url = $rowSound['url'];
        $duration = $rowSound['duration'];
        $mediaType = $rowSound['media_type'];
        $alt = $rowSound['alt'];
        

        if ($time < 100 && $remaining >= $duration) {
            $array = ['id' => $id, 'url' => $url, 'duration' => $duration, 'mediaType' => $mediaType, 'alt' => $alt];
            array_push($soundArray, $array);
            $time += $duration; 
            $remaining -= $duration;
        } elseif ($time == 100) {
            break;
        }
    }
}

// Text Query
$queryText = "SELECT * FROM sandy_media WHERE media_type = 'text' ORDER BY RAND() LIMIT 1";
$resultText = $conn->query($queryText);

if ($resultText->num_rows == 1) {
    $textArray = [];
    while($rowText = $resultText->fetch_assoc()) {
        $id = $rowText['id'];
        $url = $rowText['url'];
        $alt = $rowText['alt'];
        $duration = 0;
        $mediaType = 'text';

        $textArray = ['id' => $id, 'url' => $url, 'duration' => $duration, 'mediaType' => $mediaType, 'alt' => $alt];
        $textVideo = "
        <video>
            <source alt=\"$alt\" src=\"assets/texts/$url\" type=\"video/mov\">
        </video>
        ";
    }
}

?>

<script>
var videoArray = <?php echo json_encode($videoArray); ?>;
var soundArray = <?php echo json_encode($soundArray); ?>;
var textArray = <?php echo json_encode($textArray); ?>;

</script>




  

    <main id="main">
        <div id="loading-bar"></div>
        <button onclick="start(videoArray, soundArray, textArray);" id="start-button">START</button>

   
    
    </main>

    <script>
        
        
        function randomIntFromInterval(min, max) { // min and max included 
            return Math.floor(Math.random() * (max - min + 1) + min);
            }


function printMedia(alt, url, duration, id, mediaType) {

console.log(url);
    var heightWindow = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
    var widthWindow = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
    console.log(alt + url + duration + id + mediaType);
    var main = document.getElementById("main");

    if(mediaType == 'sound') {
        var audioElement = document.createElement('audio');
        audioElement.classList.add('invisibleaudio');
        audioElement.setAttribute('src', 'assets/sounds/' + url);
        audioElement.setAttribute('alt', alt);
        audioElement.setAttribute('autoplay', true);
        audioElement.setAttribute('loop', true);
        console.log(audioElement);
        main.appendChild(audioElement);

    } else if (mediaType == 'video') {
        var videoElement = document.createElement('img');
        videoElement.setAttribute('src', 'assets/img/' + url);
        videoElement.setAttribute('alt', alt);
        videoElement.setAttribute('id', 'video-' + id);
        videoElement.setAttribute('onclick', 'toTheFront(' + id + ');');
        console.log(videoElement);
        main.appendChild(videoElement);
        
        // give the new element random size according to the width of the screen
        var minInterval = widthWindow / 10;
        var maxInterval = widthWindow / 3;
        var mediaWidth = randomIntFromInterval(minInterval, maxInterval);

        videoElement.style.width = mediaWidth + 'px';

        // give the video a random position according to its size
        var minInterval = 0;
        var maxInterval = widthWindow - mediaWidth;
        var randomMediaHorizontalPos = randomIntFromInterval(minInterval, maxInterval);

        var minInterval = 0;
        var maxInterval = heightWindow - (mediaWidth * 3 / 4);
        var randomMediaVerticalPos = randomIntFromInterval(minInterval, maxInterval);

        videoElement.style.top = randomMediaVerticalPos + 'px';
        videoElement.style.left = randomMediaHorizontalPos + 'px';
    } else if (mediaType == 'text') {
        var textElement = document.createElement('video');
        textElement.setAttribute('id', 'text-' + id);
        textElement.setAttribute('alt', alt);
        textElement.setAttribute('autoplay', true);
        
        var sourceElement = document.createElement('source');
        sourceElement.setAttribute('src', 'assets/texts/' + url);
        sourceElement.setAttribute('type', 'video/webm');
        

        textElement.appendChild(sourceElement);
        
        console.log(textElement);
        main.appendChild(textElement);

        textElement.style.zIndex = 99999;
        
        // give the new element random size according to the width of the screen
        var minInterval = widthWindow / 2;
        var maxInterval = widthWindow / 1.1;
        var mediaWidth = randomIntFromInterval(minInterval, maxInterval);

        textElement.style.width = mediaWidth + 'px';

        // give the video a random position according to its size
        var minInterval = 0;
        var maxInterval = widthWindow - mediaWidth;
        var randomMediaHorizontalPos = randomIntFromInterval(minInterval, maxInterval);

        var minInterval = 0;
        var maxInterval = heightWindow - (mediaWidth * 2 / 11);
        var randomMediaVerticalPos = randomIntFromInterval(minInterval, maxInterval);

        textElement.style.top = randomMediaVerticalPos + 'px';
        textElement.style.left = randomMediaHorizontalPos + 'px';
    }

}


var tempsVideo = 0;
var i = 0;
var arrayVideoLength = videoArray.length;

function newVideo(videoArray) {
    if (i < arrayVideoLength) {
        var alt = videoArray[i].alt;
        var url = videoArray[i].url;
        var duration = videoArray[i].duration;
        duration = parseInt(duration);
        var id = videoArray[i].id;
        var mediaType = videoArray[i].mediaType;
        tempsVideo += duration;
        console.log(i);
        console.log(alt);

        
        console.log(tempsVideo);
        printMedia(alt, url, duration, id, mediaType);
        i++;
        
        setTimeout(() => {
            newVideo(videoArray);
            console.log(tempsVideo);
        }, duration * 1000);
    } else {
        // redirect the page
        window.location.href = 'https://waawgallery.com/';
    }
}

var tempsSound = 0;
var j = 0;
var arraySoundLength = soundArray.length;

function newSound(soundArray) {
    if (j < arraySoundLength) {
        var alt = soundArray[j].alt;
        var url = soundArray[j].url;
        var duration = soundArray[j].duration;
        duration = parseInt(duration);
        var id = soundArray[j].id;
        var mediaType = soundArray[j].mediaType;
        tempsSound += duration;
        console.log(j);
        console.log(alt);

        
        console.log(tempsSound);
        printMedia(alt, url, duration, id, mediaType);
        j++;
        
        setTimeout(() => {
            newSound(soundArray);
            console.log(tempsSound);
        }, duration * 1000);
    } else {
        // redirect the page
        // window.location.href = 'https://waawgallery.com/';
    }
}

function printText(textArray) {
    var alt = textArray.alt;
    var url = textArray.url;
    var duration = textArray.duration;
    duration = parseInt(duration);
    var id = textArray.id;
    var mediaType = textArray.mediaType;
    printMedia(alt, url, duration, id, mediaType);

}

function loadingBar() {
    var width = 1;
    var loadingBarElement = document.getElementById('loading-bar');
    setInterval(() => {
            loadingBarElement.style.width = width + 'vw';
            width++;
        }, 1000);
}

function start(videoArray, soundArray, textArray) {
    var button = document.getElementById('start-button');
    button.style.display = "none";
    newSound(soundArray);
    newVideo(videoArray);
    printText(textArray)
    loadingBar();
}

var zIndex = 0;

function toTheFront (elementID) {
    var element = document.getElementById('video-' + elementID);
    zIndex++;
    element.style.zIndex = zIndex;
}


</script>


    
</body>
</html>