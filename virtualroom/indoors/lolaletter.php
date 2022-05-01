<?php
define('MAGIC', "WAAWamazing");
require  "../../classes/InfoPage.php";

$newPage = new InfoPage("/virtualroom/indoors/", $conn);
$head = $newPage->getHead($newPage->pageData);
$header = $newPage->getHeader($newPage->pageData);
$skipLink = $newPage->getSkipLinkToContent();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Lola's letter to Floriane // Indoors</title>
    <?php echo $head; ?>

    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

</head>
<body class="disconnected letter">
    <?php echo $skipLink;?>
    <?php echo $header;?>

   
    <main id="main">
        <header>
            <h1><a href="info.php" class="title-link">Indoors</a></h1>
            <h2>DISCONNECTED</h2>
            <h3>Lola Jacrot & Floriane Grosset</h3>
        </header>

        <h4>Lola's letter to Floriane</h4>
        <p>
        Dear Floriane,</p>

        <p>You're probably awake for a while now. 
            Last night it was hard to disconnect. 
            I stayed up until 3am. I felt anxious 
            like before a trip. How ironic. This 
            morning I woke at 8:34 then 10:28am. 
            Both times I was confused because I 
            had to wander around the house to 
            find a clock. </p>

        <p>Do you fear apocalypse ? What was the 
            vision of the next major dramatic historical 
            turn ? To be honest, I always had a fantasy 
            of tragic events, upsetting our daily life. 
            Recently I was thinking it could be some kind 
            of technology crash. I fear this more than  a 
            virus, an economic crash or some alien invasion. </p>

        <p>Do you feel lonely ? For the moment I don't. However,
             I probably will this night. </p>

        <p>What to you miss the most about being online ? Of 
            course I miss relaxing watching a show, talking to 
            my friends and lovers. I afford myself to keep my 
            digital camera. I must confess that yesterday I took 
            photos of pics of my lovers so I can watch them 
            whenever I want. <br>
            I miss you message me back. I forgot what it feels 
            like to ask suspended questions and not being able to
             immediately have the answer. </p>

<p>Did you know that from my window I can see the building where
     I was born ? I moved a lot these past years, but
      I had to be confined next to the very place I 
      came into this world. It feels like this is 
      the end of a cycle of my life. </p>

<p>Does this day feel like an eternity for you too ? </p>

<p>Today, I was fully listening. I finished activities
     without being distracted by something else than my
      own thoughts. I was able to write in english
       without compulsively checking on a translator. 
       I wasn't always checking the time. The joggers
        appears at 7pm, the applause at 8pm, the night 
        starts to fall at 9pm, the lights in my street 
        at 10pm.</p>

<p>However, this silence feels like a huge weight on my chest.</p>

<p>Tomorrow I will be back to my fellow online friends. </p>

<p>Thank you for doing this with me. You're probably 
    sleeping by now. See you tomorrow on screens. </p>

<p>Lola</p>

    </main>


    
</body>
</html>