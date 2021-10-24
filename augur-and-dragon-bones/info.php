<?php
define('MAGIC', "WAAWamazing");
require('../inc/page-data.php');
require('../inc/head2.php');
require('../inc/logo.php');

$data = getPageData(5);

printHeader($data);

?>


<body class="info">
    <?php 
    require('../inc/header.php');
    ?>
    <main>
        <h1>
            <a href="/">
                <?php 
                    printLogo($data['logo_color']);
                ?>
            </a>
        </h1>
        
        <h2>
            <?php echo $data["title"];?>
        </h2>
        
        <p><?php echo $data["event_date"];?></p>
        
        <p>
            <a href="<?php echo $data["facebook_event"];?>" target="_BLANK">
                Facebook event
            </a>
        </p>
        
        <hr>
        
        <section class="intro-sandy">
            <?php echo $data["description"];?>
        </section>

        <hr>
        
        <section class="presentation-sandy">
            <?php echo $data["artist_bio"];?>
        </section>
        
        <div class="buttons">
            <p class="enter-button">
                <a href="<?php echo $data['artwork_folder'];?>">
                    Enter the work
                </a>
            </p>
        </div>
    </main>

    <?php 
        require('../inc/footer.php');
    ?>
